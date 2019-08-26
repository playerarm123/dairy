<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class cooper extends Model
//complete
{
    protected $table ='coooper';
    public static function coop_insert($coop_name,$coop_address,$coop_phone,$coop_fax,$coop_email,$coop_website,$coop_logo){

        $coop=array(
            "coop_name"     => $coop_name,
            "coop_address"  => $coop_address,
            "coop_phone"    => $coop_phone,
            "coop_fax"      => $coop_fax,
            "coop_email"    => $coop_email,
            "coop_website"  => $coop_website,
            "coop_logo"     => $coop_logo,
            "coop_status"   => "พร้อมใช้งาน"
        );
        DB::table("cooper")->insert($coop );

    }
    public static function coop_update($coop_id,$coop_name,$coop_address,$coop_phone,$coop_fax,$coop_email,$coop_website,$coop_logo){
        $coop_up=array(
            "coop_name"     => $coop_name,
            "coop_address"  => $coop_address,
            "coop_phone"    => $coop_phone,
            "coop_fax"      => $coop_fax,
            "coop_email"    => $coop_email,
            "coop_website"  => $coop_website,
            "coop_logo"     => $coop_logo,
            "coop_status"   => "พร้อมใช้งาน"
        );
        DB::table("cooper")->where("coop_id","=",$coop_id)->update($coop_up);

    }
     public static function loadDatacoop($coop_id){ //โหลดข้อมูลสหกรณ์
        $data=DB::table("cooper")
       ->get();

        return $data; //ส่งข้อมูลสหกรณ์ให้คอนโทลเลอร์
       }






}
