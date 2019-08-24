<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equip;

class Report extends Controller
{
    public static function testmind (){
        equip::Update_eq("22","mind","gh","ขวด","90");

    }
}


