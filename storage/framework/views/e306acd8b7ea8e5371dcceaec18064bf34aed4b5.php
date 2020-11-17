<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Withdrawal</title>
<meta  name="description" content="Withdrawal">
<meta itemprop="keywords" name="keywords" content="Withdrawal"/>
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
                  



                            <form  class="form-group"  method="POST" action="<?php echo e(route('withdraw')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #0f1531;">
                                    <tr>
                                        <td>Account Balance:</td>
                                        <td>$<b><?php echo e(number_format($total_balance,2)); ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Pending Withdrawals: </td>
                                        <td>$<b><?php echo e(number_format($pending_withdraw,2)); ?></b></td>
                                    </tr>
                                </table>
                                <br><br><br>
                                <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #0f1531;" >
                                    <tr>
                                        <th></th>
                                        <th>Processing</th>
                                        <th>Available</th>
                                        <th>Profit</th>
                                         <th>Referal Bonus</th>

                                    </tr>
                                    <?php $__empty_1 = true; $__currentLoopData = $usercoin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ucoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><input type="radio" name="coin" value="<?php echo e($ucoin->coin_id); ?>" required ></td>
                                        <td><img src="<?php echo e(asset($ucoin->coin->photo)); ?>" width=44 height=17 align=absmiddle> <?php echo e($ucoin->coin->name); ?></td>
                                        <td><b style="color:green">$<?php echo e(number_format($ucoin->amount,2)); ?></b></td>
                                        <td><b style="color:red">$<?php echo e(number_format($ucoin->earn,2)); ?></b></td>
                                         <td><b style="color:green">$<?php echo e(number_format($ucoin->bonus,2)); ?></b></td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    No Coin Set
                                    <a href="<?php echo e(url('edit-account')); ?>"> Add Coin </a>
                                    <?php endif; ?>
                                </table>
                                <br><br><br>
                                <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #0f1531;">
                                    <tr>
                                        <td colspan=2>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Withdraw from:</td>
                                        <td>
                                            <select name="withdraw_from"  class=form-control required>
                                                <option value="" selected disabled>Choose Option</option>
                                                 <option value="all" <?php echo e(old('withdraw_from') == 'all' ? 'selected' : ''); ?>>All </option>
                                                <option value="Balance" <?php echo e(old('withdraw_from') == 'Balance' ? 'selected' : ''); ?>>Balance</option>
                                                <option value="Profit" <?php echo e(old('withdraw_from') == 'Profit' ? 'selected' : ''); ?>>Profit</option>
                                                
                                                <option value="Referal Bonus" <?php echo e(old('withdraw_from') == 'Referal Bonus' ? 'selected' : ''); ?>>Referal Bonus</option>
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Withdrawal ($):</td>
                                        <td><input type=text name=amount value="<?php echo e(old('amount')); ?>" class=form-control size=15 required></td>
                                    </tr>

                                    <tr>
                                        <td colspan=2><textarea name=comment class=form-control cols=45 rows=4 placeholder="Your Comment"><?php echo e(old('comment')); ?></textarea>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type=submit value="Request" class="btn btn-theme btn-circle"></td>
                                    </tr></table>
                            </form>


                        </div>


                    </div>
                </div>
                </div>
       

                <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\naijacrawl soft\new_ik_btc\greengold\resources\views/user/withdraw.blade.php ENDPATH**/ ?>