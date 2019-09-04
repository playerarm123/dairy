@extends('menu')


@section('head')

@stop


@section('body')

<div class="center">
<h2 style="text-align:center">แสดงรายละเอียดข้อมูลสมาชิก</h2><br>
<div class="row">
    <div class="col-3 right" > ชื่อ</div>
    <div class="col-2">{{$member[0]->mb_name}}</div>
    <div class="col-3 right" > นามสกุล</div>
    <div class="col-2">{{$member[0]->mb_lastname}}</div>
</div>
<div class="row">
        <div class="col-3 right" > เพศ</div>
        <div class="col-2">{{$member[0]->mb_gender}}</div>
        <div class="col-3 right" > อายุ</div>
        <div class="col-2">{{$member[0]->mb_age}}&ensp;ปี</div>
    </div>
    <div class="row">
            <div class="col-3 right" > ที่อยู่</div>
            <div class="col-2">{{$member[0]->mb_address}}</div>
            <div class="col-3 right" > เบอร์โทร</div>
            <div class="col-2">{{$member[0]->mb_phone}}</div>
        </div>

    <br>
    <div class="btncenter" >
    <a href={{url('/datamem')}} class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop
