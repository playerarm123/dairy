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
<h2 style="text-align:center">แสดงรายละเอียดข้อมูลอุปกรณ์</h2><br>
<div class="row">
<<<<<<< HEAD
    <div class="col-3 right" >ชื่ออุปกรณ์</div>
    <div class="col-2">{{$equip[0]->eq_name}}</div>
    <div class="col-3 right" >จำนวน</div>
=======
    <div class="col-3 right" > ชื่อ</div>
    <div class="col-2">{{$equip[0]->eq_name}}</div>
    <div class="col-3 right" > ประเภท</div>
>>>>>>> d81889f7aefc0434cc3c5518d14f03bee542a2af
    <div class="col-2">{{$equip[0]->eq_cate}}</div>
</div>
<div class="row">
        <div class="col-3 right" > หน่วยนับ</div>
        <div class="col-2">{{$equip[0]->eq_unit}}</div>
        <div class="col-3 right" > ราคา</div>
<<<<<<< HEAD
        <div class="col-2">{{$equip[0]->eq_unit}}</div>
        <div class="col-3 right" > ราคา</div>
=======
>>>>>>> d81889f7aefc0434cc3c5518d14f03bee542a2af
        <div class="col-2">{{$equip[0]->eq_price}}</div>
    </div>

    <br>
    <div class="btncenter" style="width:100%" >
    <a href={{url('/datapro')}} class="btn btn-danger " >
        <span class="fa fa-edit" >ย้อนกลับ</span>
</a>
</div>
</div>
@stop
