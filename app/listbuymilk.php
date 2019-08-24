<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class productreceiptdetails extends Model
{
    
    protected $table = 'productreceiptdetails';
    public static function pro_rd_insert($Rp_id,$Pro_id,$Rp_cate,$Rp_price,$Rp_number,$Rp_total,$Rp_date)
    { 
            $pro_rd=array(
                "Rp_id"=> $Rp_id,
                "Pro_id"=> $Pro_id,
                "Rp_cate"=>$Rp_cate,
                "Rp_price"=> $Rp_price,
                "Rp_number"=> $Rp_number,
                "Rp_total"=> $Rp_total,
                "Rp_date"=> $Rp_date
                
                           );
   
   
   
        DB::table("productreceiptdetails")->insert($pro_rd);
    }
}

