<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
class Selleqm extends Controller
{

    public function Selleqm(){
        $data['selleqm']=Selleqm::loadsellmilk();
        return view('selleqm',$data);
    }

}
