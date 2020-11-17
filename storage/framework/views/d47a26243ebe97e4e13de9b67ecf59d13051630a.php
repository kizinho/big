<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Register</title>
<meta  name="description" content="Register">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Register"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="<?php echo e(asset($settings['logo'])); ?>" alt="logo">
                        </div>
                        <h4>Register an Account</h4>



                        <!-- <h6 class="font-weight-light">Login you</h6> -->
                        <form id='register-user' class="pt-3">

                            <div class="">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control form-control-lg border-left-0" id="full_name" name="fullname" value=''>

                            </div>


                            <div class="">
                                <label for="username">Username</label>

                                <input type="text" class="form-control form-control-lg border-left-0" id="username" name="username" value=''>

                            </div>

                            <div class="">
                                <label for="password">Password</label>

                                <input type="password" class="form-control form-control-lg border-left-0" id="password" name="password" value=''>

                            </div>

                            <div class="">
                                <label for="password2">Retype Password</label>

                                <input type="password" class="form-control form-control-lg border-left-0" id="confirm_password" name="password2" value=''>

                            </div>

                            <div class="">
                                <label for="account1">Your Bitcoin Account</label>

                                <input type="text" class="form-control form-control-lg border-left-0"  size=30 id="bitcoin_address"  placeholder="1YourBitcoinAddressmwGAiHnxQWP8J2">

                            </div>


                            <div class="">
                                <label for="email">E-mail Address</label>

                                <input type="email" class="form-control form-control-lg border-left-0" id="email" name="email" value=''>

                            </div>

                            <div class="">
                                <label for="email2">Retype E-mail Address</label>

                                <input type="text" class="form-control form-control-lg border-left-0" id="confirm_email" name="email1" value=''>

                            </div>


                            <div class="">
                                <input type=checkbox class="form-check-input"  id="check2" name=agree onclick="if (this.checked)" >
                                <label>I agree with <span><a href="<?php echo e(url('terms-condition')); ?>">Terms and conditions</a></span></label>



                            </div>
                            <div class="my-3">
                                <input type=submit value="Register" class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn text-white">
                            </div>
                            <input type=hidden id="ref" value="<?php echo e($ref); ?>" class="form-control">
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="<?php echo e(url('login')); ?>" class="text-warning">Login</a> <br>


                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end"><?php echo e($settings['copy_right']); ?></p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>




<?php $__env->startSection('script'); ?>
<script>
    /*
     register
     */
    $('#register-user').submit(function (event) {
        event.preventDefault();
        var checkbox = document.getElementById("check2");
        if (checkbox.checked) {
        } else {
            toastr.warning("You have to agree with the Terms and Conditions!", {timeOut: 50000});
            return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".modal").show();
            },
            complete: function () {
                $(".modal").hide();
            }
        });
        jQuery.ajax({
            url: "<?php echo e(url('/sign-up')); ?>",
            type: 'POST',
            data: {
                full_name: jQuery('#full_name').val(),
                username: jQuery('#username').val(),
                email: jQuery('#email').val(),
                confirm_email: jQuery('#confirm_email').val(),
                password: jQuery('#password').val(),
                confirm_password: jQuery('#confirm_password').val(),
                bitcoin_address: jQuery('#bitcoin_address').val(),
                ref: jQuery('#ref').val()
            },
            success: function (data) {
                if (data.status === 401) {
                    jQuery.each(data.message, function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {
                            // window.location.href = "<?php echo e(url('/register')); ?>";
                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    return false;
                }
                if (data.status === 422) {
                    var message = data.message;
                    toastr.options.onHidden = function () {
                        //  window.location.href = "<?php echo e(url('/success')); ?>";
                    };
                    toastr.error(message, {timeOut: 50000});
                    return false;
                }
                if (data.status === 200) {
                    var message = data.message;
                    toastr.options.onHidden = function () {
                        window.location.href = "<?php echo e(url('/home')); ?>";
                    };
                    toastr.success(message, {timeOut: 50000});
                    return false;
                }
            }

        });
    });</script> 

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.applogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>