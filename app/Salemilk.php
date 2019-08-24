<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Salemilk extends Model
{
    protected $table='salemilk';
    public static function sm_insert($em_id,$pn_id,$sm_wiegh,$sm_price,$sm_date,$sm_pricetotal){
    $sm_insert=array (

    "em_id" => $em_id,
    "pn_id"=> $pn_id,
    "sm_wiegh"=> $sm_wiegh,
    "sm_price"=> $sm_price,
    "sm_date"=> $sm_date,
    "sm_pricetotal"=> $sm_pricetotal,
    "sm_status"=>"พร้อมใช้งาน"
    );



    DB::table("salemilk")->insert($sm_insert );


    }

    public static function Update_sm($sm_id,$em_id,$pn_id,$sm_wiegh,$sm_price,$sm_date){
        $update_sm=array(
            "sm_id"=> $sm_id,
            "em_id" => $em_id,
            "pn_id"=> $pn_id,
            "sm_wiegh"=> $sm_wiegh,
            "sm_price"=> $sm_price,
            "sm_date"=> $sm_date,
            "sm_status"=>"พร้อมใช้งาน"

        );
        DB::table("salemilk")->where("Sm_id","=",$sm_id)->update($update_sm);




     }
     public static function Delete_sm($sm_id){

        DB::table("salemilk")
        ->where("sm_id","=",$sm_id)
        ->delete();



    }


    public static function loadAllSaleMilk(){
        $AllSaleMilk=DB::table("salemilk")->orderBy("created_at","DESC")->get();

        return $AllSaleMilk; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

    }


}
