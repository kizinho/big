<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Main Page Title -->
    <link rel="icon" href="{{asset($settings['favicon']) }}">
    <link rel="shortcut icon" href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"   href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    @yield('title')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
  <!-- Bootstrap 4 css -->
  
   <link rel="stylesheet" href="{{ asset('assets/new/vendors/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/new/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/new/vendors/css/vendor.bundle.addons.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/new/css/style.css')}}">
 <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
 <style>
        .toast {
            opacity: 0.9!important;
        }
        :root {
            --wpcargo: #00A924;
        }
        .modal
        {
            position: fixed;
            z-index: 999;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background-color: Black;
            filter: alpha(opacity=60);
            opacity: 0.6;
            -moz-opacity: 0.8;
        }
        .mcenter
        {
            z-index: 1000;
            margin: 300px auto;
            padding: 10px;
            width: 130px;
            background-color: White;
            border-radius: 10px;
            filter: alpha(opacity=100);
            opacity: 1;
            -moz-opacity: 1;
        }
        .mcenter img
        {
            height: 100px;
            width: 100px;
        }
        </style>
</head>
<body style="">

   
        @yield('content')
          <div class="modal" style="display: none">
                <div class="mcenter">
                    <img src="{{asset('images/reload.gif')}}"  >
                </div>
            </div>
     
 <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Popper Js  -->
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap 4 Js  -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- OWL Carousel JS  -->
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- filterizr JS file -->
    <script src="{{ asset('assets/js/jquery.filterizr.js')}}"></script>
    <!-- Magnific Popup JS  -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Counter To JS  -->
    <script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
    <!--  WOW Js  -->
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <!-- My Custom Js  -->
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    

     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
     <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
       <script>
            $(".deleted").on("submit", function () {

                return confirm("Are you sure?");
            });
        </script>

        <script>
            $(".deleted-list").on("submit", function () {

                return confirm("Are you sure?");
            });
        </script>
        
@if(session()->has('message.level'))
<script type="text/javascript">
    swal({
        title: "{{ session('message.level') }}",
        html: true,
        text: "<span style='color:{{ session('message.color') }};font-size:20px;margin:10px'>{!! session('message.content') !!}",
        timer: 10000,
        type: "{{ session('message.level') }}",
         confirmButtonColor: "#0000cc"
    }).then((value) => {
        //location.reload();
    }).catch(swal.noop);
</script>
@endif
    @yield('script')
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6548d3b0-354e-4056-944a-0b6e6e35bd47";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>
