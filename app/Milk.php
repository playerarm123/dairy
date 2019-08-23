<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Milk extends Model
{
            protected $table = 'milk';
            public static function milk_insert($milk_grede,$milk_weight,$milk_in,$milk_out)
            {

        $milk=array(
            "Milk_grede"=> $milk_grede,
            "Milk_weight"=> $milk_weight,
            "Milk_in"=> $milk_in,
            "Milk_out"=> $milk_out
                );
                DB::table("milk")->insert($milk);

            }
            public static function CalP_Price($milk_grede,$milk_weight){ //หน่วยต้องเป็นขีดเท่านั้น เป็นฟังชันที่เอาไว้หาราคาซื้อน้ำนม
                $data=DB::table("milk")
                ->where("Milk_grede","=",$milk_grede)
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
            public static function checkmilk_grede($milk_grede){
                $data=DB::table("milk")
                ->where("milk_grede","=",$milk_grede)
                ->get();
                $row=count($data);
                dd($data);
            return $data;  //สร้างเพื่อเช็คข้อมูลว่าซ้ำในดาต้าเบสไหม ขั้นตอนการสมัคร
            
            }

                public static function Update_milk($milk_id,$milk_grede,$milk_weight,$milk_in,$milk_out){
                    $update_milk=array(
                    "Milk_grede"=>   $milk_grede,
                    "Milk_weight"=>  $milk_weight,
                    "Milk_in"=>   $milk_in,
                    "Milk_out"=>   $milk_out,
                    
                    );
                    DB::table("milk")->where("Milk_id","=",$milk_id)->update($update_milk);
            
                    
            
                        
            }
            public static function Delete_milk($milk_id){

                DB::table("milk")
                ->where("Milk_id","=",$milk_id)
                ->delete();
                }

                
            public static function loadAllMilk(){
                $AllMilk=DB::table("milk")->orderBy("created_at","DESC")->get();
        
                return $AllMilk; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ
        
            }


}
