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
    <script>
           function confirm_delete(eq_id){
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
                        url : "{{ url('deletepro')}}/"+eq_id,
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
            var table =$('#equip').DataTable({
                        "paging": true,
                        "autoWidth": false,
                        "columns": [
                            { "width": "5%" },
                            null,
                            null,
                            {"width": "10%"},
                            {"width": "10%"},
                            {"width": "20%"},
                            
                           
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
                         searching:false,

                     }

                     );
            
        });
    </script>
<style> 
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
<h1 style="text-align:center">จัดการข้อมูลพื้นฐานอุปกรณ์</h1><br>

<form action="{{ url('/savepro') }}" method="POST" id='form-submit'>
      @csrf
      

        <div class="form-group">
            <div class="row">
                <div class="col-2">
                    ชื่ออุปกรณ์:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="name" required >
                </div>
                <div class="col-2">
                    ประเภท:
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="cate" required>
                </div> 
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2">
                   จำนวน:
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" name="number" required>
                </div>
                <div class="col-2">
                        ราคา:
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="price" required >
                    </div>
            </div>
        </div>
    <div style="width:100%">
        <button  type="submit" class="btn btn-success btncenter" >
            <span class="fa fa-edit" >บันทึก</span>
        </button>
    </div>
</form> 
<br><br>
<br><br>
<div class="panel-body">
    <table id="equip" class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-success ">
            <th>ลำดับ</th>
            <th> ชื่ออุปกรณ์</th>
            <th>ประเภท</th>
            <th> หน่วยนับ </th>
            <th> ราคา</th>
            <th>หมายเหตุ</th>
        </thead>
        <tbody>
                @foreach ($equip as $key =>$item)
                <tr>
                <td>{{$item->eq_name}}</td>
                <td>{{$item->eq_cate}}</td>
                <td>{{$item->eq_unit}}</td>
                <td>{{$item->eq_price}}</td>
                <td>
                    <a href="{{url('/editpro')}}/{{$item->eq_id}}" class='btn btn-warning'>แก้ไข</a>
                    <button class='btn btn-danger' onclick='confirm_delete("{{$item->eq_id}}")'>ลบ</button>
                    <a href ="{{url('/detailpro')}}/{{$item->eq_id}}" class='btn btn-info'>รายละเอียด</a>
                </td>
                </tr>
                @endforeach
        </tbody>          
                
    </table>
</div>

@stop


