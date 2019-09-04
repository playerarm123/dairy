<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class list_sale_equip extends Model
{
    protected $table='list_sale_equip';
    public static function listeq_insert($seq_id,$eq_id,$seq_amount,$seq_pricetotal){

        foreach ($eq_id as $key => $item){
            $list=array(
                'eq_id'=>$item,
                'seq_amount'=>$seq_amount[$key],
                'seq_pricetotal'=>$seq_pricetotal[$key],
                'seq_id'=>$seq_id,
                'listsequ_status'=>"พร้อมใช้งาน"
            );

            $eq=DB::table('equip')->where("eq_id","=",$item)->select('eq_amount')->get();
            $total= ($eq[0]->eq_amount) - $seq_amount[$key];
            DB::table("list_sale_equip")->insert($list);
            DB::table('equip')->where ("eq_id","=",$item)->update(["eq_amount" => $total]);
        }
    }
    public static function load_lse($seq_id){    //โหลดข้อมูลรายการขายอุปกรณ์จาก ตารางวขายอุปกรณ์
        $data=DB::table('list_sale_equiq')
        ->where("seq_id","=",$seq_id)
        ->get();
     return $data;
    }


}
