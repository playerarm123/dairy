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
  <
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
                        type: "GET",
                        url : "{{ url('deleteuser')}}/"+Em_id,
                        success:function(data){

                            location.reload();
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
                            {"width": "20%"},
                            {"width": "10%"},
                            {"width": "12%"},
                            {"width": "25%"}

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

                     }

                     );

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
    <style>
            .right {
                text-align: right
            }
            .left{
                text-align: left
            }

            .custom-textbox {
                margin-bottom: -20px;
            }
            .msg {
                color: red;
                display: none;

            }
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
<h1 style="text-align:center">จัดการข้อมูลพื้นฐานผู้ใช้งาน</h1><br>

<form action="{{ url('/savedataem') }}" method="POST" id='form-submit'>
      @csrf

        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    ชื่อ:
                </div>
                <div class="col-4">
                    <div class="custom-textbox">
                        <input type="text" class="form-control"id="firstname" name="firstname" value="test" >
                    </div>
                    <span id="alert_name" class="msg">ชื่อและนามสกุลนี้ถูกใช้งานแล้ว</span>
                </div>
                <div class="col-2 right">
                    นามสกุล:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"id="lastname" name="lastname" value = "test2" >
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    เพศ:
                </div>
                <div class="col-4">
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
                <div class="col-4">
                    <input type="number" class="form-control" name="old" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                        ที่อยู่:
                </div>
                <div class="col-4">
                        <textarea class="form-control" name="address" ></textarea>
                </div>
                <div class="col-2 right">
                    เบอร์โทร:
                </div>
                <div class="col-4">
                    <input type="tel" class="form-control" name="number" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                    <div class="col-2 right">
                            ตำแหน่ง:
                        </div>
                        <div class="col-4" id="positiion">

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
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    Username:
                </div>
                <div class="col-4 right">
                    <div class="custom-textbox">
                        <input type="text" class="form-control"id="username" name="username" value="testu" >
                    </div>
                    <span id="alert_username" class="msg">Usernameถูกต้อง</span>
                </div>
                <div class="col-2 right">
                        Password :
                    </div>
                    <div class="col-4 right">
                        <input type="text" id="password" class="form-control" name="password"  >
                    </div>
            </div>
        </div>
        <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        ยืนยัน Password :
                    </div>
                    <div class="col-4">
                        <input  type="text" id="confirm_password" class="form-control" name="s"  >
                    </div>
                </div>
            </div>
    <div style="width:100%">
        <button  type="submit" id="save" class="btn btn-success btncenter" >
            <span class="fa fa-edit"  >บันทึก</span>
        </button>
    </div>
</form>
<br><br>
<div class="panel-body">
    <table id="dataem" class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-success ">
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>ที่อยู่</th>
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
                <td>{{$item->em_address}}</td>
                <td>{{$item->em_phone}}</td>
                <td>{{$item->em_position}}</td>
                <td>
                        <a href="{{url('/edit_dataem')}}/{{$item->em_id}}" class='btn btn-warning'>แก้ไข</a>
                        <button class='btn btn-danger' onclick='confirm_delete("{{$item->em_id}}")'>ลบ</button>
                        <a href ="{{url('/detailuser')}}/{{$item->em_id}}" class='btn btn-info'>รายละเอียด</a>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
</div>

@stop


