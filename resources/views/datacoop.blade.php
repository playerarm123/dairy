@extends('menu')


@section('head')
<?php
    $id = "";
    $name = "";
    $address = "";
    $phone ="";
    $fax = "";
    $logo = "notfound.jpg";
    $email = "";
    $website = "";
    if(count($coop)> 0){
        $id = $coop[0]->coop_id;
        $name = $coop[0]->coop_name;
        $address = $coop[0]->coop_address;
        $phone =$coop[0]->coop_phone;
        $fax = $coop[0]->coop_fax;
        $logo = $coop[0]->coop_logo;
        $email = $coop[0]->coop_email;
        $website = $coop[0]->coop_website;
    }
?>
@stop


@section('body')
         
    <script>
        function edit(){
            $('#name').removeAttr('readonly');
            $('#address').removeAttr('readonly');
            $('#phone').removeAttr('readonly');
            $('#fax').removeAttr('readonly');
            $('#email').removeAttr('readonly');
            $('#website').removeAttr('readonly');
            $('#logo').removeAttr('disabled');
            $('.btn-warning').hide();
            $('.btn-danger').show();
            $('.btn-warning').hide();
            $('.btn-success').show();
            $('#save_type').val('update');

        }
        function cancel_edit(){
            $('#name').attr('readonly','readonly');
            $('#address').attr('readonly','readonly');
            $('#phone').attr('readonly','readonly');
            $('#fax').attr('readonly','readonly');
            $('#email').attr('readonly','readonly');
            $('#website').attr('readonly','readonly');
            $('#logo').attr('disabled','disabled');

            $('.btn-warning').show();
            $('.btn-danger').hide();
            $('.btn-success').hide();
            $('#save_type').val('insert');
        }
        $(document).ready(function() {
            var coop = "{{ count($coop) }}";

        });
    </script>
<style>
   
</style>
<div class="center">
    <h1 style="text-align:center">จัดการข้อมูลพื้นฐานสหกรณ์</h1><br>
    <form action="{{ url('/savecooper') }}" method="POST" id='form-submit' enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $id }}">
        <input type="hidden" name="" id="old_name">
        <input type="hidden" name="" id="old_address">
        <input type="hidden" name="" id="old_phone">
        <input type="hidden" name="" id="old_fax">
        <input type="hidden" name="" id="old_website">
        <input type="hidden" name="old_logo" value="{{ $logo }}">
        <input type="hidden" name="save_type" id="save_type" value="insert">

        <div class="form-group " >
            <div class="row">
                <div class="col-2 right">
                    ชื่อสหกรณ์:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="name" value="{{ $name }}"   id="name" {{ (count($coop)==0)?'required':'readonly' }}>
                </div>
                <div class="col-2 right">
                    ที่อยู่:
                </div>
                <div class="col-3 ">
                    <input type="text" class="form-control" name="address" value="{{ $address }}" id="address" {{ (count($coop)==0)?'required':'readonly' }}>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">เบอร์โทร:</div>
                <div class="col-3">
                    <input type="text" class="form-control"id="phone" name="phone" value="{{ $phone }}" {{ (count($coop)==0)?'required':'readonly' }}>
                </div>
                <div class="col-2 right"> เบอร์แฟกซ์ :</div>
                <div class="col-3">
                    <input type="text" class="form-control"id="fax" name="fax" value="{{ $fax }}" {{ (count($coop)==0)?'required':'readonly' }}>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right"> เว็บไซต์:</div>
                <div class="col-3">
                    <input type="url" class="form-control" id="website" value="{{ $website }}" name="website" {{ (count($coop)==0)?'required':'readonly' }}>
                </div>
                <div class="col-2 right">อีเมล:</div>
                <div class="col-3">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $email }}" {{ (count($coop)==0)?'required':'readonly' }}>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right"> โลโก้:</div>
                <div class="col-3">
                    <img src="{{ asset('img/'.$logo.'') }}" style="height:70px;width:100px;border: 1px solid" alt="">
                    <input type="hidden" name="old_logo" value="{{ $logo }}" id="">
                    <input type="file" pattern="image" class="form-control" name="logo"id="logo" {{ (count($coop)==0)?'required':'disabled' }}>
                </div>

            </div>
        </div>


        <div class=" btncenter" >
            <button  type="submit" class="btn btn-success " style="display:{{ (count($coop)>0)?'none':'' }}" >
                <span class="fa fa-edit" >บันทึก</span>
            </button>
            <button  type="button" class="btn btn-warning " onclick="edit()" style="display:{{ (count($coop)==0)?'none':'' }}">
                <span class="fa fa-edit" >แก้ไข</span>
            </button>
            <button  type="button" class="btn btn-danger " onclick="cancel_edit()" style="display:none">
                <span class="fa fa-edit" >ยกเลิก</span>
            </button>
        </div>
    </form>
</div>

@stop


