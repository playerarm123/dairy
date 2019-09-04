<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class payMilk extends Model
{

    protected $table = 'pay_milk';
    public static function pay_milk($em_id,$mb_id,$bm_id,$pm_pricetotal)
    {

        $pm=array(

        "em_id"=> $em_id,
        "mb_id"=> $mb_id,
        "bm_id"=> $bm_id,
        "pm_pricetotal"=> $pm_pricetotal,
        "pm_status"=>'ชำระเงินแล้ว'

              );

        DB::table("pay_milk")->insert($pm);
        DB::table("buy_milk")->where("bm_id","=",$bm_id)->update(["bm_status"=>"ชำระเงินแล้ว"]);
    }


}
