@extends('menu')

@section('head')

@stop

@section('body')
<script>


            function swich(){
                var memnber = $('#member').prop('checked');
                var nomember = $('#nomember').prop('chacked');
                if( memnber == true){
                    $('#memberid').show();
                    $('#search').show();
                    $('#name').attr('readonly','readonly');
                    $('#lastname').attr('readonly','readonly');
                    $('#name').val("");
                    $('#lastname').val("");
                }else{
                    $('#memberid').hide();
                    $('#search').hide();
                    $('#name').removeAttr('readonly');
                    $('#lastname').removeAttr('readonly');
                    $('#name').val("");
                    $('#memberid').val("");

                }




            }
            function search_member(){
            $.ajax({
                url:"{{url('searchmem')}}/"+$('#memberid').val(),
                type:"get",
                success:function(data){
                    console.log(data);
                    $('#name').val(data['name']);
                    $('#lastname').val(data['lastname']);
                }

            })

        }





            // ตารางข้อมูล
            $(document).ready(function() {
                var table =$('#list_saleeq').DataTable({
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
                    "sZeroRecords": "กรุณาคลิกปุ่ม 'เพิ่มรายการ' เพื่อเพิ่มรายการขายอุปกรณ์",
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
            $('#list_saleeq tbody').on( 'click', '.btn-danger', function () {
                var row_index = table.row($(this).parents('tr')).index();
                var all_row = $('#all-row').val();
                table.row( $(this).parents('tr') ).remove().draw();
                $('#all-row').val(parseInt(all_row-1));
            } );

        });
</script>

<style>
</style>
<div class="center">
<h1 style="text-align:center">รายการขายอุปกรณ์</h1><br>

<form action="{{ url('/savesaleeq') }}" method="POST" id='form-submit'>
    @csrf
    <input type="hidden" id="all-row">
    <div class="form-group">
         <div class="row">
            <div class="col-2 right">
                สถานะ :
            </div>
            <div class="col-3">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="member"value="สมาชิก" onchange="swich()" required>สมาชิก
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="nomember" value="ไม่เป็นสมาชิก" onchange="swich()" required>ไม่เป็นสมาชิก
                    </label>
                </div>
            </div>
            <div class="col-2 right">
                รหัสสมาชิก:
            </div>
            <div class="col-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="รหัสสมาชิก" id="memberid" name="memberid"  >
                    <div class="input-group-append">
                        <a class="input-group-text btn" onclick="search_member()" id="search">ค้นหา</a>
                    </div>
                </div>
            </div>
         </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-2 right">
                ชื่อ:
            </div>
            <div class="col-3">
                <input type="text" class="form-control" name="name" id="name" readonly>
            </div>
            <div class="col-2 right">
                นามสกุล:
            </div>
            <div class="col-3">
                <input type="text" class="form-control" name="lastname" id="lastname" readonly>
            </div>
         </div>
    </div>
    <a id = "save"class="btn btn-warning right"  data-toggle="modal" data-target="#equip" >
            <span class="fa fa-edit">เลือกอุปกรณ์</span>
    </a>
<br><br>
<div class="panel-body">
    <table id="list_saleeq" class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-success" >
            <th>ลำดับ</th>
            <th>รายการอุปกรณ์</th>
            <th>จำนวน(ชิ้น)</th>
            <th>ราคาต่อหน่วย</th>
            <th>ราคารวมสุทธิ</th>
            <th></th>



        </thead>
        <tbody>



        </tbody>
        <tfoot>


                <th colspan="5" class="bg-success" style="text-align:center">ราคารวมสุทธิ</th>
                <th class="bg-warning">
                    <input type="text" class="form-control" id="all_price" name="price_total" value=0.0 readonly>
                </th>

        </tfoot>
    </table>
    <div class="btncenter" >
        <button  type="submit" id = "saveeq" class="btn btn-success " >
            <span class="fa fa-save">บันทึก</span>
        </button>
    </div>
    <br>

</div>
</form>
</div>
 <!-- The Modal vxcv ################################################################################### -->
 <script>
        $(document).ready(function(){
            $('#sale_equip').DataTable();


        });
        // เพิ่มรายการรับ
        function add_saleeq(id,name,amount,unit,price){
            var table = $('#list_saleeq').DataTable();
            var all_row = $('#all-row').val();
            table.row.add([
                "",
                "<input type='hidden' name='eq_id[]' value="+id+">"+name,
                "<input type='text' class='form-control'name='seq_amount[]' id='seq_amount"+id+"'onkeyup='cal_total("+id+")' required>",
                "<input type='number'class='form-control'name='price[]' id='price"+id+"' readonly value="+price+">",
                "<input type='number' name='seq_pricetotal[]' class='form-control' id='seq_pricetotal"+id+"'readonly>",
                "<a class='btn btn-danger' >ลบ</a>"
            ]).draw();
            $('#equip').modal('hide');
            $('#all-row').val(parseInt(all_row+1));
        }
        // รวมจำนวนล่าสุด
        function cal_total(id){
            var seq_amount = $('#seq_amount'+id).val();
            var price = $('#price'+id).val();
            var seq_pricetotal = parseInt(seq_amount) * parseFloat(price);
            var all_price = parseFloat($('#all_price').val());
            all_price = parseFloat(all_price)+parseFloat(seq_pricetotal);
            $('#all_price').val(parseFloat(all_price));
            $('#seq_pricetotal'+id).val(seq_pricetotal);

        }

    </script>
<div class="modal fade" id="equip">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">รายการอุปกรณ์</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-striped table-bordered table-responsive-lg" id="sale_equip">
                    <thead>
                        <th>ลำดับ</th>
                        <th>รหัสรายการ</th>
                        <th>รายการ</th>
                        <th>จำนวนคงเหลือ</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($equip as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->eq_id }}</td>
                                <td>{{ $item->eq_name }}</td>
                                <td>{{$item->eq_amount}} {{$item->eq_unit}}</td>
                                <td><button class="btn btn-success" onclick="add_saleeq({{ $item->eq_id }},'{{ $item->eq_name }}',{{$item->eq_amount}},'{{ $item->eq_unit }}',{{$item->eq_price}})" {{ ( $item->eq_amount==0)?"disabled":""}}>เลือก</button></td>
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



