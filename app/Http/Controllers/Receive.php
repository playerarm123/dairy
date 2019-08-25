<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\receive_equip;

class Receive extends Controller
{

    public function Receivedrug(){
        $data['receiveequip']=receive_equip::loadAllBuy_equip();
        return view('receivedrug',$data);
    }


    public function Receivefood(){
        $data['receiveequip']=receive_equip::loadAllBuy_equip();
        return view('receivefood',$data);
    }

    public function Receivetool(){
        $data['receiveequip']=receive_equip::loadAllBuy_equip();
        return view('receivetool',$data);
    }


    public function Saveequip(Request $req){
        $req_id=$req->input('req_id');
        $em_id=$req->input('em_id');
        $pn_id=$req->input('pn_id');
        receive_equip::insert_req($req_id,$em_id,$pn_id);
        Session::put('save','success');
        return redirect('receiveequip');
    }
    public function Detailequip($id){
        $data['receiveequip']=receive_equip::loadAllBuy_equip($id);
       return view ('show_receiveequip',$data);
    }

}
