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
                        <h4 class="card-title">Settings</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>

                            <form class="" method="Post" action="<?php echo e(route('settings')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>    
                                <div class="form-group">
                                    <label>Site Name</label>
                                    <input type="text" name="site_name" value="<?php echo e($setting['site_name']); ?>" class="form-control" placeholder="Enter Site  Name">
                                </div>
                                 <div class="form-group">
                                    <label>Site Phone Number</label>
                                    <input type="text" name="site_phone" value="<?php echo e($setting['site_phone']); ?>" class="form-control" placeholder="Enter Site Phone Number">
                                </div>
                                <div class="form-group">
                                    <label>Site Url</label>
                                    <input type="text" name="site_url" value="<?php echo e($setting['site_url']); ?>" class="form-control" placeholder="Enter Site Url">
                                </div>
                                <div class="form-group">
                                    <label>Site Email</label>
                                    <input type="text" name="site_email" value="<?php echo e($setting['site_email']); ?>" class="form-control" placeholder="Site Email">
                                </div>
                                <div class="form-group">
                                    <label>Site Send Notify Email</label>
                                    <input type="text" name="send_notify_email" value="<?php echo e($setting['send_notify_email']); ?>" class="form-control" placeholder="site Notify Email">
                                </div>
                                <div class="form-group">
                                    <label>Referral Percentage</label>
                                    <input type="text" name="ref_percentage" value="<?php echo e($setting['ref_percentage']); ?>" class="form-control" placeholder="Referral Percentage">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea type="text" name="address" class="form-control" placeholder="Address"><?php echo e($setting['address']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Site Short Code Name</label>
                                    <input type="text" name="site_code" value="<?php echo e($setting['site_code']); ?>" class="form-control" placeholder="site short code name">
                                </div>
                                <div class="form-group">
                                    <label>Site Location</label>
                                    <input type="text" name="location" value="<?php echo e($setting['location']); ?>" class="form-control" placeholder="Location">
                                </div>
                                <div class="form-group">
                                    <label>Video Link</label>
                                    <input type="text" name="video_link" value="<?php echo e($setting['video_link']); ?>" class="form-control" placeholder="Video Link">
                                </div>
                                <div class="form-group">
                                    <label>Site Copy Right Name</label>
                                    <input type="text" name="copy_right" value="<?php echo e($setting['copy_right']); ?>" class="form-control" placeholder="Copy Right">
                                </div>
                                <div class="form-group">
                                    <label>Deposite Charge</label>
                                    <input type="text" name="deposit_investment_charge" value="<?php echo e($setting['deposit_investment_charge']); ?>" class="form-control" placeholder="Deposit Charge">
                                </div>
                                  <div class="form-group">
                                    <label>Minimum Withdraw</label>
                                    <input type="text" name="min_withdraw" value="<?php echo e($setting['min_withdraw']); ?>" class="form-control" placeholder="Minimum Withdraw">
                                </div>
                                <div class="form-group">
                                    <label>Withdraw Charge</label>
                                    <input type="text" name="withdraw_charge" value="<?php echo e($setting['withdraw_charge']); ?>" class="form-control" placeholder="Withdraw Charge">
                                </div>
                                 <div class="form-group">
                                    <label>BlockIO Secrent Pin </label>
                                    <input type="text" name="block_io_pin" value="<?php echo e($setting['block_io_pin']); ?>" class="form-control" placeholder="Your Blockio Password">
                                </div>
                               
                                <div class="form-group">
                                    <img id="footer-logo-img" class="img-center" src="<?php echo e(asset($settings['logo'])); ?>" alt="">
                                    <label>Site Logo</label>
                                    <input type="file" name="logo"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <img id="footer-logo-img" class="img-center" src="<?php echo e(asset($settings['favicon'])); ?>" alt="">
                                    <label>Favicon</label>
                                    <input type="file" name="favicon"  class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="">Investment Payment Mode</label>

                                    <select  name="mode" class="form-control">
                                        <option value="" selected disabled>Select Mode</option>

                                        <option value="0" <?php echo e($setting['investment_payment_mode'] == false ? 'selected' : ''); ?>> Daily </option>
                                        <option value="1" <?php echo e($setting['investment_payment_mode'] == true ? 'selected' : ''); ?>> Compound Date</option>

                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label class="">Auto Withdraw</label>

                                    <select  name="auto_withdraw" class="form-control">
                                        <option value="" selected disabled>Select Mode</option>

                                        <option value="0" <?php echo e($setting['auto_withdraw'] == false ? 'selected' : ''); ?>> Off </option>
                                        <option value="1" <?php echo e($setting['auto_withdraw'] == true ? 'selected' : ''); ?>> On</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Email Template</label>
                                                 <textarea id="area1" class="form-control" rows="30" name="email_body"><?php echo e($setting['email_body']); ?></textarea>
                                </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-theme btn-circle">Save</button>
                        </div>
                        </form>  



                    </div>
                </div>
            
                    </div>
                </div>
                   
                   
                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/admin/setting/index.blade.php ENDPATH**/ ?>