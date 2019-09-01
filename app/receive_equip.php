<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class receive_equip extends Model
{
    protected $table = 'receive_equip';
    public static function insert_req($em_id,$pn_id)
    {
            $req_in=array(
                "em_id"=> $em_id,
                "pn_id"=> $pn_id
            );



        DB::table("receive_equip")->insert($req_in);
    }



    public static function Update_bq($req_id,$em_id,$pn_id){
        $req_up=array(
            "req_id"=> $req_id,
            "em_id"=> $em_id,
            "pn"=> $pn_id

        );
         DB::table("receive_equip")->where("req_id","=",$req_id)->update($req_up);


    }

    public static function Delete_req($req_id){

        DB::table("receive_equip")
        ->where("req_id","=",$req_id)
        ->delete();
    }

    public static function loadAllBuy_equip(){
        $AllBuy_equip=DB::table("receive_equip")->orderBy("created_at","DESC")->get();

        return $AllBuy_equip; //รีเทินข้อมูลซื้ออุปกรณ์ทั้งหมดกลับ

    }





}
