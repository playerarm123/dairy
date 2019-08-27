@extends('menu')


@section('head')

@stop


@section('body')

<div class="center">
<h1 style="text-align:center">แสดงรายละเอียดข้อมูลน้ำนมดิบ</h1><br>
<div class="row">
    <div class="col-3 right" >เกรดน้ำนมดิบ</div>
    <div class="col-2">{{$milk[0]->milk_grade}}</div>
    <div class="col-3 right" > น้ำหนัก(กิโลกรัม)</div>
    <div class="col-2">{{$milk[0]->milk_weight}}</div>
</div>
<div class="row">
        <div class="col-3 right" > ราคารับซื้อ</div>
        <div class="col-2">{{$milk[0]->milk_pricein}}</div>
        <div class="col-3 right" > ราคาขาย</div>
        <div class="col-2">{{$milk[0]->milk_priceout}}</div>
    </div>
    <br>
    <div class="btncenter" style="width:100%" >
    <a href={{url('/datamilk')}} class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop
