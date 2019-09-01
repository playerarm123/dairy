<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
class list_receive_equip extends Model
{
    protected $table ='list_receive_equip';
<<<<<<< HEAD
=======

>>>>>>> 49f5591c3dd8d3219e38b45ff97e7f3dcd7f937f
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
