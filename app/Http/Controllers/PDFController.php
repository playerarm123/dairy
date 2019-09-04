<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Buymilk;
class PDFController extends Controller
{
    public function pdf(){
      $Se = Buymilk::Search_day("","","","","","2019-08-26","2019-08-30");
      dd($Se);
    }

}
