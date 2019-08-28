@extends('menu')


@section('head')

@stop


@section('body')

<div class="center">
<h2 style="text-align:center">แสดงรายละเอียดรับซื้อน้ำนมดิบ</h2>
    <div class="row">
        <div class="col-3 right" > รหัสรับซื้อน้ำนมดิบ</div>
        <div class="col-2">{{$buymilk[0]->bm_id}}</div>
        <div class="col-3 right" > รหัสพนักงาน</div>
        <div class="col-2">{{$buymilk[0]->em_id}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" >รหัสสมาชิก</div>
        <div class="col-2">{{$buymilk[0]->mb_id}}</div>
        <div class="col-3 right" > รหัสน้ำนมดิบ</div>
        <div class="col-2">{{$buymilk[0]->milk_id}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" >วันที่รับซื้อ</div>
        <div class="col-2">{{$buymilk[0]->bm_date}}</div>
        <div class="col-3 right" >ช่วงเวลา</div>
        <div class="col-2">{{$buymilk[0]->bm_range}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" > น้ำหนักรับซื้อ</div>
        <div class="col-2">{{$buymilk[0]->bm_weight}}</div>
        <div class="col-3 right" > ราคารับซื้อสุทธิ</div>
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


