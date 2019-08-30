<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Buymilk as buymilks;
use App\Member;
use App\Milk;
class Buymilk extends Controller

{
    public function __construct()
    {
        $this->middleware('checklogin'); //การเรียกใช้ฟังชั่นในคลาสเดียวกัน
    }

    public function Buymilk(){
        $data['buymilk']=buymilks::loadAllBuymilk();
        $data['grade']=Milk::loadAllMilk();
        return view('buymilk',$data);
    }

    public function Savebuymilk(Request $req){ //บันทึกข้อมูลการซื้อน้ำนม
        $mb_id=$req->input('memberid');
        $milk_id=$req->input('grade');
        $bm_weight=$req->input('weight');
        $bm_pricein=$req->input('total');
        $bm_range=$req->input('range');
        buymilks::bm_insert($mb_id,$milk_id,$bm_weight,$bm_pricein,$bm_range);
        Session::put('save','success');
        return redirect('buymilk');
    }

    public function Detailbuymilk($id){ //แสดงรายละเอียดข้อมูลการซื้อน้ำนม
        $data['buymilk']=buymilks::loadDataBuymilk($id);
       return view ('show_buymilk',$data);
    }

    public function Searchmem($id){ //ค้นหาสมาชิก
        $data=Member::searchMem($id);
       return $data;
    }

    public function Cancelbuymilk($id){ //ยกเลิก
        buymilks::Canclebm($id);
        Session::put('cancel','success');
    }
}
