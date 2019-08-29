<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\sale_milk;
use App\partners;
use App\Milk;
class Sellmilk extends Controller
{
    public function __construct()
    {
        $this->middleware('checklogin');
    }


     public function Salemilk(){
        $data['salemilk']=sale_milk::loadAllSale_milk();
        $data['grade']=Milk::loadAllMilk();
           return view('salemilk',$data);
     }

    public function Savesalemilk(Request $req){ //บันทึกข้อการขายน้ำนม
        $pn_id=$req->input('partnersid');
        $milk_id=$req->input('grade');
        $sm_weight=$req->input('weight');
        $sm_pricetotal=$req->input('total');
        Sale_milk::insert_sm($pn_id,$milk_id,$sm_weight,$sm_pricetotal);
        Session ::put('save','success');
        return redirect('salemilk');
    }

    public function Detailsalemilk($id){ //แสดงรายละเอียดข้อมูลการขายน้ำนม
        $data['salemilk']=Sale_milk::loadDataSale_milk($id);
       return view ('show_datasalemilk',$data);
    }


}
