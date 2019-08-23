<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Title -->
  <title>Dairycooperrative Khonkaen</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('template/img/core-img/favicon.ico')}}">
  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="{{asset('template/style.css')}}">
  <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/font-awesome/css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{asset('/datatables/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/sweetAlert.css') }}">

  <script src="{{  asset('js/sweetAlert.min.js') }}"></script>
  <script src="{{asset('/jquery/jquery.min.js')}}"></script>
  
  

</head>
{{-- alert box --}}
<?php
    $save = Session::get('save');
    $delete = Session::get('delete');
    Session::forget('save');
    Session::forget('delete');
?>
<script>
    $(document).ready(function(){
        var save = "{{ $save }}";
        var delete_s = "{{ $delete }}";
        if(save == 'success'){
            swal("สำเร็จ!", "บันทึกข้อมูลสำเร็จ!", "success");
        }
        if(delete_s == 'success'){
            swal("สำเร็จ!", "ลบข้อมูลสำเร็จ!", "success");
        }
    });
</script>
<body>
  <!-- Preloader -->
  <div class="preloader d-flex align-items-center justify-content-center">
    <div class="spinner"></div>
  </div>

  <!-- ##### Header Area Start ##### -->
  <header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Top Header Content -->
              <div class="top-header-meta">
                                  
              </div>
              <!-- Top Header Content -->
              <div class="top-header-meta text-right">
                <a href="{{url('#')}}" data-toggle="tooltip" data-placement="bottom" title="Email: kkc_cop@hotmail.co.th"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: kkc_cop@hotmail.co.th</span></a>
                <a href="{{url('#')}}" data-toggle="tooltip" data-placement="bottom" title="+81 954 0738"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +81 954 0738</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar Area -->
    <div class="famie-main-menu">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Menu -->
          <nav class="classy-navbar justify-content-between" id="famieNav">
            <!-- Nav Brand -->
            <a href="{{url('home')}}" class="nav-brand"><img src="{{asset('img/coop.jpg')}}"class="fa fa-align-left" aria-hidden="true" alt="" width="200" height="200"  ></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
              <!-- Close Button -->
              <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
              </div>
              <!-- Navbar Start -->
              <div class="classynav"> 
                <ul>
                  <li><a href="{{url('#')}}">จัดการข้อมูลพื้นฐาน</a>
                    <ul class="dropdown">
                      <li><a href="{{url('dataem')}}">ข้อมูลผู้ใช้งาน</a></li>
                      <li><a href="{{url('datamem')}}">ข้อมูลสมาชิก</a></li>
                      <li><a href="{{url('datamilk')}}">ข้อมูลน้ำนมดิบ</a></li>
                      <li><a href="{{url('datapro')}}">ข้อมูลอุปกรณ์</a></li>
                      <li><a href="{{url('dataagent')}}">ข้อมูลบริษัทคู่ค้า</a></li>
                      <li><a href="{{url('datacoop')}}">ข้อมูลสหกรณ์</a></li>
                      
                    </ul>
                  </li>
                  
                  <li><a href="{{url('buymilk2')}}">รับซื้อน้ำนมดิบ</a></li>
                  <li><a href="{{url('sellmilk2')}}">ขายน้ำนมดิบ</a></li>
                  <li><a href="{{url('oder')}}">สั่งซื้ออุปกรณ์</a></li>
                  <li><a href="{{url('#')}}">รับอุปกรณ์</a>
                    <ul class="dropdown">
                      <li><a href="{{url('receivedrug')}}">ยารักษาโรค</a></li>
                      <li><a href="{{url('receivefood')}}">อาหารสัตว์</a></li>
                      <li><a href="{{url('receivetool')}}">อุปกรณ์รีดนม</a></li>
                    </ul>
                  </li>
                  <li><a href="{{url('sellpro')}}">ขายอุปกรณ์</a></li>
                  <li><a href="{{url('paymilk')}}">ชำระเงินนมสมาชิก</a></li>
                  <li><a href="{{url('receivemoney')}}">รับชำระเงินค่าน้ำนมดิบ</a></li>
                </ul>
                <div ><i class="fa fa-user" ><a href="{{url('logout')}}">ออกจากระบบ</a></i></div>

          </nav>

          <!-- Search Form -->
          <div class="search-form">
            <form action="#" method="get">
              <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
              <button type="submit" class="d-none"></button>
            </form>
            <!-- Close Icon -->
            <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- ##### Header Area End ##### -->

 
  

  <!-- ##### All Javascript Files ##### -->
  <!-- jquery 2.2.4  -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <!-- Popper js -->
  <script src="js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- Owl Carousel js -->
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <!-- Classynav -->
  <script src="{{asset('js/classynav.js')}}"></script>
  <!-- Wow js -->
  <script src="{{asset('js/wow.min.js')}}"></script>
  <!-- Sticky js -->
  <script src="{{asset('js/jquery.sticky.js')}}"></script>
  <!-- Magnific Popup js -->
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Scrollup js -->
  <script src="{{asset('js/jquery.scrollup.min.js')}}"></script>
  <!-- Jarallax js -->
  <script src="{{asset('js/jarallax.min.js')}}"></script>
  <!-- Jarallax Video js -->
  <script src="{{asset('js/jarallax-video.min.js')}}"></script>
  <!-- Active js -->
  <script src="{{asset('js/active.js')}}"></script>

  @yield("head")

  <body  >
      @yield("body")
