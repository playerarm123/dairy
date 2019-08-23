<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class cooper extends Model
{
    protected $table ='coooper';
    public static function coop_insert($coop_name,$coop_address,$coop_phone,$coop_fax,$coop_email,$coop_website,$copp_logo,$coop_status){

        $coop=array(
            "coop_name"=> $coop_name,
            "coop_address"=> $coop_address,
            "coop_phone"=> $coop_phone,
            "coop_fax"=> $coop_fax,
            "coop_email" => $coop_email,
            "coop_website"=> $coop_website,
            "coop_logo"=> $coop_logo,
            "coop_status"=> $coop_status
            

                    );

                    DB::table("cooper")->insert($coop );


    }
    
    public static function coop_update($coop_id,$coop_name,$coop_address,$coop_phone,$coop_fax,$coop_email,$coop_website,$copp_logo,$coop_status){
        $coop_up=array(
            "coop_name"=> $coop_name,
            "coop_address"=> $coop_address,
            "coop_phone"=> $coop_phone,
            "coop_fax"=> $coop_fax,
            "coop_email" => $coop_email,
            "coop_website"=> $coop_website,
            "coop_logo"=> $coop_logo,
            "coop_status"=> $coop_status
            

         
        );
         DB::table("cooper")->where("coop_id","=",$coop_id)->update($coop_up);
 
     }
    
     public static function coop_Delete($coop_id){

        DB::table("cooper")
        ->where("coop_id","=",$coop_id)
        ->delete();



     }
     
}
