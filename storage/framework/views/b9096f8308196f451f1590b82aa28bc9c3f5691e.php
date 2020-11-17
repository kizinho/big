<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Manage Withdraw</title>
<meta  name="description" content="Manage Withdraw">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Manage Withdraw"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

 <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Withdraws</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>

                            <form  class="form-group"  method=get name=opts action="<?php echo e(route('manage-withdraw')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <td>
                                    <select name=type class="inpts form-control" onchange="document.opts.submit();">
                                        <option value="" <?php if(empty($type)): ?>selected <?php endif; ?>>All Withdraw</option>
                                        <option value="completed" <?php if($type == 'completed'): ?>selected <?php endif; ?>>Completed Withdraw</option>
                                        <option value="pending" <?php if($type == 'pending'): ?>selected <?php endif; ?>>Pending Withdraw</option>

                                    </select>
                            </form>


                            <div class="clearfix"></div>
                            <br/>
                            <div class="">

                                <!-- right column -->
                                <div class="">
                                    <!-- general form elements disabled -->
                                    <div class="card card-warning">

                                        <!-- /.card-header -->
                                        <div class="card-body" style="overflow: auto!important">

                                            <table id="example5" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#txt</th>
                                                        <th>User</th>
                                                        <th>Coin</th>
                                                        <th>Amount</th>
                                                        <th>Charge</th>
                                                        <th>Amount to Pay</th>
                                                        <th>Address</th>
                                                        <th>Withdraw From</th>
                                                        <th>Withdraw Date</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($withdraw->transaction_id); ?></td>
                                                        <td><?php echo e($withdraw->user->username); ?></td>
                                                        <td> <img src="<?php echo e(asset($withdraw->coin->photo)); ?>" align=absmiddle hspace=1 height=17> <?php echo e($withdraw->coin->name); ?></td>
                                                        <td>$<?php echo e(number_format($withdraw->amount,2)); ?></td>
                                                        <td>$<?php echo e(number_format($withdraw->withdraw_charge,2)); ?></td>
                                                        <td>$<?php echo e(number_format($withdraw->amount - $withdraw->withdraw_charge,2)); ?></td>
                                                        <td>
                                                            <?php $__currentLoopData = $withdraw->user->coin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ucoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($withdraw->coin_id == $ucoin->coin_id): ?>
                                                               <?php echo e($ucoin->address); ?>

                                                               <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         
                                                        </td>
                                                        <td><?php echo e($withdraw->withdraw_from); ?></td>
                                                        <td><?php echo e(date('F d, Y', strtotime($withdraw->created_at))); ?></td>
                                                        <td style='white-space: nowrap'>
                                                            <?php if($withdraw->status == true): ?>
                                                            <span class=" badge-success" style="padding:1px 9px 2px;-webkit-border-radius: 9px; -moz-border-radius: 9px;
                                                                  border-radius: 9px">Confirmed</span>
                                                                  <?php else: ?>
                                                                
                                                           <?php endif; ?>
                                                                 <?php if($withdraw->status_withdraw == false): ?>
                                                            <span class="badge-danger" style="padding:1px 9px 2px;-webkit-border-radius: 9px; -moz-border-radius: 9px;
                                                                  border-radius: 9px" >Awaiting Payment</span>

                                                            <form  class="deleted" style="display: inline-block!important"  role="form" method="POST"
                                                                   action="<?php echo e(route('reject-withdraw',['id'=>$withdraw->id])); ?>" >
                                                                <?php echo csrf_field(); ?>   
                                                                <button type="submit"class="">
                                                                    <i class="fa fa-ban text-danger"></i> Reject
                                                                </button>
                                                            </form>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td style='white-space: nowrap'>

                                                            <form  class="deleted" style="display: inline-block!important"  role="form" method="POST"
                                                                   action="<?php echo e(route('delete-withdraw',['id'=>$withdraw->id])); ?>" >
                                                                <?php echo csrf_field(); ?>   
                                                                <button type="submit"class="">
                                                                    <i class="fa fa-trash text-danger"></i>
                                                                </button>
                                                            </form>
                                                            <?php if($withdraw->status_withdraw == false): ?>
                                                            <form  class="deleted" style="display: inline-block!important"  role="form" method="POST"
                                                                   action="<?php echo e(route('confirm-withdraw',['id'=>$withdraw->id])); ?>" >
                                                                <?php echo csrf_field(); ?>   
                                                                <button type="submit"class="">
                                                                    <i class="fa fa-check text-success"></i> Confirm Withdraw
                                                                </button>
                                                            </form>
                                                            <?php endif; ?>
                                                            <?php if($withdraw->confirm == false): ?>

                                                            <span class=" badge-danger" style="padding:1px 9px 2px;-webkit-border-radius: 9px; -moz-border-radius: 9px;
                                                                  border-radius: 9px">Invalid Withdraw</span>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>


                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <div class="text-center ">
                                                    <h5 class="grey-text">No <?php echo e($type); ?> Withdraws Yet.</h5>
                                                    <img src="<?php echo e(asset('images/empty.png')); ?>" style="width: 80px;height: 80px">
                                                </div>

                                                <?php endif; ?>
                                                <th>#txt</th>
                                                <th>User</th>
                                                <th>Coin</th>
                                                <th>Amount</th>
                                                <th>Charge</th>
                                                <th>Amount to Pay</th>
                                                  <th>Address</th>
                                                <th>Withdraw From</th>
                                                <th>Withdraw Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!--/.col (right) -->

                            </div>
                </div>
            
                    </div>
                </div>
                   
                        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/admin/withdraw/index.blade.php ENDPATH**/ ?>