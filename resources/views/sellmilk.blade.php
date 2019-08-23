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
        function load_datacoop(){
            $.ajax({
                type:'get',
                url:'{{url("/showdatacoop")}}',
                success:function(data){
                    var table =$('#datacoop').DataTable();
                    data.forEach(item=>{
                        table.rows.add([{
                            0:[''],
                            1:[''],
                            2:[''],
                            3:[''],
                            4:[''],
                            5:[''],
                            6:[''],
                        }]);
                    });
                }
            });
        }
        $(document).ready(function() {
            load_datacoop();
                // $('#datamem').DataTable(
                // {
                //         "oLanguage": {
                //             "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                //             "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                //             "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                //             "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                //             "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                //             "sSearch": "ค้นหา :",
                //             "sLoadingRecords": "Please wait - loading...",
                //             "oPaginate": {
                //                 "sFirst": "หน้าแรก",
                //                 "sLast": "หน้าสุดท้าย",
                //                 "sPrevious": "ก่อน",
                //                 "sNext":"ถัดไป"
                //             }
                //         }
                        
                //     }
                // ); 
        });
    </script>
<style> 
    .center {
        margin: auto;
        width: 60%;
        border: 3px solid #73AD21;
        padding: 10px;
    }
    .btncenter{
        width:10%;margin-left:45%;margin-right:45%;
    }
            
</style>
<div class="center">
<h1 style="text-align:center">ระบบรับซื้อน้ำนมดิบ</h1><br>

<form action="/action_page.php">
    <div class="form-group">
            <div class="row">
                <div class="col-2">
                    วันที่:
                </div>
                <div class="col-4">
                    <input type="datetime-local" class="form-control" name="buymilk_date" required>
                </div>
            </div>
        </div> 
    <div class="form-group">
            <div class="row">
                <div class="col-2">
                    รหัสบริษัทคู่ค้า:
                </div>
                <div class="col-4">
                        <input type="text" class="form-control" name="memid" required>
                </div>
                <div class="col-2">
                    รหัสผู้ใช้งาน:
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="useid" required>
                </div>
            </div>
        </div>
        <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        รหัสน้ำนมดิบ:
                    </div>
                    <div class="col-4">
                            <input type="text" class="form-control" name="milkid" required>
                    </div>
                    <div class="col-2">
                        จำนวน(กิโลกรัม):
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" name="bm_milk_amount" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        ราคาขาย:
                    </div>
                    <div class="col-4">
                            <input type="text" class="form-control" name="milkid" required>
                    </div>
                </div>
            </div>
    <br>
    <div style="width:100% "class="" >
        <button  type="submit" class="btn btn-success btncenter" >
            <span class="fa fa-edit" ></span>
        </button>
    </div>
</div>
</form> 
<br><br>
<div class="panel-body">
    <table id="datamilk" class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-success">
            <th>วันที่</th>
            <th>รหัสบริษัทคู่ค้า</th>
            <th>รหัสผู้ใช้งาน</th>
            <th>รหัสน้ำนมดิบ</th>
            <th>จำนวน(กิโลกรัม)</th>
            <th>ราคาขาย</th>
            
        </thead>
        <tbody>
            
        </tbody>
                
    </table>
</div>
</div>


@stop


