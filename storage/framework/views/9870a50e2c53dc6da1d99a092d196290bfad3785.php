<footer class="footer">
    <div class="overlay"></div>
    <div class="container">
        <div class="row footer-row">
            <div class="col-sm-6 col-lg-3 mb-30">

                <div class="footer-widget">
                    <div class="footer-logo">
                        <img src="<?php echo e(asset($settings['logo'])); ?>" alt="logo">
                    </div>

                    <p class="mb-30">CapitalFlow's main task is to extract the largest possible profit from exchange operations at crypto-currency/Forex trading markets. 
					We guarantee a stable inflow of profit, as we are always searching for new, more appealing and profitable operation methods.</p>



                </div>
            </div>



            <div class="col-sm-6 col-lg-3 mb-30">
                <div class="footer-widget">
                    <h4>Contact Us</h4>

                    <div class="line-footer"></div>

                    <div class="contact-info">

                        <div class="single-contact">
                            <span><i class="fa fa-phone"></i></span>
                            <div class="info-cont">
                                <p> <?php echo e($settings['site_phone']); ?></p>       

                            </div>
                        </div>

                        <div class="single-contact">
                            <span><i class="fa fa-envelope"></i></span>
                            <div class="info-cont">
                                <p><?php echo e($settings['site_email']); ?></p>                                    
                            </div>
                        </div>

                        <div class="single-contact mb-0">
                            <span><i class="fa fa-location-arrow"></i></span>
                            <div class="info-cont">
                                <p><?php echo e($settings['address']); ?></p>                                    
                            </div>
                        </div>



                    </div>



                </div>
            </div>


            <div class="col-sm-6 col-lg-3 mb-30">
                <div class="footer-widget mb-0">
                    <h4>Company</h4>
                    <div class="line-footer"></div>
                    <div class="row">
                        <div class="col">
                            <ul class="footer-link mb-0">
                                <li>
                                    <a href="<?php echo e(url('/')); ?>">
                                        <span><i class="fas fa-angle-right"></i></span> Home
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('about-us')); ?>">
                                        <span><i class="fas fa-angle-right"></i></span> About Us
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('faq')); ?>">
                                        <span><i class="fas fa-angle-right"></i></span> FAQ
                                    </a>
                                </li>

                                <!--                                    <li>
                                                                        <a href="img/license/incorporation.pdf" target="_blank">
                                                                            <span><i class="fas fa-angle-right"></i></span> UK Certificate
                                                                        </a>
                                                                    </li>-->

                                <!--                                    <li>
                                                                        <a href="img/license/cert-of-incopration.pdf" target="_blank">
                                                                            <span><i class="fas fa-angle-right"></i></span> VFSC License
                                                                        </a>
                                                                    </li>-->
                                <!--                                    <li>
                                                                        <a href="assets/WHITE-PAPER%20-CRYPTOTRADE-GROUP-LTD.pdf" target="_blank">
                                                                            <span><i class="fas fa-angle-right"></i></span> White Paper
                                                                        </a>
                                                                    </li>-->
                            </ul>
                        </div>




                    </div>
                </div>
            </div>




            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <h4>Other Links</h4>
                    <div class="line-footer"></div>

                    <div class="row">
                        <div class="col">
                            <ul class="footer-link mb-0">
                                <li>
                                    <a href="<?php echo e(url('plan')); ?>">
                                        <span><i class="fas fa-angle-right"></i></span> Trading Plans
                                    </a>
                                </li>


                                <li>
                                    <a href="<?php echo e(url('support')); ?>">
                                        <span><i class="fas fa-angle-right"></i></span> Support
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('terms-condition')); ?>">
                                        <span><i class="fas fa-angle-right"></i></span> Terms of Use
                                    </a>
                                </li>
                                <?php if(auth()->guard()->check()): ?>
                                <li>
                                    <span class="menu"> <a class="nav-link" href="<?php echo e(url('home')); ?>"> Account
                                        </a></span>
                                </li>
                                <li class=""><span class="menu">
                                        <a class="nav-link " href="<?php echo e(route('logout')); ?>"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            Logout</a></span>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                                <?php else: ?>
                                <li>
                                    <a href="<?php echo e(url('login')); ?>">
                                        <span><i class="fas fa-angle-right"></i></span> Login
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('register')); ?>">
                                        <span><i class="fas fa-angle-right"></i></span> Register
                                    </a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a href="" target="_blank">
                                        <i class="fab fa-telegram" style="color: #0088cc; font-size: 30px;"></i> TELEGRAM CHANNE
                                    </a>

                                    <a href="" target="_blank">
                                        <i class="fab fa-whatsapp" style="color: #25D366; font-size: 30px;"></i> WHATSAPP GROUP
                                    </a>
									<a href="https://www.facebook.com/groups/649519328548810/?ref=share" target="_blank">
                                        <i class="fab fa-facebook" style="color: #0000ff; font-size: 30px;"></i> FACEBOOK GROUP
                                    </a>
                                </li>
                            </ul>
                        </div>



                    </div>
                </div>





            </div>

        </div>

        <div class="footer-bar">
            <div class="container">
                <div class="footer-copy">

                    <!-- Copyright By Me NourEgy  -->
                    <div class="copyright">
                        &copy; <?php echo e($settings['copy_right']); ?>                
                    </div>


                </div>   

            </div> 

        </div>


</footer>
<!--==================================================================== 
          End Footer
=====================================================================-->   
<!-- Scroll To Top -->
<div class="scroll-up">
    <i class="fas fa-angle-up"></i>
</div> 

<?php $__env->startSection('script'); ?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ec44dc18ee2956d73a2bcea/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script>
    /*
     login
     */
    $('#sub').submit(function (event) {
        event.preventDefault();
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
            url: "<?php echo e(url('/sub')); ?>",
            type: 'POST',
            data: {
                email: jQuery('#email').val()


            },
            success: function (data) {
                if (data.status === 401) {
                    jQuery.each(data.message, function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {
                            //  window.location.href = "<?php echo e(url('/register')); ?>";
                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    return false;
                }
                if (data.status === 200) {
                    var message = data.message;

                    toastr.success(message, {timeOut: 50000});
                    $("#contact")[0].reset();
                    return false;
                }
            }

        });
    });

</script> 
<?php $__env->stopSection(); ?><?php /**PATH /home/capildee/public_html/resources/views/layouts/footer.blade.php ENDPATH**/ ?>