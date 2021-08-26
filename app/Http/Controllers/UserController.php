<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Carbon; 
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(Request $request){

        $filter = str_replace("=","",$request->getQueryString());
        if($filter == 'pending'){
            $status = [0];
        }else if($filter == 'approved'){
            $status = [1];
        }else{

            $status = [1,0];
        }
       
        $users = User::whereHas('roles', function($role) use ($status) {
            $role->where('name', '=', 'user')->whereIn('approved', $status);
        })->get();
        
        return view('admin.users',["users"=>$users]);

    }

    public function updateStatus(Request $request){
        
        $existingUser = User::find($request->id);
        
        if($existingUser){
            $existingUser->approved = ($request->is_approve) == 'YES' ? 1: 0;
            $existingUser->save();
            $this->sendEmailToUSer($existingUser['id'],$existingUser['name'],$existingUser->approved,$existingUser['email']);
            return["status" => "success", "approved" => $existingUser->approved];
        }
        return["status" => "error"];
    }

    public function sendEmailToUSer($id,$name,$status,$email){
        $details = [
            'name' => $name,
            'title' => 'Disapprove',
            'message' => 'We are sorry admin has deactivted you from the list',
            'password'=>'',
            'link' => ''
        ];
        if($status == 1){
            $password = $this->generateRandomString();
            $details = [
                'name' => $name,
                'title' => 'Congratulation',
                'message' => 'Admin has approved your request your password is below',
                'password' => $password,
                'link' => request()->getHost()
            ];
            
            $newUSer = User::find($id);
            if($newUSer){
                $newUSer->password = Hash::make($password);
                $newUSer->save();
            }
            
        }
        try {
            Mail::to($email)->send(new WelcomeMail($details));
            
        } catch (\Exception $e) {
            return 'Error';
        }   
        

    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getList()
    {
        return User::orderBy('created_at','DESC')->get();
    }

    public function store(Request $request)
    {
        $user =  new User;
        $user->name = $request->item['name'];
        $user->email = "paki13@gmail.com";
        $user->password = "test123";
        $user->phone = "33333";
        $user->save();
        return $user;
    }

    public function update(Request $request, $id)
    {
        $existingItem = User::find($id);
        if ( $existingItem ){
            //$existingItem->name = $request->item['name'] ? true : false;
            $existingItem->name = $request->item['name'] ;
            //$existingItem->updated_at = $request->item['completed'] ? Carbon::now() : null;
            $existingItem->save();
            return $existingItem;

        }

        return "User not found.";
    }
}
