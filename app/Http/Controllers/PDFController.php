<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function pdf(){
        $data['test'] = array(
            "name"=> "arm",
            "lastname"=>"anuwat"
        );
        $pdf = PDF::loadView('test',$data);
        return @$pdf->stream();
    }
}
