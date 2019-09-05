@extends('menu')


@section('head')

@stop


@section('body')
    <script>
           function confirm_delete(Mb_id){
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
                        url : "{{ url('deletemem')}}/"+Mb_id,
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
            $('#form-submit').on('submit',function (e) {
                e.preventDefault();
                  $.ajax({
                        type: "POST",
                        url: "{{ url('checkmember')}}",
                        data: {
                            fname: $('#firstname').val(),
                            lname: $('#lastname').val(),
                            _token: "{{ csrf_token() }}"
                        },asyn:true,
                        success:function(data){
                            console.log(data);
                            if(data == 0 ) {
                                //สั่งให้ทำการบันทึกข้อมูลต่อไป
                                $('#form-submit').unbind('submit').submit();
                            }
                            // ถ้า ชื่อ หรือ username ซ้ำกัน ให้ทำงานใน else
                            else{
                                $('#alert_name').show();


                            }
                        }
                    });


            });
            var table =$('#member').DataTable({
                        "paging": true,
                        "autoWidth": false,
                        "columns": [
                            { "width": "5%" },
                            null,
                            null,
                            null,
                            {"width": "10%"},
                            {"width": "22%"},


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
    </script>
<div class="center">
<h1 style="text-align:center">จัดการข้อมูลพื้นฐานสมาชิก</h1><br>

<form action="{{ url('/savemember') }}" method="POST" id='form-submit'>
      @csrf
    <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    ชื่อ:
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="firstname" required >
                </div>
                <div class="col-2 right">
                        นามสกุล:
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" name="lastname" required>
                    </div>
                </div>
                <span id="alert_name" class="msg">ชื่อและนามสกุลนี้ถูกใช้งานแล้ว</span>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    เพศ:
                </div>
                <div class="col-3">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" value="ชาย" required>ชาย
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" value="หญิง" required>หญิง
                        </label>
                    </div>
                </div>
                <div class="col-2 right">
                        อายุ:
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" name=old required>
                    </div>


                </div>
            </div>
        <div class="form-group">
            <div class="row">
                    <div class="col-2 right">
                            ที่อยู่:
                    </div>
                    <div class="col-3">
                            <textarea class="form-control" name="address" required></textarea>
                    </div>
                <div class="col-2 right">
                        เบอร์โทร:
        </div>
        <div class="col-3">
            <input type="text" class="form-control" name="number" required>
        </div>

            </div>
        </div>

            <br>
    <br>
    <div class="btncenter" >
        <button  type="submit" class="btn btn-success " >
            <span class="fa fa-edit" >บันทึก</span>
        </button>
    </div>
    <br><br>
<div class="panel-body">
    <table id="member" class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-success">
            <th width ="10%">ลำดับ</th>
            <th> ชื่อ</th>
            <th> นามสกุล </th>
            <th> ที่อยู่</th>
            <th> เบอร์โทร</th>
            <th>หมายเหตุ</th>
        </thead>

        <tbody>
                @foreach ($member as $key =>$item)
                <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->mb_name}}</td>
                <td>{{$item->mb_lastname}}</td>
                <td>{{$item->mb_address}}</td>
                <td>{{$item->mb_phone}}</td>
                <td>
                    <a href="{{url('/edit_datamem')}}/{{$item->mb_id}}" class='btn btn-warning'>แก้ไข</a>
                    <button class='btn btn-danger' onclick='confirm_delete("{{$item->mb_id}}")'>ลบ</button>
                    <a href ="{{url('/detailmem')}}/{{$item->mb_id}}" class='btn btn-info'>รายละเอียด</a>
                </td>
                </tr>
                @endforeach
        </tbody>
     </table>

</div>
</div>


@stop


