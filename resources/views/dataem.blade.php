@extends('menu')


@section('head')

@stop


@section('body')
    <script>
        function confirm_delete(Em_id){
            swal({
                title: "ลบข้อมูล?",
                text: "คุณจะไม่สามารถเรียกใช้ข้อมูลได้อีก",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "ใช่, ลบข้อมูล",
                cancelButtonText: "ไม่, ยกเลิกการลบ",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm) {
                if (isConfirm) {
                    // ถ้ากด ใช่
                    $.ajax({
                        type:"GET",
                        url: " {{ url('checkdluser') }}/"+Em_id,
                        success:function(result){
                            if(result == "yes"){
                                $.ajax({
                                    type: "GET",
                                    url : "{{ url('deleteuser')}}/"+Em_id,
                                    success:function(data){
                                    }
                                });
                            }else{
                                swal('แจ้งเตือน','ไม่สามารถลบข้อมูลได้','warning');
                            }
                        }
                    });

                } else {
                    // ถ้ากด ไม่ใช่
                    swal("ยกเลิก", "ยกเลิกการลบข้อมูลเรียบร้อยแล้ว :)", "error");
                }
            });

        }
        $(document).ready(function() {
            //ใข้เช็คข้อมมูลก่อนกดปุ่ม บันทึก
            $('#form-submit').on('submit',function (e) {
                // หยุดการทำงานชั่วคราว
                e.preventDefault();

                //ใช้ในการส่งข้อมูลไปตรวจสอบที่ controller
                $.ajax({
                    type: "POST",
                    url: "{{ url('checkuser')}}",
                    data: {
                        fname: $('#firstname').val(),
                        lname: $('#lastname').val(),
                        username: $('#username').val(),
                        _token: "{{ csrf_token() }}"
                    },asyn:true,
                    success:function(data){
                        console.log(data);
                        if(data['resultname'] == 0 && data['resultusername'] == 0) {
                             //สั่งให้ทำการบันทึกข้อมูลต่อไป
                            $('#form-submit').unbind('submit').submit();
                         }
                         // ถ้า ชื่อ หรือ username ซ้ำกัน ให้ทำงานใน else
                         else{
                            // ถ้าชื่อ มากกว่า 0 ให้ทำงานใน if
                            if(data['resultname'] > 0){

                                // สั่งให้ข้อความแจ้งเตือนแสง
                                $('#alert_name').show();
                            }
                            // ถ้า ไม่มากกว่า 0 ให้ทำงานใน else
                            else{
                                // สั่งให้ซ่อนข้อความ
                                $('#alert_name').hide();
                            }
                            //username
                            if(data['resultusername']>0){
                                $('#alert_username').show();
                            }
                                else{
                                    $('#alert_username').hide();
                            }
                         }
                    }
                });
            });

            // ตารางข้อมูล
            var table =$('#dataem').DataTable({
                "paging": true,
                "autoWidth": false,
                "columns": [
                    { "width": "5%" },
                    null,
                    null,
                    {"width": "10%"},
                    {"width": "12%"},
                    {"width": "22%"}

                ],
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                    "sSearch": "ค้นหา :",
                    "sLoadingRecords": "Please wait - loading...",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sLast": "หน้าสุดท้าย",
                        "sPrevious": "ก่อน",
                        "sNext":"ถัดไป"
                    }
                },
                "pageLength": 10 ,
                searching:true,
            });
        });
        function check_password (){
            var password1 =$('#password').val();
            var confirm_password=$('#confirm_password').val();
            if (password1 !=confirm_password){
                alert("passwordไม่ตรงกัน");
                $('#save').show();
            } else {
                alert ("passwordถูกต้อง");
            }
        }
    </script>
    <div class="center">
        <h1 style="text-align:center">จัดการข้อมูลพื้นฐานผู้ใช้งาน</h1><br>
        <form action="{{ url('/savedataem') }}" method="POST" id='form-submit'>
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        ชื่อ:
                    </div>
                    <div class="col-3">
                        <div class="custom-textbox">
                            <input type="text" class="form-control"id="firstname" name="firstname" value="" >
                        </div>
                        <span id="alert_name" class="msg">ชื่อและนามสกุลนี้ถูกใช้งานแล้ว</span>
                    </div>
                    <div class="col-2 right">
                        นามสกุล:
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control"id="lastname" name="lastname" value = "" >
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
                            <input type="radio" class="form-check-input" name="gender" value="ชาย" >ชาย
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender"value="หญิง" >หญิง
                            </label>
                        </div>
                    </div>
                    <div class="col-2 right">
                        อายุ:
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" name="old" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        ที่อยู่:
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" name="address" ></textarea>
                    </div>
                    <div class="col-2 right">
                        เบอร์โทร:
                    </div>
                    <div class="col-3">
                        <input type="tel" class="form-control" name="number" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        ตำแหน่ง:
                    </div>
                    <div class="col-3" id="positiion">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="position" value="พนักงาน" >พนักงาน
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="position"value="กรรมการ" >กรรมการ
                            </label>
                        </div>
                    </div>
                    <div class="col-2 right">
                        Username:
                    </div>
                    <div class="col-3 right">
                        <div class="custom-textbox">
                            <input type="text" class="form-control"id="username" name="username" value="" >
                        </div>
                        <span id="alert_username" class="msg">Usernameถูกต้อง</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        Password :
                    </div>
                    <div class="col-3 ">
                        <input type="password" id="password" class="form-control" name="password"  >
                    </div>
                    <div class="col-2 right">
                        ยืนยัน Password :
                    </div>
                    <div class="col-3">
                        <input  type="password" id="confirm_password" class="form-control" name=""  >
                    </div>
                </div>
            </div>
            <div class="btncenter">
                <button  type="submit" id="save" class="btn btn-success " >
                    <span class="fa fa-edit"  >บันทึก</span>
                </button>
            </div>
        </form>
        <div class="panel-body">
            <table id="dataem" class="table table-striped table-bordered table-responsive-lg">
                <thead class="bg-success ">
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>เบอร์โทร</th>
                    <th>ตำแหน่ง</th>
                    <th>หมายเหตุ</th>
                </thead>
                <tbody>
                    @foreach ($employee as $key =>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->em_name}}</td>
                            <td>{{$item->em_lastname}}</td>
                            <td>{{$item->em_phone}}</td>
                            <td>{{$item->em_position}}</td>
                            <td>
                                <a href ="{{url('/detailuser')}}/{{$item->em_id}}" class='btn btn-info'>รายละเอียด</a>
                                <a href="{{url('/edit_dataem')}}/{{$item->em_id}}" class='btn btn-warning'>แก้ไข</a>
                                <button class='btn btn-danger' onclick='confirm_delete("{{$item->em_id}}")'>ลบ</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


