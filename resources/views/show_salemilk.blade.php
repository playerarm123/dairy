@extends('menu')


@section('head')

@stop


@section('body')

<div class="center">
<h2 style="text-align:center">แสดงรายละเอียดขายน้ำนมดิบ</h2>
    <div class="row">
        <div class="col-3 right" > รหัสขายน้ำนมดิบ</div>
        <div class="col-2">{{$salemilk[0]->sm_id}}</div>
        <div class="col-3 right" > ชื่อพนักงาน</div>
        <div class="col-2">{{$salemilk[0]->em_name}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" >ชื่อบริษัท</div>
        <div class="col-2">{{$salemilk[0]->pn_name}}</div>
        <div class="col-3 right" >วันที่ขาย</div>
        <div class="col-2">{{$salemilk[0]->sm_date}}</div>
    </div>
    <div class="row">
        <div class="col-3 right" > เกรดน้ำนมดิบ</div>
        <div class="col-2">{{$salemilk[0]->milk_grade}}</div>
        <div class="col-3 right" >น้ำหนักขาย</div>
        <div class="col-2">{{number_format($salemilk[0]->sm_weight/1000,2)}}&ensp;กิโลกรัม</div>
    </div>
    <div class="row">
        <div class="col-3 right" > ราคาขายสุทธิ</div>
        <div class="col-2">{{number_format($salemilk[0]->sm_pricetotal,2)}}&ensp;บาท</div>
    </div>
    <br>
    <div class="btncenter"  >
    <a href='{{url('salemilk')}}' class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop


