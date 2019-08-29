<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Sale_milk extends Model
{
    protected $table='sale_milk';
    public static function insert_sm($em_id,$pn_id,$sm_pricetotal,$sm_date,$sm_wiegh,$milk_id){
    $sm_insert=array (
    "em_id"=> $em_id,
    "pn_id"=> $pn_id,
    "sm_pricetotal"=> $sm_pricetotal,
    "sm_date"=> $sm_date,
    "sm_wiegh"=> $sm_wiegh,
    "milk_id"=>$milk_id,
    "sm_status"=>"พร้อมใช้งาน"
    );



    DB::table("sale_milk")->insert($sm_insert );


    }

    public static function Update_sm($sm_id,$em_id,$pn_id,$sm_pricetotal,$sm_date,$sm_wiegh,$milk_id){
        $update_sm=array(

    "sm_id" => $sm_id,
    "em_id"=> $em_id,
    "pn_id"=> $pn_id,
    "sm_pricetotal"=> $sm_pricetotal,
    "sm_date"=> $sm_date,
    "sm_wiegh"=> $sm_wiegh,
    "milk_id"=>$milk_id,
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


    public static function checkDelete($sm_id){
        $receive_money= DB::table("receive_money")    ->where("sm_id","=",$sm_id) ->count();

           if($receive_money != 0 ){
               $checkDelete = "no";



           }
           else{
               $checkDelete = "yes";

           }
        dd($checkDelete);
           return $checkDelete; //ถ้าค่า=no ลบไม่ได้  =yes ลบได้
       }



}
