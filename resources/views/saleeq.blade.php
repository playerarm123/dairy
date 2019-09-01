@extends('menu')


@section('head')

@stop


@section('body')
    <script>


        $(document).ready(function(){
            var table =$('#saleequip').DataTable({
                "paging": true,
                "autoWidth": false,
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "columns": [
                    { "width": "5%" },
                    null,
                    {"width": "15%"},
                    {"width": "15%"},
                    {"width": "15%"},

                ],
                "order": [[ 1, 'asc' ]],
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "กรุณาคลิกปุ่ม 'เพิ่มรายการ' เพื่อเพิ่มรายการขาย",
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
            table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            // ลบแถวในตาราง
            $('#saleequip tbody').on( 'click', '.btn-danger', function () {
                var row_index = table.row($(this).parents('tr')).index();
                var all_row = $('#all-row').val();
                table.row( $(this).parents('tr') ).remove().draw();
                $('#all-row').val(parseInt(all_row-1));
            } );

            // เช็คความเรียบร้อยก่อน บันทึก
            $('#form-submit').on('submit',function(e){
                var all_row = parseInt($('#all-row').val()); //จำนวนแถวรายการรับ
                e.preventDefault();  //หยุดการบันทึกชั่วคราว
                if(all_row > 0){  //ถ้าแถวมากกว่า 0 ถึงจะทำการบันทึกต่อไป
                    $('#form-submit').unbind('submit').submit();
                }else{  // ถ้าไม่ใช่ ให้แจ้งเตือน
                    swal("กรุณาเพิ่มรายการขายอุปกรณ์");
                }
            });

        });
    </script>
    <div class="center">
        <h1 style="text-align:center">ระบบขายอุปกรณ์</h1><br>
        <div class="row-search right">
<br><br>
<br><br>
            <a href ="{{url('/uplist')}}" class='btn btn-info'><span class="fa fa-edit">เพิ่มรายการ</span></a>
        </div>
            <br>

            @csrf

            <input type="hidden" name="" id="all-row" value=0>
            <div class="panel-body">
                <table id="saleequip" class="table table-striped table-bordered table-responsive-lg">
                    <thead class="bg-success">
                        <th>ลำดับ</th>
                        <th>ผู้ซื้อ</th>
                        <th>วันที่</th>
                        <th>ยอดขาย</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($saleeq as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->mb_name }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>

    </div>



@stop


