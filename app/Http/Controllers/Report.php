<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\partners;

class Report extends Controller
{
    public static function testmind (){
    partners::canclepn("2");

    }
}


