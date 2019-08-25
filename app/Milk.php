<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Milk extends Model

//complete
{
            protected $table = 'milk';
            public static function milk_insert($milk_grade,$milk_weight,$milk_pricein,$milk_priceout)
            {

        $milk=array(
            "milk_grade"=> $milk_grade,
            "milk_weight"=> $milk_weight,
            "milk_pricein"=> $milk_pricein,
            "milk_priceout"=> $milk_priceout,
            "milk_status"=> "พร้อมใช้งาน"

                );
                DB::table("milk")->insert($milk);

            }
            public static function CalP_Price($milk_grade,$milk_weight){ //หน่วยต้องเป็นขีดเท่านั้น เป็นฟังชันที่เอาไว้หาราคาซื้อน้ำนม
                $data=DB::table("milk")
                ->where("Milk_grade","=",$milk_grade)
                ->get();
                if(count($data) == 1)  { //ดักข้อมูล
                    $price = $data[0]->Milk_in;
                    $total = $price*$milk_weight;
                    return $total;
                }
                else{
                    $msb = "ข้อมูลไม่ถูกต้อง";
                    return $msb;
                } // ถ้านับแถวได้1จะคำนวนน และส่งราคา ถ้าไม่ใช่1จะส่งข้อความส่งกลับ
            }
            public static function checkmilk_grade($milk_grade){
                $data=DB::table("milk")
                ->where("milk_grade","=",$milk_grade)
                ->get();
                $row=count($data);
            return $data;  //สร้างเพื่อเช็คข้อมูลว่าซ้ำในดาต้าเบสไหม ขั้นตอนการสมัคร

            }

                public static function Update_milk($milk_id,$milk_grade,$milk_weight,$milk_pricein,$milk_priceout){
                    $update_milk=array(
                    "milk_grade"=>   $milk_grade,
                    "milk_weight"=>  $milk_weight,
                    "milk_pricein"=>   $milk_pricein,
                    "milk_priceout"=>   $milk_priceout,
                    "milk_status"=> "พร้อมใช้งาน"

                    );
                    DB::table("milk")->where("milk_id","=",$milk_id)->update($update_milk);




            }
            public static function Delete_milk($milk_id){

                DB::table("milk")
                ->where("milk_id","=",$milk_id)
                ->delete();
                }

                public static function loadAllMilk(){
                    $AllMilk=DB::table("milk")->orderBy("created_at","DESC")->get();

                    return $AllMilk; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

                }




            public static function loadDataMilk($milk_grade){ //โหลดข้อมูล
                $data=DB::table("milk")
            ->where("milk_grade","=",$milk_grade)
            ->get();

            return $data; //ส่งข้อมูลให้คอนโทลเลอร์
            }

            public static function Canclemilk($milk_id){
                $milk_Cancel =array(
                    "milk_status"=> "ยกเลิก"
                );
                    DB::table('cooper')->where("milk_id","=",$milk_id)->update($milk_Cancel);
            }
            public static function loadDataMilk($id){ //โหลดข้อมูล
                $data=DB::table("milk")
            ->where("milk_id","=",$id)
            ->get();

            return $data; //ส่งข้อมูลให้คอนโทลเลอร์
        }

}
