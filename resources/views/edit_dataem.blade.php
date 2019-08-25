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
             .right {
                text-align: right
            }
            .center {
                margin: auto;
                width: 90%;
                border: 3px solid #73AD21;
                padding: 10px;
            }
            .btncenter{
        width:10%;margin-left:45%;margin-right:45%;
    }

</style>
<div class="center">
<h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานผู้ใช้งาน</h1><br>
<form action="{{ url('/updateuser') }}" method="POST">
      @csrf
      <input type = "hidden" name="Em_id" value="{{$user[0]->em_id}}">

        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    ชื่อ:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="firstname" required value="{{$user[0]->em_name}}">
                </div>
                <div class="col-2 right">
                    นามสกุล:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="lastname" value="{{$user[0]->em_lastname}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    อายุ:
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" name="old" value="{{$user[0]->em_age}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                        ที่อยู่:
                </div>
                <div class="col-4">
                        <textarea class="form-control" name="address" required > {{$user[0]->em_address}}</textarea>
                </div>
                <div class="col-2 right">
                    เบอร์โทร:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="number"  value="{{$user[0]->em_phone}}" required>
                </div>
            </div>
        </div>

    <div class="btncenter" style="width:100%" >
        <button  type="submit" class="btn btn-success" >
            <span class="fa fa-save" >บันทึก</span>
        </button>
        <a href="{{url('dataem')}}"class="btn btn-danger " >
                <span class="fa fa-edit" >ย้อนกลับ</span>
        </a>
    </div>
</form>
<br><br>
<div class="panel-body">

</div>

@stop


