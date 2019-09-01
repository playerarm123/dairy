<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
use DB;
class Auth extends Controller
{
    public  function ShowLoginForm(){
        return view('login_v');
    }
    public function verifyLg(Request $req){
        $user=$req->input('username');
        $password=$req->input('password');
        $result=Employee::login($user,$password);
        if($result==1){
            $user = Employee::where('em_username','=',$user)->get();
            Session::put('em_id',$user[0]->em_id);
            Session::put('fname',$user[0]->em_name);
            Session::put('lname',$user[0]->em_lastname);
            Session::put('position',$user[0]->em_position);
            Session::put('username',$user);
            Session::put('Statuslogin','true');
            return redirect('home');
        }else{
            return redirect('login');
        }

    }
    public function loadLogo(){
        $data = DB::table('cooper')->select('coop_logo')->get();
        $logo = $data[0]->coop_logo;
        return $logo;
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
