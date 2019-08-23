<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Sale_equip extends Model
{
    protected $table='Sale_equip';
    public static function se_insert($sq_id,$em_id,$mb_id,$sq_date){
    $se=array (
    "Sq_id"=>   $sq_id,
    "Em_id" =>  $em_id,
    "Mb_id"    =>  $mb_id,
    "Sq_date"=>  $sq_date
    );



    DB::table("Sale_equip")->insert($se );


    }
    
    public static function Update_se($sq_id,$em_id,$mb_id,$sq_date){
        $update_se=array(
            "Sq_id"=>   $sq_id,
            "Em_id" =>  $em_id,
            "Mb_id"    =>  $mb_id,
            "Sq_date"=> $sq_date
            );
        
        DB::table("Sale_equip")->where("Sq_id","=",$sq_id)->update($update_se);
 
          
 
        
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
