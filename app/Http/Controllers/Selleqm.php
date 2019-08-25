<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
class Selleqm extends Controller
{

    public function Selleqm(){
        // $data['sellpro']=Selleqm::loadselleqm();
        return view('sellpro');
    }

}
