<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; DEPOSIT CONFIRMATION</title>
<meta  name="description" content="DEPOSIT CONFIRMATION">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - DEPOSIT CONFIRMATION"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">


        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Deposit Confirmation:</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Plan</td>
                                        <td><?php echo e($plan->name); ?></td>                          
                                    </tr>
                                    <tr>
                                        <td>Profit</td>
                                        <td><?php echo e($plan->percentage); ?>%  for <?php echo e($plan->compound->name); ?> </td>                          
                                    </tr>
                                    <tr>
                                        <td>Principal Return:</td>
                                        <td>  <?php if($fund == 'fund'): ?>
                                            Not available
                                            <?php else: ?>
                                            Yes
                                            <?php endif; ?></td>                          
                                    </tr>

                                    <tr>
                                        <td>Credit Amount:</td>
                                        <td> $<?php echo e($invest->amount,2); ?> </td>                          
                                    </tr>
                                    <tr>
                                        <td>Deposit Fee:</td>
                                        <td>$<?php echo e(number_format($invest->deposit_investment_charge,2)); ?></td>                          
                                    </tr>
                                    <tr>
                                        <td>Debit Amount:</td>
                                        <td>$<?php echo e(number_format($invest->amount+$invest->deposit_investment_charge,2)); ?></td>                          
                                    </tr> 
                                    <tr>
                                        <th><?php echo e($name); ?> Debit Amount:</th>
                                        <td><?php echo e(number_format(floatval($amount_convert) , 8, '.', '')); ?></td>
                                    </tr>   

                                    <tr>
                                        <td>Scan to Pay</th>
                                        <th>
                                            <?php if($fund == 'fund'): ?>
                                            <img id=coin_payment_image src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo e($sendaddress); ?>?amount=<?php echo e(number_format(floatval($amount_convert) , 8, '.', '')); ?>"/></td>
                                            <?php endif; ?>
                                            </td>
                                    </tr> 
                                </tbody>                      
                            </table>
                            <?php if($fund == 'fund'): ?>
                            <div class="btc_form btc1" id=btc_form>Please send exactly <b><?php echo e(number_format(floatval($amount_convert) , 8, '.', '')); ?> <?php echo e($name); ?></b> to <i>
                                    <a href="<?php echo e($sendaddress); ?>?amount=<?php echo e(number_format(floatval($amount_convert) , 8, '.', '')); ?>&message=Deposit+to+Bitfury"><?php echo e($coin->address); ?></a></i><br></div>
                            <div id=placeforstatus>
                                <strong>Order status:</strong> <span class="text-danger">Waiting for payment</span>
                            </div>
                            <?php else: ?>
                            <div id=placeforstatus>
                                <strong >Order status:</strong> <span class="text-success">Completed</span>
                            </div> 
                            <?php endif; ?>
                        </div>

                    </div>




                    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/user/deposit-fund.blade.php ENDPATH**/ ?>