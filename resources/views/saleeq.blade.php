@extends('menu')


@section('head')

@stop


@section('body')
<script>
            

            function swich(){
                var memnber = $('#member').prop('checked');
                var nomember = $('#nomember').prop('chacked');
                if( memnber == true){
                    $('#memberid').show();
                    $('#search').show();
                }else{
                    $('#memberid').hide();
                    $('#search').hide();
                    $('#name').removeAttr('readonly');
                    $('#lastname').removeAttr('readonly');
                }
                    
                    
                
               
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
        function search_equip(){
            $.ajax({
                url:"{{url('searchequip')}}/"+$('#equipcate').val(),
                type:"get",
                success:function(data){
                    console.log(data);
                    $('#cate').val(data['cate']);
                }

            })
            
        }

    
        
       
        
            // ตารางข้อมูล
            $(document).ready(function() {
            var table =$('#sale_equip').DataTable({
                        "paging": true,
                        "autoWidth": false,
                        "columns": [
                            { "width": "5%" },
                            null,
                            null,
                            null,
                            null,
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
                         searching:true,

                     }

                     );

        });
</script>

<style>        
</style>
<div class="center">
<h1 style="text-align:center">ระบบขายอุปกรณ์</h1><br>

<form action="/action_page.php">
    <div class="form-group">
         <div class="row">
            <div class="col-2 right">
                สถานะ :
            </div>
            <div class="col-3">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="member"value="สมาชิก" onchange="swich()">สมาชิก
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="nomember" value="ไม่เป็นสมาชิก" onchange="swich()">ไม่เป็นสมาชิก
                    </label>
                </div>
            </div>
            <div class="col-2 right">
                รหัสสมาชิก:
            </div>
            <div class="col-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="รหัสสมาชิก" id="memberid" name="memberid"   >
                    <div class="input-group-append">
                        <a class="input-group-text btn" onclick="search_member()" id="search">ค้นหา</a>
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
                <input type="text" class="form-control" name="name" id="name"   readonly >
            </div>
            <div class="col-2 right">
                นามสกุล:
            </div>
            <div class="col-3">
                <input type="text" class="form-control" name="lastname" id="lastname"   readonly>   
            </div>
         </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-2 right">
                อุปกรณ์:
            </div>
            <div class="col-3">
               <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="ประเภทอุปกรณ์" id="equipcate" name="equipcate">
                    <div class="input-group-append">
                        <a class="input-group-text btn" onclick="search_equip()">ค้นหา</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> 
<br><br>
<div class="panel-body">
    <table  class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-info">
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>รายการอุปกรณ์</th>
            <th>จำนวน(ชิ้น)</th>
            <th>ราคาต่อหน่วย</th>
            
            
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <th colspan="5" class="bg-info" >ราคารวมสุทธิ</th>
                <td  class="bg-warning">pp</td>
            </tr>
        </tbody>
    </table>
    <div class="btncenter" >
        <button  type="submit" id = "save"class="btn btn-success " >
            <span class="fa fa-edit">บันทึก</span>
        </button>
    </div>
    <br>
    <h1 style="text-align:center">รายการขายอุปกรณ์</h1><br>
    <table id="sale_equip" class="table table-striped table-bordered table-responsive-lg">
        <thead class="bg-success">
            <th>ลำดับ</th>
            <th> เกรดน้ำนมดิบ</th>
            <th> จำนวน(กิโลกรัม)</th>
            <th> ราคารับซื้อ</th>
            <th>ราคาขาย</th>
            <th>หมายเหตุ</th>

        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>
                    <a href ="{{url('/')}}/{{}}" class='btn btn-info'>รายละเอียด</a>
                </td>
            </tr>
               
        </tbody>
     </table>
</div>

</div>


@stop


