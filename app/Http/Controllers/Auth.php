<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
class Auth extends Controller
{
    public function __construct(){
        $status=Session::get('username');
       
        if($status != 'true'){
            return redirect ('login');
        }
    }
    public  function ShowLoginForm(){
        
        return view('login_v');
    }   
    public function verifyLg(Request $req){
        $user=$req->input('username');
        $password=$req->input('password');
        $result=Employee::login($user,$password);
        if($result==1){
            Session::put('username',$user);
            Session::put('Statuslogin','true');
            return redirect('home');
        }else{
            return redirect('login');
        }

    }
    public function ShowHome(){
        return view('home');
    }
    public function Logout(){
        Session::forget('username');
        Session::forget('Statuslogin');
        return redirect('login');
    }
}
