@extends('menu')


@section('head')
<script>
    $(document).ready(function(){
        // เช็คข้อมูลก่อน บันทึก ###############################################################
        $('#form-submit').on('submit',function(e){
            e.preventDefault();
            var old_name = $('#old_name').val();
            var old_lastname = $('#old_lastname').val();
            if(old_name != $('#firstname').val() && old_lastname != $('#lastname').val()){
                $.ajax({
                    type : "POST",
                    url : "{{ url('checkuser') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        fname: $('#firstname').val(),
                        lname: $('#lastname').val(),
                        username: 'none'

                    },async:true,
                    success:function(data){
                        if(data['resultname'] == 0){
                            $('#form-submit').unbind('submit').submit();
                        }else{
                           swal("ชื่อและนามสกุลนี้มีในระบบแล้ว");
                        }
                    }
                });
            }else{
                $('#form-submit').unbind('submit').submit();
            }
        });
        // สิ้นสุดเช็คข้อมูล  ###############################################################
    });
</script>
@stop


@section('body')
<div class="center">
    <h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานผู้ใช้งาน</h1><br>
    <form action="{{ url('/updateuser') }}" method="POST"  id="form-submit">
        @csrf
        <input type = "hidden" name="Em_id" value="{{$user[0]->em_id}}">
        <input type="hidden" name="" id="old_name" value="{{ $user[0]->em_name }}">
        <input type="hidden" name="" id="old_lastname" value="{{ $user[0]->em_lastname }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        ชื่อ:
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="firstname" name="firstname" required value="{{$user[0]->em_name}}">
                    </div>
                    <div class="col-2 right">
                        นามสกุล:
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user[0]->em_lastname}}" required>
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
        <div class="btncenter"  >
            <button  type="submit" class="btn btn-success" >
                <span class="fa fa-save" >บันทึก</span>
            </button>
            <a href="{{url('dataem')}}"class="btn btn-danger " >
                <span class="fa fa-edit" >ย้อนกลับ</span>
            </a>
        </div>
    </form>
</div>
@stop


