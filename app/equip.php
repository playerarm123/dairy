<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class equip extends Model
{
    protected $table ='equip';
    public static function insert_equ($equ_id,$equ_name,$equ_number,$equ_price){

   $equ=array(
    "Equ_id"=>$equ_id,
    "Equ_name"=> $equ_name,
    "Equ_number"=> $equ_number,
    "Equ_price"=> $equ_price

          );

          DB::table("equip")->insert($equ);

    }
    public static function checkEqu_name($equ){
        $data=DB::table("equip")
        ->where("Equ_name","=",$equ_name)
        ->get();
        $row=count($data);
        
       return $data;  //สร้างเพื่อเช็คข้อมูลว่าซ้ำในดาต้าเบสไหม ขั้นตอนการสมัคร
      
    }
    public static function checkEqu_number($equ_number){
        $data=DB::table("equip")
        ->where("Equ_number","=",$equ_number)
        ->get();
        $row=count($data);
        
       return $data;  //สร้างเพื่อเช็คข้อมูลว่าซ้ำในดาต้าเบสไหม ขั้นตอนการสมัคร
      
    }

        
    public static function Update_equ($equ_id,$equ_name,$equ_number,$equ_price){

        $update_equ=array(
            "Equ_id"=> $equ_id,
            "Equ_name"=> $equ_name,
            "Equ_number"=> $equ_number,
            "Equ_price"=> $equ_price
        
                );

            
                    
        DB::table("equip")->where("Equ_id","=",$equ_id)->update($update_equ);


    }
    public static function Delete_pro($equ_id){

        DB::table("equip")
        ->where("Equ_id","=",$equ_id)
        ->delete();



   }

    
    public static function loadAllEquip(){
        $AllEquip=DB::table("equip")->orderBy("created_at","DESC")->get();
   
        return $AllEquip; //รีเทินข้อมูลสมาชิกทั้งหมดกลับ
   
       }


}
