<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Session;
class Sale_milk extends Model
{
    protected $table='sale_milk';
    public static function insert_sm($pn_id,$milk_id,$sm_weight,$sm_pricetotal){
        $sm_insert=array (
        "em_id"=> Session::get('em_id'),
        "pn_id"=> $pn_id,
        "sm_pricetotal"=> $sm_pricetotal,
        "sm_date"=> date('Y-m-d'),
        "sm_weight"=> $sm_weight,
        "milk_id"=>$milk_id,
        "sm_status"=>"พร้อมใช้งาน"
        );



        DB::table("sale_milk")->insert($sm_insert );


    }

    public static function Delete_sm($sm_id){

        DB::table("sale_milk")
        ->where("sm_id","=",$sm_id)
        ->delete();



    }


    public static function loadAllSale_milk(){
        $AllSaleMilk=DB::table("sale_milk")
        ->join('partners','partners.pn_id','=','sale_milk.pn_id')
        ->join('milk','milk.milk_id','=','sale_milk.milk_id')

        ->orderBy("sale_milk.created_at","DESC")->select('partners.*','sale_milk.*','Milk.*')->get();

        return $AllSaleMilk; //รีเทินข้อมูลน้ำนมทั้งหมดกลับ

    }

    public static function loadDataSale_milk($sm_id){ //โหลดข้อมูล
        $data=DB::table("sale_milk")
        ->join('partners','partners.pn_id','=','sale_milk.pn_id')
        ->join('milk','milk.milk_id','=','sale_milk.milk_id')
        ->join('employee','employee.em_id','=','sale_milk.em_id')

        ->where("sale_milk.sm_id","=",$sm_id)
        ->select('partners.*','sale_milk.*','Milk.*','employee.*')
        ->get();

           return $data; //ส่งข้อมูลให้คอนโทลเลอร์
    }


    public static function checkDelete($sm_id){
        $receive_money= DB::table("receive_money")    ->where("sm_id","=",$sm_id) ->count();

           if($receive_money != 0 ){
               $checkDelete = "no";



           }
           else{
               $checkDelete = "yes";

           }
        dd($checkDelete);
           return $checkDelete; //ถ้าค่า=no ลบไม่ได้  =yes ลบได้
       }



    public static function Canclesm($sm_id){
        $sm_Cancel =array(
            "sm_status"=> "ยกเลิก"
        );
            DB::table('sale_milk')->where("sm_id","=",$sm_id)->update($sm_Cancel);
    }


    //ส่วนรายงาน---------------------------------------------------------------------------------------------

    public static function Search_year($pn_id,$milk_id,$name,$month,$year){

        if ($month!=""){
            $where="YEAR(sale_milk.created_at) = $year AND MONTH(sale_milk.created_at) = $month";
        }
        else {
            $where="YEAR(sale_milk.created_at) = $year";
        }

        //เช็ครหัสคู่ค้า
        if ($pn_id!=""){
            $where .= " AND sale_milk.pn_id = $pn_id";
        }

        else {
            if($name!=""){
                $where .= " AND sale_milk.pn_name = '$name'";
            }

        }

        //เช็คเกรกน้ำนม
        if($milk_id!=""){
            $where .= " AND sale_milk.milk_id = $milk_id";
        }


        $data=DB::table("sale_milk")
        ->join('partners','partners.pn_id','=','sale_milk.pn_id')
        ->join('milk','milk.milk_id','=','sale_milk.milk_id')
        ->join('employee','employee.em_id','=','sale_milk.em_id')
        ->whereRaw($where)
        ->select('partners.*','sale_milk.*','Milk.*','employee.*')
        ->get();

        return $data;
    }

    public static function Search_day($pn_id,$milk_id,$name,$start_date,$end_date){
        if($start_date == $end_date){
            $where ="DATE(sale_milk.created_at)='$start_date'";
        }
        else{
            $where="DATE(sale_milk.created_at) >= '$start_date' AND DATE(sale_milk.created_at) <= '$end_date'";
        }

          //เช็ครหัสคู่่ค้า
          if ($pn_id!=""){
            $where .= " AND sale_milk.pn_id = $pn_id";
        }

        else {
            if($name!=""){
                $where .= " AND sale_milk.mb_name = '$name'";
            }

        }

        //เช็คเกรกน้ำนม
        if($milk_id!=""){
            $where .= " AND sale_milk.milk_id = $milk_id";
        }

        $data=DB::table("sale_milk")
        ->join('partners','partners.pn_id','=','sale_milk.pn_id')
        ->join('milk','milk.milk_id','=','sale_milk.milk_id')
        ->join('employee','employee.em_id','=','sale_milk.em_id')
        ->whereRaw($where)
        ->select('partners.pn_name','sale_milk.*','Milk.milk_id','employee.em_id')
        ->get();

        dd($data);
        return $data;
    }



}

