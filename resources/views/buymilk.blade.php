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
        $(document).ready(function(){
            $('#price').on('keyup',function(){

                var total = 0;
                var rate = $('#rate').val();
                total=rate*$(this).val();
                $('#cost').val(total);
            });




        });
        function change_color(){
            $('#save').attr('style','background-color:red');
        }

    </script>
<<<<<<< HEAD
<style>

=======
<style>
>>>>>>> 093617c758928d748d83c1c4240272140199f964
    .center {
        margin: auto;
        width: 90%;
        border: 3px solid #73AD21;
        padding: 10px;
    }
    .btncenter{
        width:10%;margin-left:45%;margin-right:45%;
    }
    .right {
            text-align: right
        }
        .left{
            text-align: left
        }

</style>
<div class="center">
<h1 style="text-align:center">ระบบรับซื้อน้ำนมดิบ</h1><br>
<input type ="hidden" name="row" id="row" value="0">

<form action="/action_page.php">
    <div class="form-group">
            <div class="row">
                <div class="col-2 right">
               <h3> ข้อมูลสมาชิก</h3>
                </div>
            </div>
        </div>
    <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    รหัสสมาชิก:
                </div>
                <div class="col-4">
                        <input type="text" class="form-control" name="memid" required>
                </div>
            </div>
        </div>
        <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                    ชื่อ:
                    </div>
                    <div class="col-4">
                            <input type="text" class="form-control" name="memid" required>
                    </div>
                    <div class="col-2 right">
                            นามสกุล:
                            </div>
                            <div class="col-4">
                                    <input type="text" class="form-control" name="memid" required>
                            </div>
                </div>
            </div>
            <div class="form-group">
                    <div class="row">
                        <div class="col-2 right">
                       <h3> ข้อมูลน้ำนมดิบ</h3>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <div class="row">
                            <div class="col-2 right">
                           เกรด:
                            </div>
                            <div class="col-4">
                                    <div class="form-check-inline">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="grade" value="น้ำนมเกรดดี" >น้ำนมเกรดดี
                                            </label>
                                          </div>
                                          <div class="form-check-inline">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="grade"value="น้ำนมเกรดต่ำ" >น้ำนมเกรดต่ำ
                                            </label>
                                        </div>
                            </div>

                            <div class="col-2 right">
                                    ช่วงเวลา:
                                    </div>
                                    <div class="col-4">
                                            <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="range" value="ช่วงเช้า" >ช่วงเช้า
                                                    </label>
                                                  </div>
                                                  <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="ranger"value="ช่วงเย็น" >ช่วงเย็น
                                                    </label>
                                                </div>

                                    </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                            <div class="row">
                                <div class="col-2 right">
                                        น้ำหนัก(กิโลกรัม)::
                                </div>
                                <div class="col-4">
                                        <input type="number" class="form-control" name="memid" required>
                                </div>
                                <div class="col-2 right">
                                        ราคารับซื้อ:
                                </div>
                                        <div class="col-4 ">
                                                <input type="number" class="form-control" name="memid" required>
                                        </div>
                            </div>
                    </div>
    <br>

</div>
<div style="width:100% "class="" >
        <button  type="submit" id = "save"class="btn btn-success btncenter" >
            <span class="fa fa-edit" >บันทึก</span>
        </button>
    </div>
</form>
</div>


@stop


