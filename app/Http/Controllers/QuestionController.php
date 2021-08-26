<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $questions = Questions::orderBy('created_at','DESC')->get();
        
        return view('admin/questions',["questions"=>$questions]);
    }

    // Code should be remov after the implementation of vue call
    public function getQuestionList(){
        $questions = Questions::orderBy('created_at','DESC')->get();
        
        return view('users/index',["questions"=>$questions]);  
    }

    public function getAllQuestionList(){
        $data = Questions::orderBy('created_at','DESC')->get();
        return response($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Test";die;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['questions'] = $request->input('question');;
        Questions::create($data);

        return redirect('admin/questions');

    }

    public function getQuestionDetail(Request $request){
        $questionDetail = Questions::find($request->id);
        if($questionDetail){
            return ['msg' => 'success','data' =>$questionDetail];
        }
        return ['msg' => 'error'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $questionDetail = Questions::find($id);
        if ( $questionDetail ){
            $questionDetail->questions =$request->input('question');
            $questionDetail->save();
            return redirect('admin/questions');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Questions::find($id);
        $data->delete();
        return redirect('admin/questions');
    }
}
