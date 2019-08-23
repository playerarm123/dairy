<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class Committee extends Model
{
    protected $table ='committee';
    public static function com_insert($com_id,$com_name,$com_address,$com_phone,$com_position,$com_gender,$com_user,$com_password){

$com=array(
    "com_id"=> $com_id,
    "com_name"=> $com_name,
    "com_address"=> $com_address,
    "com_phone"=> $com_phone,
    "com_position"=> $com_position,
    "com_gender"=> $com_gender,
    "com_user"=> $com_user,
    "com_password"=>$com_password

            );

            DB::table("committee")->insert($com );


    }
    
    public static function com_update($com_id,$com_name,$com_address,$com_phone,$com_position,$com_gender,$com_user,$com_password){
        $com_up=array(
            "com_id"=> $com_id,
            "com_name"=> $com_name,
            "com_address"=> $com_address,
            "com_phone"=> $com_phone,
            "com_position"=> $com_position,
            "com_gender"=> $com_gender,
            "com_user"=> $com_user,
            "com_password"=>$com_password
        
               
         
        );
         DB::table("committee")->where("com_id","=",$com_id)->update($com_up);
 
          
 
 
     }
     public static function Delete_com($com_id){

        DB::table("committee")
        ->where("com_id","=",$com_id)
        ->delete();



   }

   public static function loadAllCommittee(){
    $Allcommittee=DB::table("committee")->orderBy("created_at","DESC")->get();

    return $Allcommittee; //รีเทินข้อมูลสมาชิกทั้งหมดกลับ

   }

}
