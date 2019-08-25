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
<h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานบริษัทคู่ค้า</h1><br>
<form action="{{url('/updateagent')}}" method="POST">
      @csrf
      <input type = "hidden" name="pn_id" value="{{$agent[0]->pn_id}}">

        <div class="form-group">
            <div class="row">
                <div class="col-2">
                    ชื่อ:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="name" required value="{{$agent[0]->pn_name}}">
                </div>
                <div class="col-2">
                    ที่อยู่:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="address" value="{{$agent[0]->pn_address}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2">
                        เบอร์โทรศัพท์:
                </div>
                <div class="col-4">
                        <input type="text" class="form-control" name="phone"  value="{{$agent[0]->pn_phone}}" required>
                    </div>

            </div>
        </div>

    <div class="btncenter" style="width:100%" >
        <button  type="submit" class="btn btn-success" >
            <span class="fa fa-save" >บันทึก</span>
        </button>
        <a href='{{url("/dataagent")}}'class="btn btn-danger " >
                <span class="fa fa-edit" >ย้อนกลับ</span>
        </a>
    </div>
</form>
<br><br>
<div class="panel-body">

</div>
</div>
@stop
