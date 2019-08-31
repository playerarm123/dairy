<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class sale_equip extends Model
{
    protected $table='sale_equip';
    public static function insert_se($em_id,$mb_id,$seq_date){
    $insert_se=array (

    "em_id" =>  $em_id,
    "mb_id" =>  $mb_id,
    "seq_date"=>  $seq_date,
    "seq_status"=>"พร้อมใช้งาน"
    );



    DB::table("sale_equip")->insert($insert_se );


    }

    public static function Update_se($seq_id,$em_id,$mb_id,$seq_date){
        $update_se=array(
            "seq_id"=>   $seq_id,
            "em_id" =>  $em_id,
            "mb_id"    =>  $mb_id,
            "seq_date"=> $seq_date,
            "seq_status"=>"พร้อมใช้งาน"
            );

        DB::table("sale_equip")->where("seq_id","=",$seq_id)->update($update_se);




     }
     public static function Delete_se($seq_id){

        DB::table("sale_equip")
        ->where("seq_id","=",$seq_id)
        ->delete();



    }

    public static function loadAllSale_equip(){
        $AllSale_equip=DB::table("sale_equip")->orderBy("created_at","DESC")->get();

        return $AllSale_equip; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

    }
    public static function loadDataSale_equip($seq_id){ //โหลดข้อมูล
        $data=DB::table("sale_equip")
    ->where("seq_id","=",$seq_id)
    ->get();

    return $data; //ส่งข้อมูลให้คอนโทลเลอร์
    }





}
