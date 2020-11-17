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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
  <!-- Bootstrap 4 css -->
  
   <link rel="stylesheet" href="<?php echo e(asset('assets/new/vendors/iconfonts/font-awesome/css/all.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/new/vendors/css/vendor.bundle.base.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/new/vendors/css/vendor.bundle.addons.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/new/css/style.css')); ?>">
 <link href="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.css')); ?>" rel="stylesheet" />
 
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

   
        <?php echo $__env->yieldContent('content'); ?>
          <div class="modal" style="display: none">
                <div class="mcenter">
                    <img src="<?php echo e(asset('images/reload.gif')); ?>"  >
                </div>
            </div>
     
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
<?php /**PATH C:\xampp\htdocs\naijacrawl soft\new_ik_btc\greengold\resources\views/layouts/applogin.blade.php ENDPATH**/ ?>