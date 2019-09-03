<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Member;
use App\Milk;
use App\equip;
use App\Partners;
use App\payMilk;
use App\Buymilk;
use App\Sale_milk;

class Report extends Controller
{
    public function Loadreportbuymilk(){
        return view('reportbuymilk');
    }


    public function Searchbuymilk(Request $req){
        $year=$req->input('year');
        $mount=$req->input('mount');
        $startdate=$req->input('startdate');
        $enddate=$req->input('enddate');
        $mb_id=$req->input('mb_id');
        $name=$req->input('name');
        $lastname=$req->input('lastname');
        $grade=$req->input('grade');
        $rang=$req->input('rang');
        $data['buymilk']=Buymilk::Search($year,$mount,$startdate,$enddate,$mb_id,$name, $lastname,$grade,$rang);
        return view('Reportbuymilk',$data);
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


