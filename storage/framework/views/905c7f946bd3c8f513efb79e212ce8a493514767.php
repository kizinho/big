<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; WITHDRAWAL</title>
<meta  name="description" content="WITHDRAWAL">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - WITHDRAWAL"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <div class="main-panel">
          <div class="content-wrapper">



          
            <div class="col-lg-12">
              















          

            

            </div>

            <div class="grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Withdrawal</h4>

                            <form  class="form-group"  method="POST" action="<?php echo e(route('withdraw-fund')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="withdraw" value="<?php echo e($withdraw->id); ?>">

                                <table cellspacing="0" cellpadding="2" border="0" class="form deposit_confirm">
                                    <tbody><tr>
                                            <th>Payment System:</th>
                                            <td><?php echo e(ucfirst($name_full)); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Account:</th>
                                            <td><?php echo e($address); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Debit Amount:</th>
                                            <td>$<?php echo e(number_format($withdraw->total_amount,2)); ?></td>
                                        </tr>

                                        <tr>
                                            <th>Withdrawal Fee:</th>
                                            <td>
                                                $<?php echo e(number_format($withdraw->withdraw_charge,2)); ?>

                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Credit Amount:</th>
                                            <td>$<?php echo e(number_format($withdraw->amount - $withdraw->withdraw_charge,2)); ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo e($name); ?> Amount:</th>
                                            <td><?php echo e(number_format(floatval($amount_convert) , 8, '.', '')); ?></td>
                                        </tr>


                                        <tr>
                                            <th>Note:</th>
                                            <td><?php echo e($withdraw->comment); ?></td>
                                        </tr>
                                        <?php if($withdraw->confirm == false): ?>
                                        <tr>
                                            <td colspan="2"><input type="submit" value="Confirm" class="sbmt"></td>
                                        </tr>
                                        <?php else: ?>
                                    <td class="text-success" colspan="2">Confirmed</td>
                                    <?php endif; ?>

                                    </tbody></table>
                            </form>
                        </div>


                    </div>
                </div>
                </div>
     
                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/user/withdraw-fund.blade.php ENDPATH**/ ?>