<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
class Selleqm extends Controller
{

    public function __construct()
    {
        $this->middleware('checklogin');
    }

    public function Saleeq(){
        $data['saleeq']=Selleqm::loadDataSale_equip();

        return view('saleeq');
    }

}
