<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answers;
use Illuminate\Support\Facades\Auth;
use App\Exports\BulkExport;
//use Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Excel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Excel as ExcelType; 
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail; 
class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $answers = $request->answers;
        // $questions = $request->questions;
        // $datetime = $request->datetime;
        //dd($datetime);
        
        $questions = $request->input('questions');
        $answers = $request->input('answer');
        $datetime = $request->input('datetime');
        
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $datetime = explode(' ',$datetime);
        if($questions){
             // Logic for Excel Creation
                $heading_array = array('Id','Name','Submitted on','Interview Date','Interviwe Time');
                $arrLen = count(array_merge($heading_array,$questions));
                $user_array[] = array_merge($heading_array,$questions);
                $data_array = array(
                    'Id' => Auth::user()->id,
                    'Name' => Auth::user()->name,
                    'Submitted on' => date("Y/m/d"),
                    'Interview Date' => $datetime[0],
                    'Interview Time' => $datetime[1]." ". $datetime[2],
                    
                );
                for($i=0;$i< count($answers);$i++){
                    $answer_array[] = $answers[$i]; 
                }
                $user_array[] = array_merge($data_array,$answer_array);
                $time = date('-h-i-s');
                $filename=Auth::user()->name.'_'.date('m-d-Y'.$time).'.xlsx';
    
                $array = $user_array;
    
                  \Excel::store(new class($array) implements FromArray{ 
                    public function __construct($array)
                    {
                        $this->array = $array;
                    }
                    public function array(): array
                    {
                        return $this->array;
                    }
                },'uploads/release/'.$filename, 'real_public');

             // Database operation here
             for($i=0;$i<count($questions);$i++){
                $data['questions'] = $questions[$i];
                $data['answers'] = $answers[$i];
                $data['user_name'] = $user_name;
                $data['user_id'] = $user_id;
                $data['interview_date'] = $datetime[0];
                $data['interview_time'] = $datetime[1]." ". $datetime[2];
                $data['excel_file'] = $filename;
                Answers::create($data);
             }
            return redirect('user/question-list')->with('success', 'Thanks, Data inserted successfully');
        }


    }

    public function getAnswerList(){
                
        $answerList = Answers::groupBy('created_at')->get();
        return view('admin.answers',["answerList"=>$answerList]);
    }

    public function download($id){
        $data = Answers::find($id);
        if($data){
             $file_name= $data['excel_file'];
             $path = public_path()."/uploads/release/".$file_name;
             return response()->download($path);
        }    
    }


    public function emailSendToUser($id){
        $data = Answers::find($id);
        $userData = User::find($data->user_id);
        if($userData->email){
           
            $file_name= $data['excel_file'];
            $path = public_path()."/uploads/release/".$file_name;
            $details = [
                'name' => $userData->name,
                'title' => 'Answer Details',
                'message' => 'Below is the detail mentioned for your Interveiw date and time.',
                'password' => '',
                'attachement' => $path,
                'link' => request()->getHost()
            ];
            Mail::send('emails.attechment',$details, function($message) use ($userData,$path){
                $message->to($userData->email,'Answer Details')->subject('Estimate system');
                $message->from('info@estimate.com','We Provide Estimate Service');
                $message->attach($path);

            });
            //Mail::to($userData->email)->send(new WelcomeMail($details));
            return redirect('admin/answers-list')->with('success','Email Sent Successfully!');
       }
    }

    public function getExcel(){
       $questions = ['What is your name','Where from you','Are you student'];
       $answers = ['My name is Rohit','I am from karachi','Yes I am student'];
       $heading_array = array('Id','Name','Submitted on','Interview Date','Interviwe Time');
       $arrLen = count(array_merge($heading_array,$questions));
       $user_array[] = array_merge($heading_array,$questions);
       
            //for($i=0;$i< ($arrLen);$i++){
                $data_array = array(
                    'Id' => Auth::user()->id,
                    'Name' => Auth::user()->name,
                    'Submitted on' => date("Y/m/d"),
                    'Interview Date' => '12 June',
                    'Interview Time' => '8 PM',
                    
                );
            //}
            
            for($i=0;$i< count($answers);$i++){
                $answer_array[] = $answers[$i]; 
            }
            $user_array[] = array_merge($data_array,$answer_array);
            //echo "<pre>";print_r($user_array);echo "</pre>";die;

            //return Excel::download(new BulkExport,'getanswers.xlsx');
              
            //$array = [[1,2,3],[3,2,1]];
            $time = date('-h-i-s');
            $filename=Auth::user()->name.'_'.date('m-d-Y'.$time).'.xlsx';

            $array = $user_array;

            return  \Excel::store(new class($array) implements FromArray{ 
                public function __construct($array)
                {
                    $this->array = $array;
                }
                public function array(): array
                {
                    return $this->array;
                }
            },'uploads/release/'.$filename, 'real_public');  

// return  \Excel::download(new class($array) implements FromArray{ 
//             public function __construct($array)
//             {
//                 $this->array = $array;
//             }
//             public function array(): array
//             {
//                 return $this->array;
//             }
//         },'db.xlsx', ExcelType::XLSX);  

    }
}
