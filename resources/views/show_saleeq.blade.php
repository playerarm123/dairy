@extends('menu')


@section('head')

@stop


@section('body')

<div class="center">
<h1 style="text-align:center">แสดงรายละเอียดข้อมูลขายอุปกรณ์</h1><br>
<div class="row">
    <div class="col-3 right" >รหัสการขายอุปกรณ์</div>
    <div class="col-2">{{$saleeq[0]->seq_id}}</div>
    <div class="col-3 right" >ชื่อพนักงาน</div>
    <div class="col-2">{{$saleeq[0]->em_id}}</div>
</div>

{{-- <div class="row">
        <div class="col-3 right" >ชื่อสมาชิก</div>
        <div class="col-2">{{$saleeq[0]->mb_id}} </div>
        <div class="col-3 right" >รหัสรายการขายอุปกรณ์</div>
        <div class="col-2">{{$list_sale_equip[0]->listsequ_id}}</div>
    </div>
    <div class="row">
            <div class="col-3 right" >รายการสินค้า</div>
            <div class="col-2">{{$list_sale_equip[0]->eq_name}} </div>
            <div class="col-3 right" >วันที่</div>
            <div class="col-2">{{$list_sale_equip[0]->seq_date}}</div>
        </div>
<div class="row">
        <div class="col-3 right" > จำนวน</div>
        <div class="col-2">{{$list_sale_equip[0]->seq_amount}}</div>
        <div class="col-3 right" > ยอดขายสุทธิ</div>
        <div class="col-2">{{number_format($list_sale_equip[0]->seq_pricetotal,2)}}&ensp;บาท</div>
    </div> --}}
    <br>
    <div class="btncenter"  >
    <a href={{url('/saleeq')}} class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop
