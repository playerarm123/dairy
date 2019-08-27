<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Salemilk;
use App\partners;
use App\Milk;
class Sellmilk extends Controller
{
    public function __construct()
    {
        $this->middleware('checklogin');
    }


     public function Sellmilk(){
        $data['sellmilk']=Salemilk::loadAllSale_milk();
        $data['grade']=Milk::loadAllMilk();
           return view('sellmilk',$data);
     }

    public function Savesellmilk(Request $req){ //บันทึกข้อการขายน้ำนม
        $sm_id=$req->input('');
        $em_id=$req->input('');
        $pn_id=$req->input('');
        $sm_wiegh=$req->input('');
        $sm_price=$req->input('');
        $sm_date=$req->input('');
        Salemilk::sm_insert($sm_id,$em_id,$pn_id,$sm_wiegh,$sm_price,$sm_date);
        Session ::put('save','success');
        return redirect('sellmilk');
    }

    public function Detailsellmilk($id){ //แสดงรายละเอียดข้อมูลการขายน้ำนม
        $data['salemilk']=Salemilk::loadAllSaleMilk($id);
       return view ('show_datasellmilk',$data);
    }
    public function Searchpartners($id){ //ค้นหาสมาชิก
        $data=partners::Searchpartners($id);
       return $data;
    }

}
