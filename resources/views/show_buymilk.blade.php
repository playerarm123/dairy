@extends('menu')


@section('head')

@stop


@section('body')

<div class="center">
<h2 style="text-align:center">แสดงรายละเอียดรับซื้อน้ำนมดิบ</h2>
    <div class="row">
        <div class="col-3 right" > รหัสรับซื้อน้ำนมดิบ</div>
        <div class="col-2">{{$buymilk[0]->bm_id}}</div>
        <div class="col-3 right" > ชื่อพนักงาน</div>
        <div class="col-2">{{$buymilk[0]->em_name}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" >ชื่อสมาชิก</div>
        <div class="col-2">{{$buymilk[0]->mb_name}}</div>
        <div class="col-3 right" >วันที่รับซื้อ</div>
        <div class="col-2">{{$buymilk[0]->bm_date}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" > ช่วงเวลารับซื้อ</div>
        <div class="col-2">{{$buymilk[0]->bm_range}}</div>
        <div class="col-3 right" > เกรดน้ำนมดิบ</div>
        <div class="col-2">{{$buymilk[0]->milk_grade}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" > น้ำหนักรับซื้อ</div>
        <div class="col-2">{{$buymilk[0]->bm_weight/1000}}&ensp;กิโลกรัม</div>
        <div class="col-3 right" > ราคารับซื้อสุทธิ</div>
        <div class="col-2">{{number_format($buymilk[0]->bm_pricein,2)}}&ensp;บาท</div>
    </div>
    <br>
    <div class="btncenter"  >
    <a href='{{url('buymilk')}}' class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop


