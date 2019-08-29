@extends('menu')


@section('head')

@stop


@section('body')
    <script>
        $(document).ready(function(){
            $('#drug-table').DataTable();
        });
        function store_table(id,name,amount,unit){
            var table = $('#receive-table').DataTable();
            table.row.add([
                "",
                "<input type='hidden' name='eq_id[]'>"+name,
                "<input type='hidden' name='eq_amount' id='"+id+"'>"+amount,
                "<input type='number' name='get_amount[]' id='get_amount"+id+"' onkeyup='cal_total("+id+")'",
                "<input type='number' name='total[]' id='total"+id+"'>",
                "<button class='btn btn-danger' onclick='delete_row("+id+")'>ลบ</button>"
            ]).draw();
            $('#drug').modal('hide');
        }
    </script>
    <div class="center">
        <h1 style="text-align:center">ระบบรับอุปกรณ์(ยา)</h1><br>
        <div class="row-search">
            <button class="btn btn-success btn-search" data-toggle="modal" data-target="#drug">เพิ่มรายการ</button>
        </div>
        <form action="">
            <input type="hidden" name="" id="all-row">
            <div class="panel-body">
                <table id="receive-table" class="table table-striped table-bordered table-responsive-lg">
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
            </div>
        </form>
    </div>


    <!-- The Modal vxcv ################################################################################### -->
    <script>
        $(document).ready(function(){
            $('#drug-table').DataTable();
        });
        function store_table(id,name,amount,unit){
            var table = $('#receive-table').DataTable();
            table.row.add([
                "",
                "<input type='hidden' name='eq_id[]'>"+name,
                "<input type='hidden' name='eq_amount' id='"+id+"'>"+amount,
                "<input type='number' name='get_amount[]' id='get_amount"+id+"' onkeyup='cal_total("+id+")'",
                "<input type='number' name='total[]' id='total"+id+"'>",
                "<button class='btn btn-danger' onclick='delete_row("+id+")'>ลบ</button>"
            ]).draw();
            $('#drug').modal('hide');
        }

    </script>
<div class="modal fade" id="drug">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">รายการอุปกรณ์รีดนม</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-striped table-bordered table-responsive-lg" id="drug-table">
                    <thead>
                        <th>ลำดับ</th>
                        <th>รหัสรายการ</th>
                        <th>รายการ</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($tool as $key => $item)
                            {{-- <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->eq_id }}</td>
                                <td>{{ $item->eq_name }}</td>
                                <td><button class="btn btn-success" onclick="store_table({{ $item->eq_id }},'{{ $item->eq_name }}',{{ $item->eq_amount }},'{{ $item->eq_unit }}')">เลือก</button></td>
                            </tr> --}}
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


