@extends('menu')


@section('head')

@stop


@section('body')
<div class="center">
<h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานน้ำนมดิบ</h1><br>
<form action="{{url('/updatemilk')}}" method="POST">
      @csrf
      <input type = "hidden" name="Milk_id" value="{{$milk[0]->milk_id}}">

        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    เกรดน้ำนมดิบ:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="milk_grade" required value="{{$milk[0]->milk_grade}}">
                </div>
                <div class="col-2 right">
                    จำนวน(กิโลกรัม):
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="milk_weight" value="{{$milk[0]->milk_weight}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                        ราคารับซื้อ:
                </div>
                <div class="col-3">
                        <input type="text" class="form-control" name="milk_pricein"  value="{{$milk[0]->milk_pricein}}" required>
                    </div> 
                <div class="col-2 right">
                    ราคาขาย:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="milk_priceout"  value="{{$milk[0]->milk_priceout}}" required>
                </div>
            </div>
        </div>

    <div class="btncenter"  >
        <button  type="submit" class="btn btn-success" >
            <span class="fa fa-save" >บันทึก</span>
        </button>
        <a href='{{url("/datamilk")}}'class="btn btn-danger " >
                <span class="fa fa-edit" >ย้อนกลับ</span>
        </a>
    </div>
</form>
<br><br>
<div class="panel-body">

</div>
</div>
@stop
