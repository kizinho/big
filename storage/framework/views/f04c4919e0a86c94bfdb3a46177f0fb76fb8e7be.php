<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Deposit List</title>
<meta  name="description" content="Deposit List">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Deposit List"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Your deposits
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Total: $<?php echo e(number_format($total_deposit,2)); ?></li>                
              </ol>
            </nav>
          </div>
          <div class="row">
                  

                               <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <div class="table-responsive">
                            <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #212529;"><tr><td class=item>
                                        <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #212529;">
                                            <tr>
                                                <td colspan=3 align=center><b><?php echo e($plan->name); ?></b></td>
                                            </tr><tr>
                                                <td class=inheader>Plan</td>
                                                <td class=inheader width=200>Amount Spent ($)</td>
                                                <td class=inheader width=100 nowrap><nobr> Profit (%)</nobr></td>
                                </tr>
                                <tr>
                                    <td class=item><?php echo e($plan->name); ?></td>
                                    <td class=item align=right>$<?php echo e($plan->min); ?> -  $<?php echo e($plan->max); ?></td>
                                    <td class=item align=right><?php echo e($plan->percentage); ?></td>
                                </tr>
                            </table>
                            <br>
                            <table cellspacing=1 cellpadding=2 border=0 width=100%><tr>
                                    <?php if($plan->investmentAuth->isEmpty()): ?>
                                    <?php else: ?>
                                    <td colspan=4 class=inheader style="text-align:left">Your deposits:</td>
                                    <?php endif; ?>
                                </tr>
                                <?php if($plan->investmentAuth->isEmpty()): ?>
                                <?php else: ?>
                                <tr>
                                    <td class=inheader>Date</td>
                                    <td class=inheader>Amount</td>
                                </tr>
                                <?php endif; ?>
                                <?php $__empty_1 = true; $__currentLoopData = $plan->investmentAuth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                               <tr>
                                    <td align=center class=item><b><?php echo e(date('F d, Y', strtotime($invest->created_at))); ?> <?php echo e(date('g:i A', strtotime($invest->created_at))); ?></b>
                                        <br>
                                        <?php if(empty($invest->due_pay)): ?>
                                        Deposit Not Started Running
                                        <?php else: ?>
                                        Expire in <?php echo e($invest->due_pay->diffForHumans()); ?>


                                        <?php endif; ?>
											<hr>
                                    </td>
                                    <td align=center class=item><b>
                                            <?php if($invest->plan->name == 'PLAN 6'): ?>
                                            <?php echo e(number_format($invest->amount, 2)); ?> BTC <img src="<?php echo e(asset($invest->coin->photo)); ?>" align=absmiddle hspace=1 height=17></b> 
                                        <?php else: ?>
                                        $<?php echo e(number_format($invest->amount, 2)); ?> <img src="<?php echo e(asset($invest->coin->photo)); ?>" align=absmiddle hspace=1 height=17></b>
										<br/><br/><hr>
									</td>


                                    <?php endif; ?>
								
                                </tr>
                               
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <b> No deposits for this plan</b>

                                <?php endif; ?>
                            </table>
                            <?php if($plan->investmentAuth->isEmpty()): ?>
                            <?php else: ?>
                            <table cellspacing=0 cellpadding=1 border=0>
                                <tr><td>Deposited Total:</td><td><b>
                                            <?php if($plan->name == 'PLAN 6'): ?>
                                            <?php echo e(number_format($plan->investmentAuth->sum('amount'), 2)); ?> BTC
                                            <?php else: ?>
                                            $<?php echo e(number_format($plan->investmentAuth->sum('amount'), 2)); ?>



                                            <?php endif; ?>

                                        </b></td></tr>
<!--                                <tr><td>Profit Today:</td><td><b>$0.00</b></td></tr>-->
                                <tr><td>Total Profit:</td><td><b>

                                            $<?php echo e(number_format($plan->investmentAuth->sum('earn'), 2)); ?>

                                        </b></td></tr>
                            </table>
                            <?php endif; ?>
                            <br>
                            </td></tr></table>

                            <br>



                            <br>
                               </div>


                    </div>
                </div>
                                       </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              
              
              
                                        
          </div>


                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/user/deposit_list.blade.php ENDPATH**/ ?>