<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; PLAN</title>
<meta  name="description" content="PLAN">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - PLAN"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="page" class="header-breadcrumb">


    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Plans</h1>

                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Plans</li>
                </ul>
            </div>

        </div>

    </div>
</section>
<!--==================================================================== 
           End Header 
=====================================================================-->



<!--==================================================================== 
          Start Section About Us One
=====================================================================-->
<section id="price" class="price pt-130">
    <div class="container">
        <div class="row">



            <div class="col-md-8 offset-md-2">
                <div class="section-title text-center">
                    <h2>Our Trading Plans </h2>
                    <h3> Choose your preferred Plan </h3>
                    <div class="line-title"></div>
                    <p>Click trade now to signup and invest let our experts manage your account with good returns daily.</p>
                </div>      
            </div>






            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-3">
                <div class="price-item <?php if($plan->featured == true): ?> price-two <?php endif; ?> ">
                    <div class="header-price">
                        <h4><?php echo e($plan->name); ?></h4>
                        <div class="value">
                            <h3><?php echo e(number_format($plan->percentage,0)); ?><span>%</span></h3>
                            <span class="per">/ <?php echo e($plan->compound->name); ?></span>
                        </div>                      
                    </div>

                    <div class="features">
                        <ul>
                            <li><span class="typcn typcn-tick-outline"></span>Minimum Deposit: $<?php echo e($plan->min); ?> </li>
                            <li><span class="typcn typcn-tick-outline"></span>Maximum Deposit: <?php echo e($plan->max); ?></li>
                            <li><span class="typcn typcn-tick-outline"></span>Automatic Deposit</li>
                            <li><span class="typcn typcn-tick-outline"></span>Automatic Withdrawal</li>
                            <li><span class="typcn typcn-tick-outline"></span>Referal <?php echo e($plan->ref); ?>%</li>
                            <li><span class="typcn typcn-tick-outline"></span>24x7 Support</li>                          
                        </ul>   
                    </div>
                    <div class="order">
                        <a href="<?php echo e(url('register')); ?>" class="btn-one"><span>Trade now</span></a>
                    </div>

                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\naijacrawl soft\new_ik_btc\greengold\resources\views/pages/plan.blade.php ENDPATH**/ ?>