<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Productsalesdetails extends Model
{
    protected $table = 'Productsalesdetails';
    public static function pro_sd_insert($Psd_price,$Sp_id,$Pro_id,$Psd_number, $Psd_pricetotal,$psd_cumulative)
    {
            $pro_sd=array(
                "Sp_id"=> $Sp_id,
                "Psd_price"=> $Psd_price,
                "Pro_id"=> $Pro_id,
                "Psd_number"=> $Psd_number,
                "Psd_pricetotal"=> $Psd_pricetotal,
                "Psd_cumulative"=> $psd_cumulative,

                           );



        DB::table("Productsalesdetails")->insert($pro_sd);
    }
}
