<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class listReceiveEquip extends Model
{
    protected $table ='listreceiveequip';
    public static function listeq_insert($eq_id,$seq_id,$seq_amount,$seq_pricetotal){

        $listeq=array(
          "eq_id"=>$eq_id,
          "seq_id"=>$seq_id,
          "seq_amont"=>$seq_amount,
          "seq_pricetotal"=>$seq_pricetotal,
          "coop_status"=> "พร้อมใช้งาน"


        );

        DB::table("listreceiveequip")->insert($listeq );


    }

    public static function coop_update($coop_id,$coop_name,$coop_address,$coop_phone,$coop_fax,$coop_email,$coop_website,$coop_logo){
        $coop_up=array(
            "coop_name"=> $coop_name,
            "coop_address"=> $coop_address,
            "coop_phone"=> $coop_phone,
            "coop_fax"=> $coop_fax,
            "coop_email" => $coop_email,
            "coop_website"=> $coop_website,
            "coop_logo"=> $coop_logo,
            "coop_status"=> "พร้อมใช้งาน"



        );
         DB::table("cooper")->where("coop_id","=",$coop_id)->update($coop_up);

    }

    public static function Canclecp($coop_id){
        $cp_Cancel =array(
            "bm_status"=> "ยกเลิก"
         );
        DB::table('cooper')->where("coop_id","=",$coop_id)->update($cp_Cancel);





    }



}
