<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\equip;

class Receive extends Controller
{

    public function Drug(){
        $data['receivedrug']=equip::loaddatadrug();
        return view('receivedrug',$data);
    }
    public function Food(){
        $data['receivefood']=equip::loaddatafood();
        return view('receivefood',$data);
    }
    public function Tool(){
        $data['receivetool']=equip::loaddatatool();
        return view('receivetool',$data);
    }

    // public function Savedrug(Request $req){ //บันทึกข้อมูลยา
    //     $dr_buyid=$req->input('');
    //     $dr_id=$req->input('');
    //     $dr_price=$req->input('');
    //     $dr_amout=$req->input('');
    //     Drug::dr_insert($dr_buyid, $dr_id, $dr_price, $dr_amout);
    //     Session::put('save','success');
    //     return redirect('receivedrug');
    // }
    // public function Detaildrug($id){ //แสดงรายละเอียดยา
    //     $data['drug']=Drug::loaddatadrug($id);
    //    return view ('show_drug',$data);
    // }






    // public function Savefood(Request $req){ //บันทึกข้อมูลอาหารสัตว์
    //     $f_buyid=$req->input('');
    //     $f_id=$req->input('');
    //     $f_price=$req->input('');
    //     $f_amout=$req->input('');
    //     Food::food_insert($f_buyid, $f_id,$f_price,$f_amout);
    //     Session::put('save','success');
    //     return redirect('receivedrug');
    // }
    // public function Detailfood($id){ //แสดงรายละเอียดยา
    //     $data['food']=Food::loaddatafood($id);
    //    return view ('show_food',$data);
    // }

    // public function Savetool(Request $req){ //บันทึกข้อมูลอุปกรณ์
    //     $t_buyid=$req->input('');
    //     $t_id=$req->input('');
    //     $t_price=$req->input('');
    //     $t_amout=$req->input('');
    //     Tool::tool_insert($t_buyid, $t_id,$t_price,$t_amout);
    //     Session::put('save','success');
    //     return redirect('receivedrug');
    // }
    // public function Detailtool($id){ //แสดงรายละเอียดอุปกรณ์
    //     $data['tool']=Tool::loaddatatool($id);
    //    return view ('show_tool',$data);
    // }
}
