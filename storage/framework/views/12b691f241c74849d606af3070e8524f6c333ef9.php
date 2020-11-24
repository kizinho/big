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
        	<iframe src="https://www.exchangerates.org.uk/widget/ER-LRTICKER.php?w=auto&amp;s=1&amp;mc=GBP&amp;mbg=FFFFFF&amp;bs=no&amp;bc=000044&amp;f=helvetica&amp;fs=11px&amp;fc=000044&amp;lc=19335C&amp;lhc=faa31c&amp;vc=FE9A00&amp;vcu=008000&amp;vcd=FF0000&amp;" width="100%" height="30" frameborder="0" scrolling="no" marginwidth="0" marginheight="0"></iframe>

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
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6548d3b0-354e-4056-944a-0b6e6e35bd47";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\naijacrawl soft\new_ik_btc\greengold\resources\views/layouts/app.blade.php ENDPATH**/ ?>