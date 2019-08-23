<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Receive_equip extends Model
{
    protected $table = 'Receive_equip';
    public static function Rp_insert($Rp_id,$Em_id,$Ag_id,$Rp_date)
    { 
            $Rp=array(
                "Rp_id"=> $Rp_id,
                "Em_id"=> $Em_id,
                "Ag_id"=> $Ag_id,
                "Rp_date"=> $Rp_date
                
                           );
   
   
   
        DB::table("Receive_equip")->insert($Rp);
    }
    public static function Rp_Update($Rp_id,$Em_id,$Ag_id,$Rp_date){
        $Rp_update=array(
            "Rp_id"=> $Rp_id,
            "Em_id"=> $Em_id,
            "Ag_id"=> $Ag_id,
            "Rp_date"=> $Rp_date
         
        );
        DB::table("Receive_equip")->where("Rp_id","=",$Rp_id)->update($Rp_update);
 
          
 
        
     }
     public static function Rp_Delete($Rp_id){

        DB::table("Receive_equip")
        ->where("Rp_id","=",$Rp_id)
        ->delete();



    }

              
    public static function loadAllReceive_equip(){
        $AllReceive_equip=DB::table("Receive_equip")->orderBy("created_at","DESC")->get();

        return $AllReceive_equip; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

    }

}
