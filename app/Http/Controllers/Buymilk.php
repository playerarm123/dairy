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

    public function Savebuymilk(Request $req){ //บันทึกข้อการซื้อน้ำนมมูลน้ำนม
        $mb_id=$req->input('memberid');
        $bm_grade=$req->input('grade');
        $bm_wiegh=$req->input('wiegh');
        $bm_pricein=$req->input('pricein');
        $bm_range=$req->input('range');
        buymilks::bm_insert($mb_id,$bm_grade,$bm_wiegh,$bm_pricein,$bm_range);
        Session::put('save','success');
        return redirect('buymilk');
    }

    public function Detailbuymilk($id){ //แสดงรายละเอียดข้อมูลการซื้อน้ำนม
        $data['buymilk']=buymilks::loadAllBuymilk($id);
       return view ('show_databuymilk',$data);
    }


    public function Searchmem($id){ //ค้นหาสมาชิก
        $data=Member::searchMem($id);
       return $data;
    }
}
