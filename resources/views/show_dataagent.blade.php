@extends('menu')


@section('head')

@stop


@section('body')
        
<div class="center">
<h1 style="text-align:center">แสดงรายละเอียดข้อมูลบริษัทคู่ค้า</h1><br>
<div class="row">
    <div class="col-3 right" >ชื่อ</div>
    <div class="col-2">{{$agent[0]->pn_name}}</div>
    <div class="col-3 right" > ที่อยู่</div>
    <div class="col-2">{{$agent[0]->pn_address}}</div>
</div>
<div class="row">
        <div class="col-3 right" > เบอร์โทรศัพท์</div>
        <div class="col-2">{{$agent[0]->pn_phone}}</div>
    </div>
    <br>
    <div class="btncenter" style="width:100%" >
    <a href={{url('/dataagent')}} class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop
