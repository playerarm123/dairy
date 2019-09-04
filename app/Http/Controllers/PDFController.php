<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Buymilk;
use App\Sale_milk;
class PDFController extends Controller
{
    public function pdf(){
      $Sy = Sale_milk::Search_day("","","","2019-09-04","2019-09-04");
      //$Sy = Buymilk::Search_day("","","","","","2019-08-26","2019-09-30");
      dd($Sy);
    }

}
