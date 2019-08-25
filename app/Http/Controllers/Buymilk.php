<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Buymilk as buymilks;
use App\Member;
class Buymilk extends Controller

{

    public function Buymilk(){
        $data['buymilk']=buymilks::loadAllBuymilk();
        return view('buymilk',$data);
    }

    public function Savebuymilk(Request $req){ //บันทึกข้อการซื้อน้ำนมมูลน้ำนม
        $em_id=$req->input('em_id');
        $mb_id=$req->input('mb_id');
        $milk_id=$req->input('milk_id');
        $bm_wiegh=$req->input('wiegh');
        $bm_pricein=$req->input('price');
        $bm_date=$req->input('date');
        $bm_range=$req->input('rang');
        buymilks::bm_insert($em_id,$mb_id,$milk_id,$bm_wiegh,$bm_pricein,$bm_date,$bm_range);
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
