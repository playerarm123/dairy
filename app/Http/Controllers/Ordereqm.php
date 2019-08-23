<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
class Ordereqm extends Controller
{
   
    public function Ordereqm(){
        return view('oder');
    }
    
}
