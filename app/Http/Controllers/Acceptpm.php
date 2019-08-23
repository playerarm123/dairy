<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Member;
class Acceptpm extends Controller
{
        public function Acceptpm(){
            $data['partners']=partners::searchpartners();
            return view('',$data);
        }
       
        // public function Savepayment(Request $req){ 
        //     $sm_id=$req->input('');
        //     $em_id=$req->input('');
        //     $pn_id=$req->input('');
        //     $sm_wiegh=$req->input('');
        //     $sm_price=$req->input('');
        //     $sm_date=$req->input('');
        //     Salemilk::sm_insert($sm_id,$em_id,$pn_id,$sm_wiegh,$sm_price,$sm_date);
        //     Session ::put('save','success');
        //     return redirect('sellmilk');
        // }
        
        // public function Detailpaymilk($id){ //แสดงรายละเอียดจ่ายเงินนมให้สมาชิก
        //     $data['']=Salemilk::($id);
        //    return view ('',$data);
        // }
       
      
    
        public function Testmild(){
        dd(Member::searchMem("5"));
        //sss
        }
}   

