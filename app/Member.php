<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Facades\DB;
class Member extends Model
{
    protected $table = 'member';
    public static function mb_insert($mb_name,$mb_lastname,$mb_address,$mb_phone,$mb_gender,$mb_age)
    {

        $mb=array(
        "mb_name"=> $mb_name,
        "mb_lastname"=> $mb_lastname,
        "mb_address"=> $mb_address,
        "mb_phone"=> $mb_phone,
        "mb_gender"=> $mb_gender,
        "mb_age"=> $mb_age,
        "mb_status"=>''

              );

        DB::table("member")->insert($mb);



    }
     public static function mb_Update($mb_id,$mb_name,$mb_lastname,$mb_address,$mb_phone,$mb_gender,$mb_age){
            $update=array(
                "mb_name"=> $mb_name,
                "mb_lastname"=> $mb_lastname,
                "mb_address"=> $mb_address,
                "mb_phone"=> $mb_phone,
                "mb_gender"=> $mb_gender,
                "mb_age"=> $mb_age,
                "mb_status"=> ''


            );
            DB::table("member")->where("mb_id","=",$mb_id)->update($update);

    }
    public static function mb_Delete($mb_id){ //สร้างเพื่อ ลบข้อมูลผู้ใช้

        DB::table("member")
        ->where("mb_id","=",$mb_id)
        ->delete();



    }

     public static function checkMb_name($mb_name){
            $data=DB::table("member")
            ->where("mb_name","=",$mb_name)
            ->get();
            $row=count($data);

        return $data;  //สร้างเพื่อเช็คข้อมูลว่าซ้ำในดาต้าเบสไหม ขั้นตอนการสมัคร

    }


     public static function loadDataMb($mb_name){ //โหลดข้อมูลงาน
            $data=DB::table("member")
        ->where("Mb_name","=",$mb_name)
        ->get();

        return $data; //ส่งข้อมูลพนักงานให้คอนโทลเลอร์
    }


    public static function loadAllmb(){
        $data=DB::table("member")
        ->get();
        return $data;


    }

}
