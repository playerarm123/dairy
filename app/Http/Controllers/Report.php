<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Employee;
use App\Member;
use App\Milk;
use App\equip;
use App\Partners;
use App\payMilk;
use App\Buymilk as buymilks;
use App\Sale_milk;

class Report extends Controller
{
    public function Loadreportbuymilk(){
        $data['grade']=Milk::loadAllMilk();
        return view('report_buymilk',$data);
    }


    public function Searchbuymilk(Request $req){
        $mb_id=$req->input('mb_id');
        $milk_id=$req->input('grade');
        $bm_range=$req->input('rang');
        $name=$req->input('name');
        $lastname=$req->input('lastname');
        $start_date=$req->input('startdate');
        $end_date=$req->input('enddate');
        $month=$req->input('month');
        $year=$req->input('year');

        if($start_date!="" && $end_date!=""){
            $data=buymilks::Search_day($mb_id,$milk_id,$bm_range,$name,$lastname,$start_date,$end_date);

        }
        else{
            $data=buymilks::Search_year($mb_id,$milk_id,$bm_range,$name,$lastname,$month,$year);
        }

        Session::put('buymilk',$data);
        return redirect('loadreportbuymilk');
    }




    public function Resetbuymilk(){
        Session::forget('buymilk');
        return redirect('loadreportbuymilk');
    }

    public function Exportbuymilk(){
        $data['buymilk'] = array(
            "name"=> "arm",
            "lastname"=>"anuwat"
        );
        $pdf = PDF::loadView('test',$data);
        return @$pdf->stream();
    }



    public static function testmind (){
        $eq_id=array("8","6");
        $eq_total=array(20,30);
        $eq_receive=array(10,20);


        equip::receive_drug($eq_id,$eq_receive,$eq_total);

    }

}


