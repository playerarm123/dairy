<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
use App\sale_equip;
use App\equip;
use App\list_sale_equip;
class Selleqm extends Controller
{

    public function __construct()
    {
        $this->middleware('checklogin');
    }

    public function Saleeq(){ //หน้าขายอุปกรณ์
        $data['saleeq']=sale_equip::loadAllSale_equip();
        return view('saleeq',$data);
    }
    public function Savesaleeq(Request $req){ //บันทึกข้อการขาย
        $mb_id=$req->input('mb_id');
        $price_total=$req->input('price_total');
        $eq_id=$req->input('eq_id');
        $seq_amount=$req->input('seq_amount');
        $seq_pricetotal=$req->input('seq_pricetotal');
        Sale_equip::insert_se($mb_id,$price_total);
        list_sale_equip::listeq_insert($eq_id,$seq_amount,$seq_pricetotal);
        Session ::put('save','success');
        return redirect('saleeq');
    }
    public function Detailsaleeq($id){ //แสดงรายละเอียดข้อมูลการขายอุปกรณ์
        $data['saleeq']=sale_equip::loadDataSale_equip($id);
        // $data['listsaleeq']=list_sale_equip::
       return view ('show_saleeq',$data);
    }

    public function Canceleq($id){
        sale_equip::Canceleq($id);
        Session::put('cancel','success');
    }
    public function Uplist(){
        $data['equip']=equip::loadAllEquip();
        return view ('list_saleeq',$data);

    }
}
