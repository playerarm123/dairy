<!-- วิธีใช้ dataTable -->

<script>
    var table = $('#order').DataTable({   
        "paging": false,  
        "autoWidth": false,
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "columns": [
            { "width": "5%" },
            null,
            null,
            null, 
            {"width": "5%"},
            {"width": "12%"},
            {"width": "8%"}
        ],
        "order": [[ 1, 'asc' ]],
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
        searching:false,
    });
</script>