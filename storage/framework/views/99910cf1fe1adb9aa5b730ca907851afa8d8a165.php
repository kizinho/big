<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Manage Deposit</title>
<meta  name="description" content="Manage Deposit">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Manage Deposit"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

 <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Deposits</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>

                            <form  class="form-group"  method=get name=opts action="<?php echo e(route('manage-deposit')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <td>
                                    <select name=type class="inpts form-control" onchange="document.opts.submit();">
                                        <option value="" <?php if(empty($type)): ?>selected <?php endif; ?>>All Deposit</option>
                                        <option value="running" <?php if($type == 'running'): ?>selected <?php endif; ?>>Running Deposit/Investment</option>
                                        <option value="completed" <?php if($type == 'completed'): ?>selected <?php endif; ?>>Completed Deposit/Investment</option>
                                        <option value="confirmed" <?php if($type == 'confirmed'): ?>selected <?php endif; ?>>Confirmed Deposit</option>
                                        <option value="pending" <?php if($type == 'pending'): ?>selected <?php endif; ?>>Pending Deposit</option>

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
                                                        <th>Plan</th>
                                                        <th>Coin</th>
                                                        <th>Amount</th>
                                                        <th>Profit</th>
                                                        <th>Date</th>
                                                        <th>Date Deposited</th>
                                                        <th>Deposit Status</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($deposit->transaction_id); ?></td>
                                                        <td><?php echo e($deposit->user->username); ?></td>
                                                        <td><?php echo e($deposit->plan->name); ?></td>
                                                        <td> <img src="<?php echo e(asset($deposit->coin->photo)); ?>" align=absmiddle hspace=1 height=17> <?php echo e($deposit->coin->name); ?></td>
                                                        <td>
                                                            <?php if($deposit->plan->name == 'PLAN 6'): ?>
                                                            <?php echo e(number_format($deposit->amount,2)); ?> BTC
                                                            <?php else: ?>
                                                            $<?php echo e(number_format($deposit->amount,2)); ?>



                                                            <?php endif; ?>


                                                        </td>
                                                        <td>$<?php echo e(number_format($deposit->earn,2)); ?></td>
                                                        <td> <?php if(empty($deposit->due_pay)): ?>
                                                            Deposit Not Started
                                                            <?php else: ?>
                                                            Expire in <?php echo e($deposit->due_pay->diffForHumans()); ?>


                                                            <?php endif; ?></td>
                                                        <td><?php echo e(date('F d, Y', strtotime($deposit->created_at))); ?> <?php echo e(date('g:i A', strtotime($deposit->created_at))); ?></td>
                                                        <td style='white-space: nowrap'>
                                                            <?php if($deposit->status_deposit == true): ?>
                                                            <span class=" badge-success" style="padding:1px 9px 2px;-webkit-border-radius: 9px; -moz-border-radius: 9px;
                                                                  border-radius: 9px">Confirmed</span>
                                                            <?php else: ?>
                                                            <span class="badge-danger" style="padding:1px 9px 2px;-webkit-border-radius: 9px; -moz-border-radius: 9px;
                                                                  border-radius: 9px" >Awaiting Payment</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td style='white-space: nowrap'>
                                                            <?php if($deposit->status == true): ?>
                                                            <span class="badge-success" style="padding:1px 9px 2px;-webkit-border-radius: 9px; -moz-border-radius: 9px;
                                                                  border-radius: 9px">Completed</span>
                                                            <?php else: ?>
                                                            <span class="badge-danger" style="padding:1px 9px 2px;-webkit-border-radius: 9px; -moz-border-radius: 9px;
                                                                  border-radius: 9px">Running</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td style='white-space: nowrap'>

                                                            <form  class="deleted" style="display: inline-block!important"  role="form" method="POST"
                                                                   action="<?php echo e(route('delete-deposit',['id'=>$deposit->id])); ?>" >
                                                                <?php echo csrf_field(); ?>   
                                                                <button type="submit"class="">
                                                                    <i class="fa fa-trash text-danger"></i>
                                                                </button>
                                                            </form>
                                                            <?php if($deposit->status_deposit == false): ?>
                                                            <form  class="deleted" style="display: inline-block!important"  role="form" method="POST"
                                                                   action="<?php echo e(route('confirm-deposit',['id'=>$deposit->id])); ?>" >
                                                                <?php echo csrf_field(); ?>   
                                                                <button type="submit"class="">
                                                                    <i class="fa fa-check text-success"></i> Confirm Payment
                                                                </button>
                                                            </form>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>


                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <div class="text-center ">
                                                    <h5 class="grey-text">No <?php echo e($type); ?> Deposit/Investment Yet.</h5>
                                                    <img src="<?php echo e(asset('images/empty.png')); ?>" style="width: 80px;height: 80px">
                                                </div>

                                                <?php endif; ?>
                                                <th>#txt</th>
                                                <th>User</th>
                                                <th>Plan</th>
                                                <th>Coin</th>
                                                <th>Amount</th>
                                                <th>Profit</th>
                                                <th>Date</th>
                                                <th>Date Deposited</th>
                                                <th>Deposit Status</th>
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

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/admin/deposit/index.blade.php ENDPATH**/ ?>