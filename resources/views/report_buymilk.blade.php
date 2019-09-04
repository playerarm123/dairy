@extends('menu')


@section('head')

@stop


@section('body')

    <script>
        function confirm_delete(bm_id){
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
                        type:"GET",
                        url: " {{ url('checkdlbuymilk') }}/"+bm_id,
                        success:function(result){
                            if(result == "yes"){
                                $.ajax({
                                    type: "GET",
                                    url : "{{ url('deleteuser')}}/"+bm_id,
                                    success:function(data){
                                    }
                                });
                            }else{
                                swal('แจ้งเตือน','ไม่สามารถลบข้อมูลได้','warning');
                            }
                        }
                    });

                } else {
                    // ถ้ากด ไม่ใช่
                    swal("ยกเลิก", "ยกเลิกการลบข้อมูลเรียบร้อยแล้ว :)", "error");
                }
            });

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
        function set_perPrice(key){
            var price = $('#per_price'+key).val();
            $('#pricein').val(price);
            caculate();
        }

        //คำนวณราคารับซื้อ  ต่อ ขีด
        function caculate(){
            var k = 0;
            var kl = 0;
            var weight = 0;
            var total = 0;
            var keed = 0;
            var pricein = 0;
            if($('#k').val() != ""){ k = parseInt($('#k').val());}
            if($('#kl').val() != ""){ kl = parseInt($('#kl').val());}
            if($('#weight').val() != ""){ weight = parseInt($('#weight').val());}
            if($('#pricein').val() != ""){ pricein = parseFloat($('#pricein').val());}
            kl = kl * 1000;
            weight = k + kl;
            keed = weight / 100;
            total = parseInt(keed) * pricein;
            $('#weight').val(weight);
            $('#total').val(total);
        }
        $(document).ready(function(){

            // ตารางข้อมูล
            var table =$('#report_buymilk').DataTable({
                "paging": true,
                "autoWidth": false,
                "columns": [
                    { "width": "5%" },
                    {"width": "15%"},
                    {"width": "15%"},
                    {"width": "15%"},
                    {"width": "15%"},
                    {"width": "15%"},
                    {"width": "15%"}

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
        });

    </script>

    <div class="center">
        <h1 style="text-align:center">รายงานข้อมูลรับซื้อน้ำนมดิบ</h1><br>
        <input type ="hidden" name="row" id="row" value="0">

        <form action="{{url('/loadreportbuymilk')}}" method="POST"  id='form-submit'>
            @csrf
            <div class="form-group">
                    <div class="row">
                        <div class="col-2 right">
                    <h3> ช่วงเวลา</h3>
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                      ตั้งแต่ :
                    </div>
                    <div class="col-3">
                            <input type="date" class="form-control" name="startdate" id="startdate">
                    </div>
                    <div class="col-2 right">
                        ถึง :
                    </div>
                    <div class="col-3">
                        <input type="date" class="form-control" name="enddate" id="enddate">
                    </div>
                </div>
            </div><div class="form-group">
                    <div class="row">
                        <div class="col-2 right">
                            รหัสสมาชิก:
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="รหัสสมาชิก" id="memberid" name="memberid">
                                <div class="input-group-append">
                                <a class="input-group-text btn" onclick="search_member()">ค้นหา</a>
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
                            <input type="text" class="form-control" name="name" id="name" disabled="disabled">
                        </div>
                        <div class="col-2 right">
                            นามสกุล:
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="lastname" id="lastname" disabled="disabled">
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        ช่วงเวลา:
                    </div>
                    <div class="col-3">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="range" value="ช่วงเช้า" >ช่วงเช้า
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="range"value="ช่วงเย็น" >ช่วงเย็น
                            </label>
                        </div>
                    </div>
                    <div class="col-2 right">
                        เกรด:
                    </div>
                    <div class="col-3">
                        @foreach ($grade as $key => $item)
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                <input type="hidden" name="" id="per_price{{ $key }}" value="{{ $item->milk_pricein }}">
                                <input type="radio" class="form-check-input" onchange="set_perPrice({{ $key }})" id="grade{{ $key }}" name="grade" value="{{$item->milk_id}}" >{{$item->milk_grade}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        <div class="btncenter" >
                <button  type="submit" id = "save" class="btn btn-info " ><span class="fa fa-search">ค้นหา</span></button>
                <button  type="submit" id = "save" class="btn btn-success " ><span class="fa fa-save">PDF</span></button>
                <button  type="submit" id = "save" class="btn btn-warning " ><span class="fa fa-edit">Reset</span></button>
            </div>
            <br>
            <div class="panel-body">
                    <table id="report_buymilk" class="table table-striped table-bordered table-responsive-lg">
                        <thead class="bg-success ">
                            <th>ลำดับ</th>
                            <th>วันที่เริ่มต้น</th>
                            <th>วันที่สิ้นสุด</th>
                            <th>รหัสสมาชิก</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ช่วงเวลา</th>
                            <th>เกรด</th>
                            <th>หมายเหตุ</th>
                        </thead>
                        {{-- <tbody>
                            @foreach ($buymilk as $key =>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->bm_date}}</td>
                                <td>{{$item->mb_name}}&ensp;&ensp;{{$item->mb_lastname}}</td>
                                <td>{{$item->bm_range}}</td>
                                <td>{{$item->milk_grade}}</td>
                                <td>{{number_format($item->bm_weight/1000,2)}}&ensp;กิโลกรัม</td>
                                <td>{{number_format($item->bm_pricein,2)}}&ensp;บาท</td>
                                <td></td>
                                <td>
                                        <a href ="{{url('/detailbuymilk')}}/{{$item->bm_id}}" class='btn btn-info'>รายละเอียด</a>
                                </td>
                            </tr>
                          

                        </tbody> --}}

                    </table> 
                </div>
           
        </form>
    </div>
@stop
