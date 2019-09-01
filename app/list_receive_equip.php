<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class list_receive_equip extends Model
{
    protected $table ='list_receive_equip';
    public static function listeq_insert($eq_id,$seq_amount,$seq_pricetotal){
        foreach ($eq_id as $key => $item){
            $list=array(
                'eq_id'=>$item,
                'seq_amount'=>$seq_amount[$key],
                'seq_pricetotal'=>$seq_pricetotal[$key],
                'listequ_status'=>"พร้อมใช้งาน"
            );
            DB::table("list_receive_equip")->insert($list);
        }




    }

    public static function listreceive_update($listreq_id,$eq_id,$seq_id,$seq_amount,$seq_pricetotal){
        $listreceive_up=array(
            "listreceive"=>"$listreq_id",
            "eq_id"=>$eq_id,
            "seq_id"=>$seq_id,
            "seq_amont"=>$seq_amount,
            "seq_pricetotal"=>$seq_pricetotal,
            "seq_status"=> "พร้อมใช้งาน"



        );
         DB::table("list_receive_equip")->where("listreq_id","=",$listreq_id)->update($listreceive_up);

     }

     public static function Canclecp($coop_id){
        $cp_Cancel =array(
            "bm_status"=> "ยกเลิก"
        );
            DB::table('list_receive_equip')->where("coop_id","=",$coop_id)->update($cp_Cancel);





    }



}
