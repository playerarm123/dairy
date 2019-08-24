<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class equip extends Model
{
    protected $table ='equip';
    public static function insert_eq($eq_name,$eq_cate,$eq_unit,$equ_price){

   $eq=array(
    "eq_name"=> $eq_name,
    "eq_cate"=> $eq_cate,
    "eq_unit"=> $eq_unit,
    "eq_price"=> $equ_price

          );

          DB::table("equip")->insert($eq);

    }
    public static function checkEq_name($eq_name){
        $data=DB::table("equip")
        ->where("eq_name","=",$eq_name)
        ->get();
        $row=count($data);

       return $data;

    }

    public static function Update_eq($eq_id,$eq_name,$eq_cate,$eq_unit,$equ_price){

        $update_eq=array(
            "eq_id"=> $eq_id,
            "eq_name"=> $eq_name,
            "eq_cate"=> $eq_cate,
            "eq_unit"=> $eq_unit,
            "eq_price"=> $equ_price

                );



        DB::table("equip")->where("eq_id","=",$eq_id)->update($update_eq);


    }
    public static function Delete_eq($eq_id){

        DB::table("equip")
        ->where("eq_id","=",$eq_id)
        ->delete();



   }


    public static function loadAllEquip(){
        $AllEquip=DB::table("equip")->orderBy("created_at","DESC")->get();

        return $AllEquip; //รีเทินข้อมูลสมาชิกทั้งหมดกลับ

       }


}
