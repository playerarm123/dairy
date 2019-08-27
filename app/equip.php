<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class equip extends Model

//เสร็จแล้ว
{
    protected $table ='equip';
    public static function insert_eq($eq_name,$eq_cate,$eq_unit,$eq_price){

   $eq=array(
    "eq_name"=> $eq_name,
    "eq_cate"=> $eq_cate,
    "eq_unit"=> $eq_unit,
    "eq_price"=> $eq_price,
    "eq_status"=> "พร้อมใช้งาน"

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

    public static function Update_eq($eq_id,$eq_name,$eq_cate,$eq_unit,$eq_price){

        $update_eq=array(
            "eq_id"=> $eq_id,
            "eq_name"=> $eq_name,
            "eq_cate"=> $eq_cate,
            "eq_unit"=> $eq_unit,
            "eq_price"=> $eq_price,
            "eq_status"=> "พร้อมใช้งาน"
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

    public static function loadDataEquip($eq_name){ //โหลดข้อมูล

        $data=DB::table("equip")
        ->where("eq_name","=", $eq_name)
        ->get();

         return $data; //ส่งข้อมูลให้คอนโทลเลอร์

    }

       public static function Cancleeq($eq_id){
        $eq_Cancel =array(
            "eq_status"=> "ยกเลิก"
        );
            DB::table('equip')->where("eq_id","=",$eq_id)->update($eq_Cancel);

    }


    public static function checkDelete($eq_id){
        $list_receive_equip= DB::table("list_receive_equip")  ->where("eq_id","=",$eq_id) ->count();
        $list_sale_equip= DB::table("list_sale_equip")            ->where("eq_id","=",$eq_id) ->count();

           if($list_receive_equip !=0 || $list_sale_equip !=0  ){
               $checkDelete = "no";



           }
           else{
               $checkDelete = "yes";

           }
           dd($checkDelete);
           return $checkDelete; //ถ้าค่า=no ลบไม่ได้  =yes ลบได้
       }

}
