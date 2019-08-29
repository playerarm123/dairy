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

        Sale_milk::insert_sm("77","99","890","1977/12/12","80","123");

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
        $a = 10;
        $b = 20;
        $c = 0;
        $fomular = "บวก";
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


