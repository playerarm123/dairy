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
}


