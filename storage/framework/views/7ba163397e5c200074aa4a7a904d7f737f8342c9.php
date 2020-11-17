<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Settings</title>
<meta  name="description" content="Settings">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Settings"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

 <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Users</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>
                            <button type="button" class="btn btn-theme btn-circle" data-toggle="modal" data-target="#modal-default">
                                Add New Users
                            </button>
                            <div class="modal fade" id="modal-default" >
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header ">
                                            <h4 class="modal-title">Add User</h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form class="" method="Post" action="<?php echo e(url('add-user')); ?>">
                                                <?php echo csrf_field(); ?>    

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="far fa-user"></i>
                                                            <input id="full_name" type=text name=full_name value="" class="form-control" placeholder="Full name" required="required" data-error="Fullname is required.">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="far fa-user"></i>
                                                            <input id="username" type=text name=username class="form-control" placeholder="Username" required="required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="fas fa-unlock-alt"></i>
                                                            <input id="password" type=password name=password value="" class="form-control" placeholder="Password" required="required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="far fa-envelope"></i>
                                                            <input id="email" type=text name=email value="" class="form-control" placeholder="Email" required="required">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="fa fa-credit-card"></i>
                                                            <input type=text class="form-control" size=30 name="bitcoin_address"  data-validate-notice="Bitcoin Address" placeholder="Your Bitcoin Account">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="fa fa-credit-card"></i>
                                                            <input type=text class="form-control" size=30 name="litecoin_address"  data-validate-notice="Litecoin Address" placeholder="Your Litecoin Account">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="fa fa-credit-card"></i>
                                                            <input type=text class="form-control" size=30 name="ethereum_address" data-validate-notice="Ethereum Address" placeholder="Your Ethereum Account">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="fa fa-credit-card"></i>
                                                            <input type=text class="form-control" size=30 name="bitcoin_cash_address"  data-validate-notice="Bitcoin Cash Address" placeholder="Your Bitcoin Cash Account">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="fa fa-credit-card"></i>
                                                            <input type=text class="form-control" size=30 name="dash_address"  data-validate-notice="Dash Address" placeholder="Your Dash Account">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>





                                                    <div class="col-md-6">
                                                        <div class="form-group"> <i class="fa fa-key"></i>
                                                            <select  name="type" class="form-control">
                                                                <option value="" selected disabled>Select User Type</option>
                                                                <option value="admin"> Admin </option>
                                                                <option value="user"> User </option>

                                                            </select>
                                                        </div>
                                                    </div>





                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-theme btn-circle">Add</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Type</th>
                                                        <th>Date Joined</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><a href="<?php echo e(url('view-user', $user->id)); ?>"><?php echo e($user->username); ?></a></td>
                                                        <td><?php echo e($user->email); ?></td>
                                                        <td><?php echo e($user->type); ?></td>
                                                        <td><?php echo e(date('F d, Y', strtotime($user->created_at))); ?></td>
                                                        <td style='white-space: nowrap'>
                                                            <button type="button" class="" data-toggle="modal" data-target="#edit<?php echo e($user->id); ?>">
                                                                <i class="fa fa-edit text-success"></i>
                                                            </button>
                                                            <a href="<?php echo e(url('view-user', $user->id)); ?>" class="">
                                                                <i class="fa fa-eye text-warning"></i>
                                                            </a>
                                                            <form  class="deleted" style="display: inline-block!important"  role="form" method="POST"
                                                                   action="<?php echo e(route('delete-user',['id'=>$user->id])); ?>" >
                                                                <?php echo csrf_field(); ?>   
                                                                <button type="submit"class="">
                                                                    <i class="fa fa-trash text-danger"></i>
                                                                </button>
                                                            </form> 
                                                            <button type="button" class="" data-toggle="modal" data-target="#fund<?php echo e($user->id); ?>">
                                                                <i class="fa fa-dollar-sign text-success">(Manage User Funds)</i>
                                                            </button>
                                                              <a href="<?php echo e(url('user-login', $user->id)); ?>" class="">
                                                                <i class="fa fa-sign-in-alt text-primary"> Login</i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <div class="modal fade" id="edit<?php echo e($user->id); ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit User</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form class="" method="Post" action="<?php echo e(route('edit-user',['id'=>$user->id])); ?>">
                                                                    <?php echo csrf_field(); ?>  
                                                                    <div class="form-group">
                                                                        <label>Full Name</label>
                                                                        <input type="text" name="full_name" value="<?php echo e($user->full_name); ?>" class="form-control" placeholder="Enter Full Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" name="username" value="<?php echo e($user->username); ?>" class="form-control" placeholder="Enter Username">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="text" name="email" value="<?php echo e($user->email); ?>" class="form-control" placeholder="Enter Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">Type</label>

                                                                        <select  name="type" class="form-control">
                                                                            <option value="" selected disabled>Select Type</option>

                                                                            <option value="admin" <?php echo e($user->type == 'admin' ? 'selected' : ''); ?>> Admin </option>
                                                                            <option value="user" <?php echo e($user->type == 'user' ? 'selected' : ''); ?>> User</option>

                                                                        </select>
                                                                    </div>
                                                                     <div class="form-group">
                                                                        <label class="">Can Withdraw</label>

                                                                        <select  name="can_withdraw" class="form-control">
                                                                            <option value="" selected disabled>Select Can Withdraw</option>

                                                                            <option value="0" <?php echo e($user->can_withdraw == false ? 'selected' : ''); ?>> Yes </option>
                                                                            <option value="1" <?php echo e($user->can_withdraw == true ? 'selected' : ''); ?>> No</option>

                                                                        </select>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-theme btn-circle">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!--//fund-->
                                                <div class="modal fade" id="fund<?php echo e($user->id); ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Mange Fund</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form class="" method="Post" action="<?php echo e(route('fund',['id'=>$user->id])); ?>">
                                                                    <?php echo csrf_field(); ?>  
                                                                    <input name="user_id" type="hidden" value="<?php echo e($user->id); ?>">
                                                                    <div class="form-group">
                                                                        <label class="">Fund Type</label>

                                                                        <select  name="type" class="form-control">
                                                                            <option value="" selected disabled>Select Type</option>

                                                                            <option value="bonus"> Bonus </option>
                                                                            <option value="add"> Add</option>
                                                                            <option value="substract"> Substract</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">Coin Type</label>

                                                                        <select  name="coin" class="form-control">
                                                                            <option value="" selected disabled>Select Coin Type</option>
                                                                            <?php if(!$user->coin->isEmpty()): ?>
                                                                            <option value="all"> All Coin </option>
                                                                            <?php endif; ?>
                                                                            <?php $__currentLoopData = $user->coin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ucoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                            <option value="<?php echo e($ucoin->coin_id); ?>"> <?php echo e($ucoin->coin->name); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Amount</label>
                                                                        <input type="text" name="amount" value="" class="form-control" placeholder="Amount">
                                                                    </div>


                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-theme btn-circle">Send</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <div class="text-center ">
                                                    <h5 class="grey-text">No User created yet.</h5>
                                                    <img src="<?php echo e(asset('images/empty.png')); ?>" style="width: 80px;height: 80px">
                                                </div>

                                                <?php endif; ?>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Type</th>
                                                <th>Date Joined</th>
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

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/admin/users/index.blade.php ENDPATH**/ ?>