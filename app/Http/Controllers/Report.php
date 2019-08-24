<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Milk;

class Report extends Controller
{
    public static function testmind (){
        Milk::Update_milk("11","b","56","90","90");

    }
}


