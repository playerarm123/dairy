@extends('menu')


@section('head')

@stop


@section('body')
    <script>  $(document).ready(function(){
            var table =$('#receive-food').DataTable({
                "paging": false,
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
                    {"width": "15%"},

                ],
                "order": [[ 1, 'asc' ]],
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "กรุณาคลิกปุ่ม 'เพิ่มรายการ' เพื่อเพิ่มรายการรับ",
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
                searching:false,
            });
            table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            // ลบแถวในตาราง
            $('#receive-table tbody').on( 'click', '.btn-danger', function () {
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
                    swal("กรุณาเพิ่มรายการรับอุปกรณ์");
                }
            });

        });
    </script>
    <div class="center">
        <h1 style="text-align:center">ระบบรับอาหารสัตว์</h1><br>
        <div class="row-search">
            <button class="btn btn-info btn-search" data-toggle="modal" data-target="#food">เพิ่มรายการ</button>
        </div>
        <form action="{{ url('savefood')}}" method="POST" id="form-submit">
            @csrf
            <input type="hidden" name="" id="all-row">
            <div class="panel-body">
                <table id="receive-food" class="table table-striped table-bordered table-responsive-lg">
                    <thead class="bg-success">
                        <th>ลำดับ</th>
                        <th>รายการ</th>
                        <th>จำนวนคงเหลือ</th>
                        <th>รับเพิ่ม</th>
                        <th>รวมทั้งสิ้น</th>
                        <th></th>
                    </thead>
                    <tbody>

                    </tbody>


                </table>
                <div class="btncenter">
                        <button  type="submit" id="save" class="btn btn-success" >
                            <span class="fa fa-edit"  >บันทึก</span>
                        </button>
                </div>
            </div>
        </form>
    </div>


    <!-- The Modal dsf ################################################################################### -->
    <script>
        $(document).ready(function(){
            $('#food-table').DataTable();


        });
        // เพิ่มรายการรับ
        function store_table(id,name,amount,unit){
            var table = $('#receive-food').DataTable();
            var all_row = $('#all-row').val();
            table.row.add([
                "",
                "<input type='hidden' name='eq_id[]' value="+id+">"+name,
                "<input type='text' class='form-control'name='eq_amount' id='amount"+id+"'value="+amount+" readonly>",
                "<input type='number'class='form-control'name='eq_amount[]' id='get_amount"+id+"' onkeyup='cal_total("+id+")'required>",
                "<input type='number' name='eq_total[]' class='form-control' id='total"+id+"'readonly>",
                "<a class='btn btn-danger' >ลบ</a>"
            ]).draw();
            $('#food').modal('hide');
            $('#all-row').val(parseInt(all_row+1));
        }
        // รวมจำนวนล่าสุด
        function cal_total(id){
            var eq_amount = $('#amount'+id).val();
            var get_amount = $('#get_amount'+id).val();
            var total = parseInt(eq_amount) + parseInt(get_amount);
            $('#total'+id).val(total);
        }
    </script>
    <div class="modal fade" id="food">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">รายการอาหารสัตว์</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-striped table-bordered table-responsive-lg" id="food-table">
                    <thead>
                        <th>ลำดับ</th>
                        <th>รหัสรายการ</th>
                        <th>รายการ</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($food as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->eq_id }}</td>
                                <td>{{ $item->eq_name }}</td>
                                <td><button class="btn btn-success" onclick="store_table({{ $item->eq_id }},'{{ $item->eq_name }}',{{ $item->eq_amount }},'{{ $item->eq_unit }}')">เลือก</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>

@stop


