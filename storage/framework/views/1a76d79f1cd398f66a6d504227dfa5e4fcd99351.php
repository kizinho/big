<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" />
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
 <!-- Main Page Title -->
    <link rel="icon" href="<?php echo e(asset($settings['favicon'])); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset($settings['favicon'])); ?>">
    <link rel="apple-touch-icon"   href="<?php echo e(asset($settings['favicon'])); ?>">
    <link rel="apple-touch-icon"  href="<?php echo e(asset($settings['favicon'])); ?>">
    <link rel="apple-touch-icon"  href="<?php echo e(asset($settings['favicon'])); ?>">
    <link rel="apple-touch-icon"  href="<?php echo e(asset($settings['favicon'])); ?>">
    <?php echo $__env->yieldContent('title'); ?>
    <!-- Google Font -->
  <!-- Bootstrap 4 css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/all.css')); ?>">
    <!-- Animate css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/animate.css')); ?>">
    <!-- Owl carousel css  -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.theme.default.min.css')); ?>">
        <!-- Magnific css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/magnific-popup.css')); ?>">
    <!-- IconFont linea -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/linea-basic.css')); ?>">
    <!-- IconFont pe-icon-7-stroke -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pe-icon-7-stroke.css')); ?>">
    <!-- Main style css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/responsive.css')); ?>"> 
    
 <link href="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.css')); ?>" rel="stylesheet" />
 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

</head>
<body style="">

    <!--page wrapper start-->

    <div class="upper-bar classic-upper-bar">
    <div class="container">
        <div class="row">     
           
            <!-- Item Contact US Bar -->
            <div class="col-md-9">
                <div class="contact-us-bar">
                    <a href="#">
                        <span><i class="fas fa-envelope"></i></span>  <?php echo e($settings['site_email']); ?>

                    </a>
                    
                    <a href="#">
                        <span><i class="fas fa-phone"></i></span> <?php echo e($settings['site_phone']); ?>

                    </a>
                    
                    <a href="#">
                        <span><i class="fas fa-clock"></i></span> Online 24/7
                    </a>
                    
                </div>
            </div>
            
            
            
            
            
        </div>
    </div>
</div>

        <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div style="height:62px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:62px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;"><div style="height:40px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=" width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>
        <?php echo $__env->yieldContent('content'); ?>
          <div class="modal" style="display: none">
                <div class="mcenter">
                    <img src="<?php echo e(asset('images/reload.gif')); ?>"  >
                </div>
            </div>
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
    <!-- Popper Js  -->
    <script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
    <!-- Bootstrap 4 Js  -->
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <!-- OWL Carousel JS  -->
    <script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
    <!-- filterizr JS file -->
    <script src="<?php echo e(asset('assets/js/jquery.filterizr.js')); ?>"></script>
    <!-- Magnific Popup JS  -->
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <!-- Counter To JS  -->
    <script src="<?php echo e(asset('assets/js/jquery.countTo.js')); ?>"></script>
    <!--  WOW Js  -->
    <script src="<?php echo e(asset('assets/js/wow.min.js')); ?>"></script>
    <!-- My Custom Js  -->
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    

     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
     <script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
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
        
<?php if(session()->has('message.level')): ?>
<script type="text/javascript">
    swal({
        title: "<?php echo e(session('message.level')); ?>",
        html: true,
        text: "<span style='color:<?php echo e(session('message.color')); ?>;font-size:20px;margin:10px'><?php echo session('message.content'); ?>",
        timer: 10000,
        type: "<?php echo e(session('message.level')); ?>",
         confirmButtonColor: "#0000cc"
    }).then((value) => {
        //location.reload();
    }).catch(swal.noop);
</script>
<?php endif; ?>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH /home/capildee/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>