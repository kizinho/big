<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Edit Account</title>
<meta  name="description" content="Edit Account">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Edit Account"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <div class="main-panel">        
        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">



                          <form  class="form-group"  method="POST" action="<?php echo e(route('edit_account')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <table cellspacing=10 cellpadding=12 border=0 width=100% >
                                    <tr>
                                        <td>Account Name:</td>
                                        <td><?php echo e(ucfirst(Auth::user()->username)); ?></td>
                                    </tr><tr>
                                        <td>Registration date:</td>
                                        <td><?php echo e(date('F d, Y', strtotime(Auth::user()->created_at))); ?> <?php echo e(date('g:i A', strtotime(Auth::user()->created_at))); ?></td>
                                    </tr><tr>
                                        <td>Your Full Name:</td>
                                        <td>
                                            <input type=text name=full_name value='<?php echo e(Auth::user()->full_name); ?>' class=form-control size=30>
                                    </tr>

                                    <tr>
                                        <td>New Password:</td>
                                        <td><input type=password name=password value="" class=form-control size=30 autocomplete="new-password"></td>
                                    </tr><tr>
                                        <td>Retype Password:</td>
                                        <td><input type=password name=confirm_password value="" class=form-control size=30></td>
                                    </tr>
                                     <tr>
                                        <td>Your Bitcoin acc no:</td>
                                        <td><input type=text class=form-control size=30 name="bitcoin_address" value="<?php echo e($bitcoin); ?>"></td>
                                    </tr>
                                  
                                    <tr>
                                        <td>Your E-mail address:</td>
                                        <td><input type=text name=email value='<?php echo e(Auth::user()->email); ?>' class=form-control size=30></td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type=submit value="Change Account data" class="btn btn-theme btn-circle"></td>
                                    </tr></table>
                            </form>
                        </div>


                    </div>
                </div>
             </div>
             </div>



                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/user/edit_account.blade.php ENDPATH**/ ?>