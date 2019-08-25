<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Sale_milk extends Model
{
    protected $table='sale_milk';
    public static function insert_sm($pn_id,$sm_wiegh,$sm_price,$sm_date,$sm_pricetotal){
    $sm_insert=array (

    "pn_id"=> $pn_id,
    "sm_wiegh"=> $sm_wiegh,
    "sm_price"=> $sm_price,
    "sm_date"=> $sm_date,
    "sm_pricetotal"=> $sm_pricetotal,
    "sm_status"=>"พร้อมใช้งาน"
    );



    DB::table("sale_milk")->insert($sm_insert );


    }

    public static function Update_sm($sm_id,$pn_id,$sm_wiegh,$sm_price,$sm_date,$sm_pricetotal){
        $update_sm=array(

    "sm_id" => $sm_id,
    "pn_id"=> $pn_id,
    "sm_wiegh"=> $sm_wiegh,
    "sm_price"=> $sm_price,
    "sm_date"=> $sm_date,
    "sm_pricetotal"=> $sm_pricetotal,
    "sm_status"=>"พร้อมใช้งาน"
    );



        DB::table("sale_milk")->where("sm_id","=",$sm_id)->update($update_sm);




     }
     public static function Delete_sm($sm_id){

        DB::table("sale_milk")
        ->where("sm_id","=",$sm_id)
        ->delete();



    }


    public static function loadAllSale_milk(){
        $AllSaleMilk=DB::table("sale_milk")->orderBy("created_at","DESC")->get();

        return $AllSaleMilk; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

    }

    public static function loadDataSale_milk($sm_id){ //โหลดข้อมูล
        $data=DB::table("sale_milk")
    ->where("sm_id","=",$sm_id)
    ->get();

    return $data; //ส่งข้อมูลให้คอนโทลเลอร์
    }


}
