@extends('menu')


@section('head')

@stop


@section('body')

    <script>
        function set_perPrice(key){
            var price = $('#per_price'+key).val();
            $('#priceout').val(price);
            caculate();
        }
        
        //คำนวณราคารับซื้อ  ต่อ ขีด
        function caculate(){
            var k = 0;
            var kl = 0;
            var weight = 0;
            var total = 0;
            var keed = 0;
            var priceout = 0;
            if($('#k').val() != ""){ k = parseInt($('#k').val());}
            if($('#kl').val() != ""){ kl = parseInt($('#kl').val());}
            if($('#weight').val() != ""){ weight = parseInt($('#weight').val());}
            if($('#priceout').val() != ""){ priceout = parseFloat($('#priceout').val());}
            kl = kl * 1000;
            weight = k + kl;
            keed = weight / 100;
            total = parseInt(keed) * priceout;
            $('#weight').val(weight);
            $('#total').val(total);
        }

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


            // ตารางข้อมูล
            var table =$('#sale_milk').DataTable({
                        "paging": true,
                        "autoWidth": false,
                        "columns": [
                            { "width": "5%" },
                            {"width": "15%"},
                            {"width": "10%"},
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
                                <input type="text" class="form-control" placeholder="บริษัทคู่ค้า" id="partnersid" name="partnersid" required>
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
                        <div class="col-8 ">
                        <h3> รายละเอียดการขาย</h3>
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
                                    <input type="hidden" name="" id="per_price{{ $key }}" value="{{ $item->milk_priceout }}" required>
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
                                <input type="text" name="" id="priceout" class="form-control" readonly value=0>
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
                            น้ำหนักทีี่ขาย :
                        </div>
                        <div class="col-3">
                            <input type="hidden" name="weight" id="weight">
                            <div class="input-group mb-3">
                                <input type="number" name="" id="kl" onkeyup="caculate()" class="form-control" required>
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
                            ราคาขายสุทธิ :
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
            <table id="sale_milk" class="table table-striped table-bordered table-responsive-lg">
                <thead class="bg-success ">
                    <th>ลำดับ</th>
                    <th>รหัสบริษัทคู่ค้า</th>
                    <th>รหัสน้ำนมดิบ</th>
                    <th>น้ำหนักขาย</th>
                    <th>ราคาขายสุทธิ</th>
                    <th>หมายเหตุ</th>
                </thead>
                <tbody>
                    @foreach ($salemilk as $key =>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->pn_id}}</td>
                        <td>{{$item->milk_id}}</td>
                        <td>{{$item->sm_weight}}</td>
                        <td>{{$item->sm_pricetotal}}</td>
                        <td>
                        <a href ="{{url('/detailsellmilk')}}/{{$item->sm_id}}" class='btn btn-info'>รายละเอียด</a>
                         <a href="{{url('/')}}/{{$item->sm_id}}" class='btn btn-danger'>ยกเลิก</a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
</form>
</div>


@stop


