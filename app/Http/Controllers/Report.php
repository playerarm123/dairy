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
        $eq_id=array("8","6");
        $eq_total=array(20,30);
        $eq_receive=array(10,20);


        equip::receive_drug($eq_id,$eq_receive,$eq_total);

    }

}


