<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\equip;

class Receive extends Controller
{

    public function __construct()
    {
        $this->middleware('checklogin');
    }

    public function Drug(){ //หน้ายา
        $data['drug']=equip::loaddrug();
        return view('receivedrug',$data);
    }
    public function Food(){ //หน้าอาหารสัตว์
        $data['food']=equip::loadfood();
        return view('receivefood',$data);
    }
    public function Tool(){ //หน้าอุปกรณ์
        $data['tool']=equip::loadtool();
        return view('receivetool',$data);
    }

    public function Savedrug(Request $req){ //บันทึกข้อมูลยา
        $eq_id=$req->input('eq_id');
        $eq_amount=$req->input('eq_amount');
        $eq_total=$req->input('eq_total');
        equip::receive_eq($eq_id,$eq_amount,$eq_total);
        Session::put('save','success');
        return redirect('receivedrug');
    }
    // public function Detaildrug($id){ //แสดงรายละเอียดยา
    //     $data['drug']=Drug::loaddatadrug($id);
    //    return view ('show_drug',$data);
    // }


    public function Savefood(Request $req){ //บันทึกข้อมูลอาหารสัตว์
        $eq_id=$req->input('eq_id');
        $eq_amount=$req->input('eq_amount');
        $eq_total=$req->input('eq_total');
        equip::receive_food($eq_id,$eq_amount,$eq_total);
        Session::put('save','success');
        return redirect('receivefood');
    }

    // public function Detailfood($id){ //แสดงรายละเอียดอาหาร
    //     $data['food']=Food::loaddatafood($id);
    //    return view ('show_food',$data);
    // }

    public function Savetool(Request $req){ //บันทึกข้อมูลอุปกรณ์
        $eq_id=$req->input('eq_id');
        $eq_amount=$req->input('eq_amount');
        $eq_total=$req->input('eq_total');
        equip::receive_tool($eq_id,$eq_amount,$eq_total);
        Session::put('save','success');
        return redirect('receivetool');
    }
    // public function Detailtool($id){ //แสดงรายละเอียดอุปกรณ์
    //     $data['tool']=Tool::loaddatatool($id);
    //    return view ('show_tool',$data);
    // }
}
