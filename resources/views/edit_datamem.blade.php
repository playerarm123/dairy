@extends('menu')


@section('head')
<script>
        $(document).ready(function() {
           //ใข้เช็คข้อมมูลก่อนกดปุ่ม บันทึก
           $('#form-submit').on('submit',function (e) {
               // หยุดการทำงานชั่วคราว
               e.preventDefault();
               var oldname= $("#oldname").val();
               var oldlastname=$("#oldlastname").val();
               var newname=$("#firstname").val();
               var newlastname=$("#lastname").val();

               if(oldname != newname && oldlastname != newlastname){
                   //ใช้ในการส่งข้อมูลไปตรวจสอบที่ controller
                   $.ajax({
                       type: "POST",
                       url: "{{ url('checkmember')}}",
                       data: {
                                   fname: $('#firstname').val(),
                                   lname: $('#lastname').val(),
                                   username: $('#username').val(),
                                   _token: "{{ csrf_token() }}"
                       },asyn:true,
                       success:function(data){
                           if(data== 0 ) {
                               //สั่งให้ทำการบันทึกข้อมูลต่อไป
                               $('#form-submit').unbind('submit').submit();
                           }
                       // ถ้า ชื่อ หรือ username ซ้ำกัน ให้ทำงานใน else
                           else{
                                swal("ชื่อและนามสกุลซ้ำกัน") ;
                           }
                       }
                   });
               }else{
                   $('#form-submit').unbind('submit').submit();
               }
           });
       });
       </script>
@stop


@section('body')

    <style>

</style>
<div class="center">
<h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานสมาชิก</h1><br>
<form action="{{ url('/updatemem') }}" method="POST" id="form-submit">
      @csrf
      <input type = "hidden" name="Mb_id" value="{{$member[0]->mb_id}}">
      <input type = "hidden" name="oldname" id="oldname" value="{{$member[0]->mb_name}}">
      <input type = "hidden" name="oldlastname" id="oldlastname" value="{{$member[0]->mb_lastname}}">

        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    ชื่อ:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" id="firstname" name="firstname" required value="{{$member[0]->mb_name}}">
                </div>
                <div class="col-2 right">
                    นามสกุล:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{$member[0]->mb_lastname}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    เพศ:
                </div>
                <div class="col-3">
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
                <div class="col-2 right">
                    อายุ:
                </div>
                <div class="col-3">
                    <input type="number" class="form-control" name="old" value="{{$member[0]->mb_age}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                        ที่อยู่:
                </div>
                <div class="col-3">
                        <textarea class="form-control" name="address" required > {{$member[0]->mb_address}}</textarea>
                </div>
                <div class="col-2 right">
                    เบอร์โทร:
                </div>
                <div class="col-3">

                    <input type="text" class="form-control" name="number"  value="{{$member[0]->mb_phone}}" required>
                </div>
            </div>
        </div>
    <div class="btncenter"  >
        <button  type="submit" class="btn btn-success">
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
