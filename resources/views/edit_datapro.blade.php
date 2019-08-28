@extends('menu')


@section('head')

@stop


@section('body')
<div class="center">
<h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานอุปกรณ์</h1><br>
<form action="{{url('/updatepro')}}" method="POST">
      @csrf
      <input type = "hidden" name="eq_id" value="{{$equip[0]->eq_id}}">

        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    ชื่ออุปกรณ์:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="name" required value="{{$equip[0]->eq_name}}">
                </div>
                <div class="col-2 right">
                    ประเภท:
                </div>
                <div class="col-3">
                        <select name="cate" class="form-control" >
                                <option value="อาหารสัตว์">อาหารสัตว์</option>
                                <option value="ยารักษาโรค">ยารักษาโรค</option>
                                <option value="อุปกรณ์รีดนม">อุปกรณ์รีดนม</option>
                              </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                        หน่วยนับ:
                </div>
                <div class="col-3">
                        <input type="text" class="form-control" name="unit"  value="{{$equip[0]->eq_unit}}" required>
                    </div>
                <div class="col-2 right">
                    ราคาขาย:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="price"  value="{{$equip[0]->eq_price}}" required>
                </div>
            </div>
        </div>

    <div class="btncenter" >
        <button  type="submit" class="btn btn-success" >
            <span class="fa fa-save" >บันทึก</span>
        </button>
        <a href='{{url("/datapro")}}'class="btn btn-danger " >
                <span class="fa fa-edit" >ย้อนกลับ</span>
        </a>
    </div>
</form>
<br><br>
<div class="panel-body">

</div>
</div>
@stop
