@extends('menu')


@section('head')

@stop


@section('body')

    <script>

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

        //คำนวณราคารับซื้อ  ต่อ ขีด  555
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
            var table =$('#Buymilk').DataTable({
                "paging": true,
                "autoWidth": false,
                "columns": [
                    { "width": "5%" },
                    { "width": "10%"},
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
        });

    </script>

    <div class="center">
        <h1 style="text-align:center">ระบบรับซื้อน้ำนมดิบ</h1><br>
        <input type ="hidden" name="row" id="row" value="0">

        <form action="/action_page.php">
            <div class="form-group">
                    <div class="row">
                        <div class="col-8 ">
                    <h3> ข้อมูลผู้ขายน้ำนม</h3>
                        </div>
                    </div>
                </div>
            <div class="form-group">
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
                    <div class="col-8 ">
                    <h3> รายละเอียดการขาย</h3>
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
                </div>
            </div>
            <div class="form-group">
                <div class="row">
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
                    <div class="col-2 right">
                        ราคาต่อหน่วย :
                    </div>
                    <div class="col-3">
                        <div class="input-group mb-3">
                            <input type="text" name="" id="pricein" class="form-control" readonly value=0>
                            <div class="input-group-append">
                                <span class="input-group-text " o>บาท</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2 right">
                        น้ำหนักรับซื้อ :
                    </div>
                    <div class="col-3">
                        <input type="hidden" name="weight" id="weight">
                        <div class="input-group mb-3">
                            <input type="number" name="" id="kl" onkeyup="caculate()" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text " o>กิโลกรัม</span>
                            </div>
                            <input type="text" name="" maxlength="3" min="1" onkeyup="caculate()" max="999" id="k" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text " o>กรัม</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 right">
                        ราคารับซื้อสุทธิ :
                    </div>
                    <div class="col-3">
                        <div class="input-group mb-3">
                            <input type="text" name="total" id="total" class="form-control" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text " o>บาท</span>
                            </div>
                        </div>
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
                    <table id="Buymilk" class="table table-striped table-bordered table-responsive-lg">
                        <thead class="bg-success ">
                            <th>ลำดับ</th>
                            <th>เลขที่รับซื้อ</th>
                            <th>ผู้ขายน้ำนม</th>
                            <th>เกรดน้ำนม</th>
                            <th>วันที่รับซื้อ</th>
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
                                        <a href ="{{url('show_buymilk')}}/{{$item->bm_id}}" class='btn btn-info'>รายละเอียด</a>
                                        <a href="{{url('/')}}/{{$item->bm_id}}" class='btn btn-danger'>ยกเลิก</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
        </form>
    </div>
@stop


