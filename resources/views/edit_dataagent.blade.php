@extends('menu')


@section('head')

@stop


@section('body')
<div class="center">
<h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานบริษัทคู่ค้า</h1><br>


<form action="{{ url('/updateagent') }}" method="POST">
      @csrf
      <input type = "hidden" name="pn_id" value="{{$agent[0]->pn_id}}">

        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    ชื่อ:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="name" required value="{{$agent[0]->pn_name}}">
                </div>
                <div class="col-2 right">
                   ที่อยู่:
                </div>
                <div class="col-3">
                        <textarea class="form-control" name="address" required > {{$agent[0]->pn_address}}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    เบอร์โทร:
                </div>
                <div class="col-3">
                    <input type="tel" class="form-control" name="phone" required value="{{$agent[0]->pn_phone}}">
                </div>
            </div>
        </div>
    <div class="btncenter"  >
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

@stop
