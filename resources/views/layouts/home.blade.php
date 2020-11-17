<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Main Page Title -->
    <link rel="icon" href="{{asset($settings['favicon']) }}">
    <link rel="shortcut icon" href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"   href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    @yield('title')
      <link rel="stylesheet" href="{{asset('assets/new/vendors/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/new/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('assets/new/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/new/css/style.css')}}">
   
 <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&amp;display=swap" rel="stylesheet">
    
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
        @include('layouts.navuser')
        @yield('content')
      
          <div class="modal" style="display: none">
                <div class="mcenter">
                    <img src="{{asset('images/reload.gif')}}"  >
                </div>
            </div>
        @include('layouts.footeruser')
  <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 <script src="{{ asset('assets/new/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ asset('assets/new/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('assets/new/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/new/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/new/js/misc.js')}}"></script>
  <script src="{{ asset('assets/new/js/settings.js')}}"></script>
  <script src="{{ asset('assets/new/js/todolist.js')}}"></script>


  
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        alert("URL successfully copied...");
    }
</script>
    <script>
    $(function(){

        $('#calc_plan').on('change', function(){
            var amount = $(this).find('option:selected').data('min');
            var percent = $(this).find('option:selected').data('percent');

            $('#calc_amount').val(amount);

            var profit = amount/100*percent;
            profit = profit.toFixed(2);
            $('#total_profit').html('$'+profit);

        });

        $('#calc_amount').on('change keyup', function(){
            var amount = parseFloat($(this).val());
            var max_amount = $('#calc_plan').find('option:selected').data('max');
            var percent = 0;
                        if($('#calc_plan').val() == 1){
                                if (amount >= 10 && amount <=300){
                    percent = 106;
                }
                                if (amount > 300 && amount <=500){
                    percent = 108;
                }
                                if (amount >= 501 && amount <=10000){
                    percent = 110;
                }
                if (amount > max_amount){
                    amount = max_amount;
                    $(this).val(amount);
                    percent = 110;
                }
                            }
                        if($('#calc_plan').val() == 2){
                                 if (amount >= 10 && amount <=300){
                    percent = 118;
                }
                                if (amount > 300 && amount <=500){
                    percent = 122;
                }
                                if (amount >= 501 && amount <=10000){
                    percent = 130;
                }
                if (amount > max_amount){
                    amount = max_amount;
                    $(this).val(amount);
                    percent = 130;
                }
                            }
                        if($('#calc_plan').val() == 3){
                                if (amount >= 100 && amount <=10000){
                    percent = 150;
                }
                if (amount > max_amount){
                    amount = max_amount;
                    $(this).val(amount);
                    percent = 150;
                }
                            }
                        if($('#calc_plan').val() == 4){
                                if (amount >= 100 && amount <=10000){
                    percent = 300;
                }
                if (amount > max_amount){
                    amount = max_amount;
                    $(this).val(amount);
                    percent = 300;
                }
                            }
                        if(amount > 0){
                var net_percent = percent-100;
                if(net_percent < 0){
                    net_percent = 0;
                }
                var profit = amount/100*percent;
                profit = profit.toFixed(2);
                $('#total_profit').html('$'+profit);
            }


        });
});
</script>

 
    

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
</body>
</html>
