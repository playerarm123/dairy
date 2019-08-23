<script>
    // การส่งและรับข้อมูลโดยใช้ ajx

        // แบบ GET
        $.ajax({
            type: "GET",
            url: "{{url('/Search_Order')}}",
            success:function(data){
                // สิ่งที่อยากให้ทำหลังจากทำงานเสร็จ
            }
        })

        // แบบ POST
        $.ajax({
            type: "POST",
            url : "{{ url('ลิ้งที่จะส่งคำร้องไป') }}",
            data{
                id: "ss",
                name: "ss",
                _token: "{{ csrf_token() }}"
            },
            async:true,
            success:function(data){
                // 
            }
        });
</script>