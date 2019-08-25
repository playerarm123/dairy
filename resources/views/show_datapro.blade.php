@extends('menu')


@section('head')

@stop


@section('body')<BR><BR><BR>
         <!-- script  plug in dataTable  -->
  <script src="{{ asset('/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('/datatables/dataTables.buttons.min.js') }}"></script>
  <link href="{{ asset('/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/datatables/buttons.dataTables.min.css') }}" rel="stylesheet"> 
  <style> 
        .center {
            margin: auto;
            width: 70%;
            border: 3px solid #73AD21;
            padding: 10px;
        }
        .btncenter{
    width:10%;margin-left:45%;margin-right:45%;
}
        .right {
            text-align: right
        }
        .left{
            text-align: left
        }
        
</style>

<div class="center">
<h1 style="text-align:center">แสดงรายละเอียดข้อมูลอุปกรณ์</h1><br>
<div class="row">
    <div class="col-3 right" >ชื่ออุปกรณ์</div>
    <div class="col-2">{{$pro[0]->Equ_name}}</div>
    <div class="col-3 right" >จำนวน</div>
    <div class="col-2">{{$pro[0]->Equ_number}}</div>
</div>
<div class="row">
        <div class="col-3 right" > ราคา</div>
        <div class="col-2">{{$pro[0]->Equ_price}}</div>
    </div>
    <br>
    <div class="btncenter" style="width:100%" >
    <a href={{url('/datapro')}} class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop