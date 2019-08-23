<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Salemilk extends Model
{
    protected $table='salemilk';
    public static function sm_insert($sm_id,$em_id,$pn_id,$sm_wiegh,$sm_price,$sm_date){
    $sm=array (
    "Sm_id"=> $sm_id,
    "Em_id" => $em_id,
    "Pn_id"=> $pn_id,
    "Sm_wiegh"=> $sm_wiegh,
    "Sm_price"=> $sm_price,
    "Sm_date"=> $sm_date
    );



    DB::table("salemilk")->insert($sm );


    }
    
    public static function Update_sm($sm_id,$em_id,$pn_id,$sm_wiegh,$sm_price,$sm_date){
        $update_sm=array(
            "Sm_id"=> $sm_id,
            "Em_id" => $em_id,
            "Pn_id"=> $pn_id,
            "Sm_wiegh"=> $sm_wiegh,
            "Sm_price"=> $sm_price,
            "Sm_date"=> $sm_date
         
        );
        DB::table("salemilk")->where("Sm_id","=",$sm_id)->update($update_sm);
 
          
 
        
     }
     public static function Delete_sm($sm_id){

        DB::table("salemilk")
        ->where("Sm_id","=",$sm_id)
        ->delete();



    }

              
    public static function loadAllSaleMilk(){
        $AllSaleMilk=DB::table("salemilk")->orderBy("created_at","DESC")->get();

        return $AllSaleMilk; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

    }

   
}
