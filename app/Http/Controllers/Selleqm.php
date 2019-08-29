<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
use App\sale_equip;
class Selleqm extends Controller
{

    public function __construct()
    {
        $this->middleware('checklogin');
    }

    public function Saleeq(){
        $data['saleeq']=sale_equip::loadAllSale_equip();

        return view('saleeq',$data);
    }

}
