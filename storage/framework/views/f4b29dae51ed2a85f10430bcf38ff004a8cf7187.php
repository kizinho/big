<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; View User</title>
<meta  name="description" content="View User">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - View User"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

 <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View User</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>


                            <div class="container profile">
                                <div class="row">
                                    <div class="col text-center mt-3">
                                        <img alt="picture" src="<?php echo e(asset('images/user.jpg')); ?>" class="img-lg rounded-circle border shadow" />
                                        <h2 class="mt-3"> <?php echo e($user->username); ?></h2>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">User Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#coin" role="tab" aria-controls="contact" aria-selected="false">Funds</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content card" id="myTabContent">
                                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <table class="table table-hover table-sm table-properties">
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 20rem;"><?php echo e($user->full_name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Username</th>
                                                        <td><?php echo e($user->username); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><?php echo e($user->email); ?></td>
                                                    </tr>

                                                </table>
                                            </div>

                                            <div class="tab-pane fade" id="coin" role="tabpanel" aria-labelledby="address-tab">
 <table id="example5" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Coin</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                                <th>Profit</th>
                                                <th>Bonus</th>
                                                  <th>image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $usercoin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ucoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($ucoin->coin->name); ?></td>
                                                        <td><?php echo e($ucoin->address); ?></td>
                                                        <td>$<?php echo e(number_format($ucoin->amount)); ?></td>
                                                        <td>$<?php echo e(number_format($ucoin->earn)); ?></td>
                                                        <td>$<?php echo e(number_format($ucoin->bonus)); ?></td>
                                                        <td> <img src="<?php echo e(asset($ucoin->coin->photo)); ?>" align=absmiddle hspace=1 height=17></td>
                                                       
                                                    </tr>
                                                </tbody>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <th>Coin</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                                <th>Profit</th>
                                                <th>Bonus</th>
                                                 <th>image</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                               

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>




    </div>
                </div>
            
                    </div>
                </div>
                    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/admin/users/view.blade.php ENDPATH**/ ?>