@extends('menu')


@section('head')
@stop


@section('body')

    <script>


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

        <form action="{{url('/searchbuymilk')}}" method="POST"  id='form-submit'>
            @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-2 right">
                          ปี:
                        </div>
                        <div class="col-3">
                                <input type="number"class="form-control"  name="startyear"  id="startyear" placeholder="yyyy" min="2017" max="2100" >

                        </div>
                        <div class="col-2 right">
                                เดือน :
                              </div>
                              <div class="col-3">
                                      <select class="form-control"  name="startmonth" id="startmonth" >
                                              <option value="มกราคม">มกราคม</option>
                                              <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                              <option value="มีนาคม">มีนาคม</option>
                                              <option value="เมษายน">เมษายน</option>
                                              <option value="พฤษภาคม">พฤษภาคม</option>
                                              <option value="มิถุนายน">มิถุนายน</option>
                                              <option value="กรกฎาคม">กรกฎาคม</option>
                                              <option value="สิงหาคม">สิงหาคม</option>
                                              <option value="กันยายน">กันยายน</option>
                                              <option value="ตุลาคม">ตุลาคม</option>
                                              <option value="พฤศจิกายน">พฤศจิกายน</option>
                                              <option value="ธันวาคม">ธันวาคม</option>
                                      </select>
                              </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2 right">
                            วันที่ :
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
                </div>
                <div class="form-group">
                        <div class="row">
                            <div class="col-2 right">
                                รหัสสมาชิก:
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="mb_id" id="mb_id" >
                            </div>
                        </div>
                </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2 right">
                                ชื่อ:
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                            <div class="col-2 right">
                                นามสกุล:
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="lastname" id="lastname" >
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
                    <a href="{{url('/searchbuymilk')}}"  type="submit" id = "save" class="btn btn-success " ><span class="fa fa-save">PDF</span></a>
                        <a href="{{url('/resetbuymilk')}}" type="submit" id = "save" class="btn btn-warning " ><span class="fa fa-edit">Reset</span></a>
                </div>
                <br>
                <div class="panel-body">
                        <table id="report_buymilk" class="table table-striped table-bordered table-responsive-lg">
                            <thead class="bg-success ">
                                <th>ลำดับ</th>
                                <th>วันที่เริ่มต้น</th>
                                <th>วันที่สิ้นสุด</th>
                                <th>ชื่อ-นามสกุลสมาชิก</th>
                                <th>ช่วงเวลา</th>
                                <th>เกรด</th>
                                <th>หมายเหตุ</th>
                            </thead>
                            <tbody>
                                @if(Session::get('buymilk'))
                                    @foreach (Session::get('buymilk') as $key =>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->bm_date}}</td>
                                        <td>{{$item->bm_date}}</td>
                                        <td>{{$item->mb_name}}&ensp;&ensp;{{$item->mb_lastname}}</td>
                                        <td>{{$item->bm_range}}</td>
                                        <td>{{$item->milk_grade}}</td>
                                        <td>
                                            <a href ="{{url('/detailbuymilk')}}/{{$item->bm_id}}" class='btn btn-info'>รายละเอียด</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
        </form>
    </div>
@stop
