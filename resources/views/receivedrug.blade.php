@extends('menu')


@section('head')

@stop


@section('body')
    <script>
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
</style>
<div class="center">
<h1 style="text-align:center">ระบบรับอุปกรณ์(ยารักษาโรค)</h1><br>
<form action="{{ url('/savereceivedrung') }}" method="POST" id='form-submit'>
    @csrf
             <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    รหัสบริษัทคู่ค้า:
                </div>
                <div class="col-4">
                        <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="บริษัทคู่ค้า" id="partnersid" name="partnersid">
                                <div class="input-group-append">
                                  <a class="input-group-text btn" onclick="search_partners()">ค้นหา</a>
                                </div>
                              </div>
                </div>
            </div>
        </div>
        <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                    ชื่อบริษัท:
                    </div>
                    <div class="col-3">
                            <input type="text" class="form-control" name="name" id="name" disabled="disabled">
                    </div>
                </div>
            </div>
        </div> 
    <div class="form-group">
            <div class="row">
                <div class="col-2">
                    รหัสสั่งซื้ออุปกรณ์:
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
                        รหัสอุปกรณ์:
                    </div>
                    <div class="col-4">
                            <input type="text" class="form-control" name="milkid" required>
                    </div>
                    <div class="col-2">
                        จำนวน(ชิ้น):
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" name="bm_milk_amount" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        ราคาต่อชิ้น:
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
</form> 
<br><br>
<div class="panel-body">
    <table id="datamilk" class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-success">
            <th>วันที่</th>
            <th>รหัสสั่งซื้ออุปกรณ์</th>
            <th>รหัสผู้ใช้งาน</th>
            <th>รหัสอุปกรณ์</th>
            <th>จำนวน(ชิ้น)</th>
            <th>ราคาต่อชิ้น</th>
            
        </thead>
        <tbody>
            
        </tbody>
                
    </table>
</div>
</div>


@stop


