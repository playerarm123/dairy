@extends('menu')


@section('head')

@stop


@section('body')

<div class="center">
<h2 style="text-align:center">แสดงรายละเอียดรับซื้อน้ำนมดิบ</h2>
<div class="row">
    <div class="col-3 right" >ชื่อสมาชิก</div>
    <div class="col-2">{{$member[0]->em_id}}</div>
    <div class="col-3 right" > นามสกุล</div>
    <div class="col-2">{{$member[0]->milk_drade}}</div>
</div>
<div class="row">
        <div class="col-3 right" >ช่วงเวลา</div>
        <div class="col-2">{{$buymilk[0]-bm_range}}</div>
        <div class="col-3 right" > เกรดน้ำนมดิบ</div>
        <div class="col-2">{{$milk[0]->milk_drade}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" > น้ำหนักรับซื้อ</div>
        <div class="col-2">{{$buymilk[0]->bm_wiegh}}</div>
        <div class="col-3 right" > ราคารับซื้อ</div>
        <div class="col-2">{{$buymilk[0]->bm_pricein}}</div>
            
    </div>
    <br>
    <div class="btncenter"  >
    <a href='{{url('buymilk')}}' class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop


