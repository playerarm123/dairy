@extends('menu')


@section('head')

@stop


@section('body')

    <script>

       function confirm_delete(milk_id){
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
                        url : "{{ url('deletemilk')}}/"+milk_id,
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
            var table =$('#milk').DataTable({
                        "paging": true,
                        "autoWidth": false,
                        "columns": [
                            { "width": "5%" },
                            null,
                            null,
                            null,
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
<style>


</style>
<div class="center">
<h1 style="text-align:center">จัดการข้อมูลพื้นฐานน้ำนมดิบ</h1><br>

<form action="{{ url('/savemilk') }}" method="POST" id='form-submit'>
      @csrf




        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    เกรดน้ำนมดิบ:
                </div>
                <div class="col-3">
                                <input type="text" class="form-control" name="milk_grade" required>
                        </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    ราคารับซื้อ:
                </div>
                <div class="col-3">
                    <input type="number" class="form-control" name="milk_pricein" required>
                </div>
                <div class="col-2 right">
                        ราคาขาย:
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" name="milk_priceout" required>
                    </div>
            </div>
        </div>


    <br>
    <div class="btncenter" >
        <button  type="submit" class="btn btn-success " >
            <span class="fa fa-edit" >บันทึก</span>
        </button>
    </div>

</form>
<br><br>
<div class="panel-body">
    <table id="milk" class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-success">
            <th>ลำดับ</th>
            <th> เกรดน้ำนมดิบ</th>
            <th> ราคารับซื้อ</th>
            <th>ราคาขาย</th>
            <th>หมายเหตุ</th>

        </thead>
        <tbody>
                @foreach ($milk as $key =>$item)
                <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->milk_grade}}</td>
                <td>{{$item->milk_pricein}}&ensp;บาท</td>
                <td>{{$item->milk_priceout}}&ensp;บาท</td>
                <td>
                    <a href="{{url('/edit_datamilk')}}/{{$item->milk_id}}" class='btn btn-warning'>แก้ไข</a>
                    <button class='btn btn-danger' onclick='confirm_delete("{{$item->milk_id}}")'>ลบ</button>
                    <a href ="{{url('/detailmilk')}}/{{$item->milk_id}}" class='btn btn-info'>รายละเอียด</a>
                </td>
                </tr>
                @endforeach
        </tbody>
     </table>
</div>
</div>


@stop

