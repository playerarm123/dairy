<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\partners;

class Report extends Controller
{
    public static function testmind (){
        partners::insert_pn("mind","123/12","8769000");

    }
}


