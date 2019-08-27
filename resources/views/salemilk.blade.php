@extends('menu')


@section('head')

@stop


@section('body')
   
    <script>

        function search_partners(){
            $.ajax({
                url:"{{url('searchpartners')}}/"+$('#partnersid').val(),
                type:"get",
                success:function(data){
                    console.log(data);
                    $('#name').val(data['name']);
                }

            })
            
        }
        $(document).ready(function(){
            $('#price').on('keyup',function(){

                var total = 0;
                var rate = $('#rate').val();
                total=rate*$(this).val();
                $('#cost').val(total);
            });




        });
       
        
            // ตารางข้อมูล
            var table =$('#sale_milk').DataTable({
                        "paging": true,
                        "autoWidth": false,
                        "columns": [
                            { "width": "5%" },
                            null,
                            {"width": "20%"},
                            {"width": "10%"},
                            {"width": "12%"},
                            {"width": "25%"}

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

                     });

    </script>



<div class="center">
<h1 style="text-align:center">ระบบขายน้ำนมดิบ</h1><br>
<input type ="hidden" name="row" id="row" value="0">

<form action="/action_page.php">
    <div class="form-group">
            <div class="row">
                <div class="col-2 right">
               <h3> ข้อมูลบริษัทคู่ค้า</h3>
                </div>
            </div>
        </div>
    <div class="form-group">
            <div class="row">
                <div class="col-2 right">
                    รหัสบริษัทคู่ค้า:
                </div>
                <div class="col-4">
                        <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="รหัสสมาชิกบริษัทคู่ค้า" id="partnersid" name="partnersid">
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
                           เกรดน้ำนมดิบ:
                            </div>
                            <div class="col-3">
                                @foreach ($grade as $item)
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="grade" value="{{$item->milk_id}}" >{{$item->milk_grade}}
                                        </label>
                                    </div>
                                    
                                @endforeach          
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                            <div class="row">
                                <div class="col-2 right">
                                        น้ำหนักขาย(ตัน):
                                </div>
                                <div class="col-3">
                                        <input type="number" class="form-control" name="memid" required>
                                </div>
                                <div class="col-2 right">
                                        ราคาขายสุทธิ:
                                </div>
                                        <div class="col-3 ">
                                                <input type="number" class="form-control" name="memid" required>
                                        </div>
                            </div>
                    </div>
    <br>
<div class="btncenter" >
        <button  type="submit" id = "save"class="btn btn-success " >
            <span class="fa fa-edit">บันทึก</span>
        </button>
    </div>
    <br>
    <div class="panel-body">
            <table id="buymilk" class="table table-striped table-bordered table-responsive-lg">
                <thead class="bg-success ">
                    <th>ลำดับ</th>
                    <th>รหัสขายน้ำนมดิบ</th>
                    <th>เกรดน้ำนมดิบ</th>
                    <th>น้ำหนักขาย(ตัน)</th>
                    <th>ราคาขายซื้อสุทธิ</th>
                    <th>หมายเหตุ</th>
                </thead>
                <tbody>
                    @foreach ($buymilk as $key =>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->bm_id}}</td>
                        <td>{{$item->milk_id}}</td>
                        <td>{{$item->bm_wiegh}}</td>
                        <td>{{$item->bm_pricein}}</td>
                        <td>
                                <a href="{{url('/')}}/{{$item->bm_id}}" class='btn btn-danger'>ยกเลิก</a>
                                <a href ="{{url('show_salemilk')}}/{{$item->bm_id}}" class='btn btn-info'>รายละเอียด</a>
                        </td>
                    </tr>
                    @endforeach
        
                </tbody>
        
            </table>
        </div>
</form>
</div>


@stop


