<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Session;
class sale_equip extends Model
{
    protected $table='sale_equip';
    public static function insert_se($seq_id,$mb_id,$price_total){
    $insert_se=array (
    "seq_id"=> $seq_id,
    "mb_id" =>  $mb_id,
    "price_total" =>  $price_total,
    "em_id"=>Session::get('em_id'),

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
        $AllSale_equip=DB::table("sale_equip as sa")
        ->join('member as m','m.mb_id','=','sa.mb_id')
        ->select('sa.*','m.*')
        ->orderBy("sa.created_at","DESC")->get();

        return $AllSale_equip; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

    }

    public static function loadDataSale_equip($seq_id){ //โหลดข้อมูล
        $data=DB::table("sale_equip")
        ->where("seq_id","=",$seq_id)
        ->get();

       return $data; //ส่งข้อมูลให้คอนโทลเลอร์
    }





}
