<?php

namespace App;
// ทดสอบ clone git
// ใช้ได้แล้ว
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Buymilk extends Model
{
    public static function bm_insert($em_id,$mb_id,$milk_id,$bm_wiegh,$bm_price,$bm_date,$bm_range,$bm_cumulative){
        $Bm=array(
            "em_id"=> $em_id,
            "mb_id"=> $mb_id,
            "milk_id"=> $milk_id,
            "bm_wiegh"=> $bm_wiegh,
            "bm_price"=> $bm_price,
            "bm_date"=> $bm_date,
            "bm_range"=>$bm_range,
            "bm_cumulative"=>$bm_cumulative
        );
        DB::table("buymilk")->insert($Bm);

    }

    public static function bm_update($em_id,$mb_id,$bm_id,$bm_wiegh,$bm_price,$bm_date,$bm_range,$bm_cumulative){
        $bm_up=array(
            "em_id"=> $em_id,
            "mb_id"=> $mb_id,
            "bm_id"=> $bm_id,
            "bm_wiegh"=> $bm_wiegh,
            "bm_price"=> $bm_price,
            "bm_date"=> $bm_date,
            "bm_range"=>$bm_range,
            "bm_cumulative"=>$bm_cumulative
        );
        DB::table("buymilk")->where("milk_id","=",$bm_id)->update($bm_up);

    }
    public static function Delete_bm($bm_id){
        DB::table("buymilk")
            ->where("bm_id","=",$bm_id)
            ->delete();
    }
    public static function loadAllBuymilk(){
        $AllBuymilk=DB::table("buymilk")->orderBy("created_at","DESC")->get();
        return $AllBuymilk; //รีเทินข้อมูลสมาชิกทั้งหมดกลับ
    }

}
