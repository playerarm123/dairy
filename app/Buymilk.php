<?php

namespace App;
// ทดสอบ clone git
// ใช้ได้แล้ว
//  sdfsdfs;
//mmmmmm
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Buymilk extends Model
{
    public static function bm_insert($em_id,$mb_id,$milk_id,$bm_wiegh,$bm_pricein,$bm_date,$bm_range){
        $Bm=array(
            "em_id"=> $em_id,
            "mb_id"=> $mb_id,
            "milk_id"=> $milk_id,
            "bm_wiegh"=> $bm_wiegh,
            "bm_pricein"=> $bm_pricein,
            "bm_date"=> $bm_date,
            "bm_range"=>$bm_range,
            "bm_status"=> "พร้อมใช้งาน"
        );
        DB::table("buymilk")->insert($Bm);

    }


    public static function loadAllBuymilk(){
        $AllBuymilk=DB::table("buymilk")->orderBy("created_at","DESC")->get();
        return $AllBuymilk; //รีเทินข้อมูลสมาชิกทั้งหมดกลับ
    }


    public static function Cancelbm($bm_id){
        $bm_Cancel =array(
            "bm_status"=> "ยกเลิก"
        );
            DB::table('buymilk')->where("bm_id","=",$bm_id)->update($bm_Cancel);





    }

}
