<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
//use App\Models\Role;
use App\Models\User;
use App\Models\Questions;
use App\Models\Answers;
class DashboardController extends Controller
{
    public function index(){

        if(Auth::user()->hasRole('user') && Auth::user()->approved == 0){ 
            Auth::guard('web')->logout();
            return redirect('/');
        }
        if(Auth::user()->hasRole('user')){
            //return view('users.index');
            return redirect('user/question-list');    
        }//elseif(Auth::user()->hasRole('admin')){
            return redirect('admin/dashboard');
        //}
        
    }

    public function adminDashboard(){
        $totalUsers = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'user');
        })->get()->count();

        $approvedUsers = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'user')->where('approved', '=', '1');
        })->get()->count();

        $pendingUsers = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'user')->where('approved', '=', '0');
        })->get()->count();

        $questions = Questions::orderBy('created_at','DESC')->get()->count();
        $answers = Answers::groupBy('created_at')->get()->count();
        $data = array('total_users' => $totalUsers,'approved_users' => $approvedUsers,'pending_users' => $pendingUsers,'questions' => $questions,'answers' =>$answers);
        
        return view('admin.index',['data'=>$data]);
    }
}
