<?php

namespace App;
// เสร็จแล้ว
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Session;
class Buymilk extends Model
{
    public static function bm_insert($mb_id,$milk_id,$bm_weight,$bm_pricein,$bm_range){
        $Bm=array(
            "em_id"=> Session::get("em_id"),
            "mb_id"=> $mb_id,
            "milk_id"=> $milk_id,
            "bm_weight"=> $bm_weight,
            "bm_pricein"=> $bm_pricein,
            "bm_date"=> date("Y-m-d"),
            "bm_range"=>$bm_range,
            "bm_status"=> "พร้อมใช้งาน"
        );
        DB::table("buy_milk")->insert($Bm);

    }


    public static function loadAllBuymilk(){
        $AllBuymilk=DB::table("buy_milk")->orderBy("created_at","DESC")->get();
        return $AllBuymilk; //รีเทินข้อมูลสมาชิกทั้งหมดกลับ
    }

    public static function loadDataBuymilk($bm_id){ //โหลดข้อมูล
        $data=DB::table("buy_milk")
    ->where("bm_id","=",$bm_id)
    ->get();

    return $data; //ส่งข้อมูลให้คอนโทลเลอร์
    }


    public static function Canclebm($bm_id){
        $bm_Cancel =array(
            "bm_status"=> "ยกเลิก"
        );
            DB::table('buy_milk')->where("bm_id","=",$bm_id)->update($bm_Cancel);
    }


    public static function checkDelete($bm_id){
        $pay_milk= DB::table("pay_milk")    ->where("bm_id","=",$bm_id) ->count();

           if($pay_milk != 0 ){
               $checkDelete = "no";



           }
           else{
               $checkDelete = "yes";

           }
        dd($checkDelete);
           return $checkDelete; //ถ้าค่า=no ลบไม่ได้  =yes ลบได้
       }


}


