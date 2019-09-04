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
                url: "{{ url('checkuser')}}",
                data: {
                            fname: $('#firstname').val(),
                            lname: $('#lastname').val(),
                            _token: "{{ csrf_token() }}"
                },asyn:true,
                success:function(data){
                    console.log(data);
                    if(data['resultname'] == 0 ) {
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
<div class="center">
    <h1 style="text-align:center"> แก้ไขข้อมูลพื้นฐานผู้ใช้งาน</h1><br>
    <form action="{{ url('/updateuser') }}" method="POST" id="form-submit">
        @csrf
        <input type = "hidden" name="Em_id" value="{{$user[0]->em_id}}">
        <input type = "hidden" name="oldname" id="oldname" value="{{$user[0]->em_name}}">
        <input type = "hidden" name="oldlastname" id="oldlastname" value="{{$user[0]->em_lastname}}">
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        ชื่อ:
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control"id="firstname" name="firstname" required value="{{$user[0]->em_name}}"  >
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


