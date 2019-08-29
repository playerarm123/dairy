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
    public static function testmind (){

        equip::loaddrug("ยา");

    }
    public function plus($v1,$v2){
        $result = $v1+$v2;
        return $result;
    }
    public function minus($v1,$v2){
        $result = $v1-$v2;
        return $result;
    }
    public function calculate(){
        $a = 30;
        $b = 20;
        $c = 0;
        $fomular = "คูณ";
        if($fomular == "บวก"){

            $c = $this->plus($a,$b);

        }else if($fomular == "ลบ"){
            $c = $this->minus($a,$b);
        }
        else{
            return view('test');
        }

        dd($c);
    }
}


