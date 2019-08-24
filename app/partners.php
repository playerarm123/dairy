<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class partners extends Model
{
                protected $table='partners';
                public static function insert_pn($pn_name,$pn_address,$pn_phone) {

            $pn=array(

                "pn_name"=> $pn_name,
                "pn_address"=> $pn_address,
                "pn_phone"=> $pn_phone
                        );
                DB::table("partners")->insert($pn);


                }
                public static function checkPn_name($pn_name){
                    $data=DB::table("partners")
                    ->where("pn_name","=",$pn_name)
                    ->get();
                    $row=count($data);

                return $data;  //สร้างเพื่อเช็คข้อมูลว่าซ้ำในดาต้าเบสไหม ขั้นตอนการสมัคร

                }


            public static function Update_Pn($pn_id,$pn_name,$pn_address,$pn_phone){


                $update_pn=array(
                    "pn_id"=>$pn_id,
                    "pn_name"=> $pn_name,
                    "pn_address"=> $pn_address,
                    "pn_phone"=> $pn_phone
                            );


                DB::table("Partners")->where("Pn_id","=",$pn_id)->update($update_pn);


            }

            public static function Delete_pn($pn_id){

                DB::table("Partners")
                ->where("pn_id","=",$pn_id)
                ->delete();



           }
            public static function loadAllPartners(){
                $AllPartners=DB::table("Partners")->orderBy("created_at","DESC")->get();

                return $AllPartners; //รีเทินข้อมูลสมาชิกทั้งหมดกลับ

               }

}
