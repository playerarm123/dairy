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
                width: 90%;
                border: 3px solid #73AD21;
                padding: 10px;
            }
            .btncenter{
        width:10%;margin-left:45%;margin-right:45%;
    }

</style>
<div class="center">
<h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานสมาชิก</h1><br>


<form action="{{ url('/updatemem') }}" method="POST">
      @csrf
      <input type = "hidden" name="mb_id" value="{{$member[0]->mb_id}}">

        <div class="form-group">
            <div class="row">
                <div class="col-2">
                    ชื่อ:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="firstname" required value="{{$member[0]->mb_name}}">
                </div>
                <div class="col-2">
                    นามสกุล:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="lastname" value="{{$member[0]->mb_lastname}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2">
                    เพศ:
                </div>
                <div class="col-4">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                          <input  {{($member[0]->mb_gender == 'male')?'checked':''}} type="radio" class="form-check-input" name="gender" value="male" required>ชาย
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input {{($member[0]->mb_gender == 'female')?'checked':''}} type="radio" class="form-check-input" name="gender" value="female" required>หญิง
                        </label>
                    </div>

                </div>
                <div class="col-2">
                    อายุ:
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" name="old" value="{{$member[0]->mb_age}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2">
                        ที่อยู่:
                </div>
                <div class="col-4">
                        <textarea class="form-control" name="address" required > {{$member[0]->mb_address}}</textarea>
                </div>
                <div class="col-2">
                    เบอร์โทร:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="number"  value="{{$member[0]->mb_phone}}" required>
                </div>
            </div>
        </div>
    <div class="btncenter" style="width:100%" >
        <button  type="submit" class="btn btn-success" >
            <span class="fa fa-save" >บันทึก</span>
        </button>
        <a href='{{url("/datamem")}}'class="btn btn-danger " >
                <span class="fa fa-edit" >ย้อนกลับ</span>
        </a>
    </div>
</form>
<br><br>
<div class="panel-body">

</div>

@stop
