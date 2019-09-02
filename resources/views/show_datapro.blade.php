@extends('menu')


@section('head')

@stop


@section('body')
<div class="center">
<h1 style="text-align:center">แสดงรายละเอียดข้อมูลอุปกรณ์</h1><br>
<div class="row">
    <div class="col-3 right" >ชื่ออุปกรณ์</div>
    <div class="col-2">{{$equip[0]->eq_name}}</div>
    <div class="col-3 right" >ประเภท</div>
    <div class="col-2">{{$equip[0]->eq_cate}}</div>
</div>
<div class="row">
        <div class="col-3 right" >หน่วยนับ</div>
        <div class="col-2">{{$equip[0]->eq_unit}}</div>
        <div class="col-3 right" >ราคาขาย</div>
        <div class="col-2">{{number_format($equip[0]->eq_price,2)}}&ensp;บาท</div>
    </div>
    <div class="row">
        <div class="col-3 right" >จำนวน</div>
        <div class="col-2">{{$equip[0]->eq_amount}}&ensp;{{$equip[0]->eq_unit}}</div>

    </div>
    <br>
    <div class="btncenter" >
    <a href={{url('/datapro')}} class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop
