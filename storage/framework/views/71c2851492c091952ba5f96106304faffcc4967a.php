<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Banner</title>
<meta  name="description" content="Banner">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Banner"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/banners.js')); ?>"></script>

    <div class="main-panel">        
        <div class="content-wrapper">

            <div class="card">
              <div class="card-body">


                <div class="col-md-12"><h6>SELECT PREFERRED SIZE</h6></div>

                <div class="col-md-12">
                    <div class="template-demo banner-container">
                        <button type="button" class="tabs active btn btn-primary btn-fw" id="banner125x125">125x125</button>
                        <button type="button" class="tabs btn btn-secondary btn-fw" id="banner468x60">468x60</button>
                        <button type="button" class="tabs btn btn-success btn-fw" id="banner728x90">728x90</button>          
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="banner-show">
                       
                    </div>
                </div>
                
                <br/>
                
                <hr style="border-color: rgba(255, 255, 255, 0.3)" />
                <br/>
                    <div class="my_link clearfix banner" style="background:#846653;">
                        <h6 class="link">
                            <textarea id="banners_link" class="full-width zero-padding" style="background: #846653;color: #fff;width:100%;text-align:center" readonly>
                                <a href="<?php echo e(url('register')); ?>?ref=<?php echo e(Auth::user()->username); ?>">
                              </a>
                            </textarea>
                        </h6>
                        <form>
                            <input id="username" type="hidden" value="<?php echo e(Auth::user()->username); ?>">
                            <input id="siteURL" type="hidden" value="<?php echo e(url('register')); ?>?ref=<?php echo e(Auth::user()->username); ?>">
                        </form>
                    </div>
                    <div class="main-link-holder">
                        <button type="button" class="btn btn-warning btn-sm text-white" onclick="copyToClipboard('#banners_link')">COPY CODE</button>
                    </div>


                </div>
            </div>
                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/user/referallinks.blade.php ENDPATH**/ ?>