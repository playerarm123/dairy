<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class payMilk extends Model
{

    protected $table = 'pay_milk';
    public static function pm_insert($pm_id,$em_id,$mb_id,$bm_id,$pm_date,$pm_pricetotal)
    {

        $pm=array(
        "pm_id"=> $pm_id,
        "em_id"=> $em_id,
        "mb_id"=> $mb_id,
        "bm_id"=> $bm_id,
        "pm_date"=> $pm_date,
        "pm_pricetotal"=> $pm_pricetotal,
        "pm_status"=>'พร้อมใช้งาน'

              );

        DB::table("pay_milk")->insert($pm);
    }


}
