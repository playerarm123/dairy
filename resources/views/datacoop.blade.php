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
        function edit(){
            $('#name').removeAttr('disabled');

        }
        function cancel_edit(){

        }
        $(document).ready(function() {
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
        width: 90%;
        border: 3px solid #73AD21;
        padding: 10px;
    }
    .btncenter{
        width:10%;margin-left:45%;margin-right:45%;
    }

</style>
<div class="center">
    <h1 style="text-align:center">จัดการข้อมูลพื้นฐานสหกรณ์</h1><br>

    <form action="{{ url('/savecooper') }}" method="POST" id='form-submit'>
        @csrf
        <input type="hidden" name="" id="name">
        <input type="hidden" name="" id="address">
        <input type="hidden" name="" id="tel">
        <input type="hidden" name="" id="fax">
        <input type="hidden" name="" id="website">



            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        ชื่อสหกรณ์:
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="name"  id="name" readonly>
                    </div>
                    <div class="col-2">
                            ที่อยู่:
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="address" id="address" readonly>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        เบอร์โทร:
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control"id="tel" name="tel" readonly>
                    </div>
                    <div class="col-2">
                            เบอร์แฟกซ์ :
                    </div>
                        <div class="col-4">
                            <input type="tel" class="form-control"id="fax" name="fax" readonly>
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="row">
                        <div class="col-2">
                                โลโก้:
                        </div>
                        <div class="col-4">
                                <input type="file" class="form-control" name="logo" readonly>
                        </div>
                        <div class="col-2">
                            เว็บไซต์:
                        </div>
                        <div class="col-4">
                        <input type="url" class="form-control" id="website" name="website" readonly>
                        </div>
                </div>
            </div>
            <div class="form-group">
                    <div class="row">
                            <div class="col-2">
                                    อีเมล:
                            </div>
                            <div class="col-4">
                                    <input type="email" class="form-control" id="email" name="email" readonly>
                            </div>
                    </div>
            </div>
                <br><br>


        <br>
        <div style="width:100% "class="" >
            <button  type="submit" class="btn btn-success btncenter" >
                <span class="fa fa-edit" >แก้ไข</span>
            </button>
            <button  type="submit" class="btn btn-success btncenter" >
                <span class="fa fa-edit" >บันทึก</span>
            </button>
            <button  type="submit" class="btn btn-success btncenter" >
                <span class="fa fa-edit" >บันทึก</span>
            </button>
        </div>
    </form>

</div>


@stop


