@extends('menu')


@section('head')

@stop


@section('body')

<div class="center">
<h2 style="text-align:center">แสดงรายละเอียดข้อมูลผู้ใช้งาน</h2>
<div class="row">
    <div class="col-3 right" > ชื่อ</div>
    <div class="col-2">{{$user[0]->em_name}}</div>
    <div class="col-3 right" > นามสกุล</div>
    <div class="col-2">{{$user[0]->em_lastname}}</div>
</div>
<div class="row">
        <div class="col-3 right" > เพศ</div>
        <div class="col-2">{{$user[0]->em_gender}}</div>
        <div class="col-3 right" > อายุ</div>
        <div class="col-2">{{$user[0]->em_age}}&ensp;ปี</div>
    </div>
    <div class="row">
            <div class="col-3 right" > ที่อยู่</div>
            <div class="col-2">{{$user[0]->em_address}}</div>
            <div class="col-3 right" > เบอร์โทร</div>
            <div class="col-2">{{$user[0]->em_phone}}</div>
        </div>
    <div class="row">
                <div class="col-3 right" > ตำแหน่ง</div>
                <div class="col-2">{{$user[0]->em_position}}</div>
                <div class="col-3 right" > Username</div>
                <div class="col-2">{{$user[0]->em_username}}</div>
    </div>
    <br>
    <div class="btncenter"  >
    <a href='{{url('dataem')}}' class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop


