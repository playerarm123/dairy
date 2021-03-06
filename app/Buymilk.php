<?php

namespace App;
// เสร็จแล้ว
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Session;
class Buymilk extends Model
{
    public static function bm_insert($mb_id,$milk_id,$bm_weight,$bm_pricein,$bm_range){
        $Bm=array(
            "em_id"=> Session::get("em_id"),
            "mb_id"=> $mb_id,
            "milk_id"=> $milk_id,
            "bm_weight"=> $bm_weight,
            "bm_pricein"=> $bm_pricein,
            "bm_date"=> date("Y-m-d"),
            "bm_range"=>$bm_range,
            "bm_status"=> "พร้อมใช้งาน"
        );
        DB::table("buy_milk")->insert($Bm);

    }


    public static function loadAllBuymilk(){
        $AllBuymilk=DB::table("buy_milk")
        ->join('member','member.mb_id','=','buy_milk.mb_id')
        ->join('milk','milk.milk_id','=','buy_milk.milk_id')
        ->join('employee','employee.em_id','=','buy_milk.em_id')

        ->orderBy("buy_milk.created_at","DESC")->select('member.*','buy_milk.*','milk.*','employee.*')->get();


        return $AllBuymilk; //รีเทินข้อมูลสมาชิกทั้งหมดกลับ
    }

    public static function loadDataBuymilk($bm_id){ //โหลดข้อมูล
        $data=DB::table("buy_milk as bm")
        ->join('member','member.mb_id','=','bm.mb_id')
        ->join('milk','milk.milk_id','=','bm.milk_id')
        ->join('employee','employee.em_id','=','bm.em_id')
        ->where("bm.bm_id","=",$bm_id)
        ->select('member.*','bm.*','milk.*','employee.*')
        ->get();
        return $data; //ส่งข้อมูลให้คอนโทลเลอร์
    }


    public static function Canclebm($bm_id){
        $bm_Cancel =array(
            "bm_status"=> "ยกเลิก"
        );
            DB::table('buy_milk')->where("bm_id","=",$bm_id)->update($bm_Cancel);
    }


    public static function checkDelete($bm_id){
        $pay_milk= DB::table("pay_milk")    ->where("bm_id","=",$bm_id) ->count();

           if($pay_milk != 0 ){
               $checkDelete = "no";



           }
           else{
               $checkDelete = "yes";

           }
           return $checkDelete; //ถ้าค่า=no ลบไม่ได้  =yes ลบได้
    }
//ส่วนรายงาน---------------------------------------------------------------------------------------------

    public static function Search_year($mb_id,$milk_id,$bm_range,$name,$lastname,$month,$year){

        if ($month!=""){
            $where="YEAR(bm.created_at) = $year AND MONTH(bm.created_at)=$month";
        }
        else {
            $where="YEAR(bm.created_at) = $year";
        }

        //เช็ครหัสสมาชิก
        if ($mb_id!=""){
            $where .= " AND bm.mb_id = $mb_id";
        }

        else {
            if($name!="" && $lastname!=""){
                $where .= " AND member.mb_name ='$name' AND member.mb_lastname='$lastname'";
            }

        }

        //เช็คเกรกน้ำนม
        if($milk_id!=""){
            $where .= " AND member.milk_id = $milk_id";
        }

        //ช่วงเวลา
        if($bm_range!=""){
            $where .= " AND bm.bm_range = '$bm_range'";
        }
        $data=DB::table('Buy_milk as bm')
        ->join('member','member.mb_id','=','bm.mb_id')
        ->join('milk','milk.milk_id','=','bm.milk_id')
        ->join('employee','employee.em_id','=','bm.em_id')
        ->whereRaw($where)
        ->select('member.*','bm.*','milk.*','employee.*')
        ->get();

        return $data;
    }

    public static function Search_day($mb_id,$milk_id,$bm_range,$name,$lastname,$start_date,$end_date){
        if($start_date == $end_date){
            $where ="DATE(bm.created_at) = '$start_date'";
        }
        else{
            $where="DATE(bm.created_at) >= '$start_date' AND DATE(bm.created_at) <= '$end_date'";
        }

          //เช็ครหัสสมาชิก
          if ($mb_id!=""){
            $where .= " AND bm.mb_id=$mb_id";
        }

        else {
            if($name!="" && $lastname!=""){
                $where .= " AND member.mb_name = '$name' AND member.mb_lastname='$lastname'";
            }

        }

        //เช็คเกรกน้ำนม
        if($milk_id!=""){
            $where .= " AND member.milk_id = $milk_id";
        }

        //ช่วงเวลา
        if($bm_range!=""){
            $where .= " AND bm.bm_range = '$bm_range'";
        }
        $data=DB::table('Buy_milk as bm')
        ->join('member','member.mb_id','=','bm.mb_id')
        ->join('milk','milk.milk_id','=','bm.milk_id')
        ->join('employee','employee.em_id','=','bm.em_id')
        ->whereRaw($where)
        ->select('member.mb_name','member.mb_lastname','bm.*','employee.em_id')
        ->get();

        return $data;
    }



}


