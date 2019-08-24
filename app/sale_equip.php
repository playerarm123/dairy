<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Sale_equip extends Model
{
    protected $table='Sale_equip';
    public static function insert_se($em_id,$mb_id){
    $se_insert=array (

    "em_id" =>  $em_id,
    "mb_id"    =>  $mb_id

    );



    DB::table("Sale_equip")->insert($se_insert );


    }

    public static function Update_se($seq_id,$em_id,$mb_id){
        $update_se=array(
            "seq_id"=>   $seq_id,
            "em_id" =>  $em_id,
            "mb_id"    =>  $mb_id
            );

        DB::table("Sale_equip")->where("seq_id","=",$seq_id)->update($update_se);




     }
     public static function Delete_se($sq_id){

        DB::table("Sale_equip")
        ->where("Sq_id","=",$sq_id)
        ->delete();



    }

    public static function loadAllSale_equip(){
        $AllSale_equip=DB::table("Sale_equip")->orderBy("created_at","DESC")->get();

        return $AllSale_equip; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

    }
}
