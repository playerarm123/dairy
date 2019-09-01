<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
use App\sale_equip;
use App\equip;
class Selleqm extends Controller
{

    public function __construct()
    {
        $this->middleware('checklogin');
    }

    public function Saleeq(){ //หน้าขายอุปกรณ์
        $data['saleeq']=sale_equip::loadAllSale_equip();

        return view('saleeq',$data);
    }

    public function Canceleq($id){
        sale_equip::Canceleq($id);
        Session::put('cancel','success');
    }
    public function Uplist(){
        $data['equip']=equip::loadAllEquip();
        return view ('list_saleeq',$data);

    }
}
