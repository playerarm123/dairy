<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Buy_equip extends Model
{
    protected $table = 'buy_equip';
    public static function bq_insert($bq_id,$em_id,$mb_id,$bq_date)
    { 
            $bq_in=array(
                "em_id"=> $em_id,
                "mb_id"=> $mb_id,
                "bq_date" => $bq_date
            );
   
   
   
        DB::table("buy_equip")->insert($bq_in);
    }



    public static function Update_bq($bq_id,$mb_id,$em_id,$bq_date){
        $bq_up=array(

            "em_id"=> $em_id,
            "mb_id"=> $mb_id,
            "bq_date" => $bq_date
         
        );
         DB::table("buy_equip")->where("bq_id","=",$bq_id)->update($bq_up);
 
          
 
 
     }
     public static function Delete_bq($bq_id){

        DB::table("buy_equip")
        ->where("bq_id","=",$bq_id)
        ->delete();
    }

    public static function loadAllBuy_equip(){
        $AllBuy_equip=DB::table("Buy_equip")->orderBy("created_at","DESC")->get();
    
        return $AllBuy_equip; //รีเทินข้อมูลซื้ออุปกรณ์ทั้งหมดกลับ
    
       }
   


     
    
}
