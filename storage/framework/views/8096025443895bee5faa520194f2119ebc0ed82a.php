<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; <?php echo e(Auth::user()->usernme); ?> Dashbord</title>
<meta  name="description" content="<?php echo e(Auth::user()->usernme); ?> Dashbord">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - <?php echo e(Auth::user()->usernme); ?> Dashbord"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />
  <style>
  .ca {
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}
/* Start statistics */
.statistics {
  margin-top: 25px;
  color: #fff;
}
.statistics .box {
  background-color: #fff;
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  padding: 15px;
  color: #000;
  overflow: hidden;
}
.statistics .box > i {
  float: left;
  color: #fff;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  line-height: 60px;
  font-size: 22px;
}
.statistics .box .info {
  float: left;
  width: auto;
  margin-left: 10px;
}
.statistics .box .info h3 {
  margin: 5px 0 5px;
  display: inline-block;
}
.statistics .box .info p {color:#BBB}

/* End statistics */


    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="main-panel">
      
      
       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
         <section class="statistics">
        <div class="container-fluid">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 ">
                 <a class="text-white "href="<?php echo e(url('users')); ?>">
              <div class="box ">
                <i class="fa fa-users fa-fw bg-primary"></i>
                <div class="info">
                  <h3><?php echo e(number_format($users)); ?></h3> <span>Users</span>
                </div>
              </div>
                 </a>
            </div>
            <div class="col-md-4">
                  <a class="text-white "href="<?php echo e(url('manage-deposit')); ?>">
              <div class="box">
                <i class="fa fa-dollar-sign fa-fw bg-danger"></i>
                <div class="info">
                  <h3><?php echo e(number_format($all_deposits)); ?></h3> <span>Deposits</span>
                
                </div>
              </div>
                  </a>
            </div>
            <div class="col-md-4">
                      <a class="text-white "href="<?php echo e(url('manage-withdraw')); ?>">
              <div class="box">
                <i class="fa fa-handshake fa-fw bg-success"></i>
                <div class="info">
                  <h3><?php echo e(number_format($all_withdraws)); ?></h3> <span>Withdraws</span>
                </div>
              </div>
                      </a>
            </div>
              
              
          </div>
     
       <div class="clearfix"></div>
       <br/>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="box">
                <i class="fa fa-database fa-fw bg-primary"></i>
                <div class="info">
                  <h3><?php echo e(number_format($plans)); ?></h3> <span>Plans</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <a class="text-white "href="<?php echo e(url('manage-deposit?type=running')); ?>">
              <div class="box">
                <i class="fa fa-money-bill-alt fa-fw bg-danger"></i>
                <div class="info">
                  <h3><?php echo e(number_format($active_investment)); ?></h3> <span>Active Investment</span>
                
                </div>
               
              </div>
                     </a>
            </div>
            <div class="col-md-4">
                  <a class="text-white "href="<?php echo e(url('manage-deposit?type=completed')); ?>">
              <div class="box">
                <i class="fa fa-dollar-sign fa-fw bg-success"></i>
                <div class="info">
                  <h3><?php echo e(number_format($completed_investment)); ?></h3> <span>Completed Investment</span>
                </div>
              </div>
                  </a>
            </div>
              
              
          </div>
        </div>
        <div class="clearfix"></div>
       <br/>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
                   <a class="text-white "href="<?php echo e(url('manage-deposit?type=pending')); ?>">
              <div class="box">
                <i class="fa fa-spinner fa-fw bg-primary"></i>
                <div class="info">
                  <h3><?php echo e(number_format($pending_investment)); ?></h3> <span>Pending Deposit</span>
                </div>
              </div>
                   </a>
            </div>
            <div class="col-md-4">
                <a class="text-white "href="<?php echo e(url('manage-deposit?type=confirmed')); ?>">
              <div class="box">
                <i class="fa fa-barcode fa-fw bg-danger"></i>
                <div class="info">
                  <h3><?php echo e(number_format($confirm_investment)); ?></h3> <span>Confirmed Deposit</span>
                
                </div>
               
              </div>
                     </a>
            </div>
            <div class="col-md-4">
                  <a class="text-white "href="<?php echo e(url('manage-deposit?type=')); ?>">
              <div class="box">
                <i class="fa fa-dollar-sign fa-fw bg-success"></i>
                <div class="info">
                  <h3><?php echo e(number_format($all_deposits)); ?></h3> <span>Total Deposit</span>
                </div>
              </div>
                  </a>
            </div>
              
              
          </div>
        </div>
        <div class="clearfix"></div>
       <br/>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
                 <a class="text-white "href="<?php echo e(url('manage-withdraw?type=')); ?>">
              <div class="box">
                <i class="fa fa-handshake fa-fw bg-primary"></i>
                <div class="info">
                  <h3><?php echo e(number_format($all_withdraws)); ?></h3> <span>Total Withdraw</span>
                </div>
              </div>
                     <a/>
            </div>
            <div class="col-md-4">
                <a class="text-white "href="<?php echo e(url('manage-withdraw?type=pending')); ?>">
              <div class="box">
                <i class="fa fa-spinner fa-fw bg-danger"></i>
                <div class="info">
                 <h3><?php echo e(number_format($withdraws_pending)); ?></h3> <span>Pending Withdraw</span>
                
                </div>
               
              </div>
                     </a>
            </div>
            <div class="col-md-4">
                  <a class="text-white "href="<?php echo e(url('manage-withdraw?type=completed')); ?>">
              <div class="box">
                <i class="fa fa-chart-bar fa-fw bg-success"></i>
                <div class="info">
                  <h3><?php echo e(number_format($withdraws_complete)); ?></h3> <span>Completed Withdraw</span>
                </div>
              </div>
                  </a>
            </div>
              </div>
              </div>
         </div>
             </div>
             <div class="clearfix">  </div>
      </section>   
       <?php endif; ?>
     
      
          
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isUser')): ?>
  <div class="content-wrapper">
<div style="height:560px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;"><div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=chart&theme=dark&coin_id=859&pref_coin_id=1505" width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>
              <div class="row">
                <div class="col-md-4">
                  <div class="grid-margin stretch-card">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="<?php echo e(asset('images/user.jpg')); ?>" class="img-lg rounded-circle mb-2" alt="profile image"/>
                            <h4><?php echo e(ucfirst(Auth::user()->full_name)); ?></h4>
                            <p class="text-muted"><?php echo e(ucfirst(Auth::user()->username)); ?></p>
                            
                            <a href="<?php echo e(url('deposit')); ?>" class="btn btn-warning btn-sm mt-3 mb-4 text-white">Deposit</a>
                            <a href="<?php echo e(url('withdraw')); ?>" class="btn btn-warning btn-sm mt-3 mb-4 text-white">Withdraw</a>
                            <div class="border-top pt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <h6><?php echo e(date('F d, Y', strtotime(Auth::user()->created_at))); ?></h6>
                                        <p>Joined Date</p>
                                    </div>
                                    <div class="col-4">
                                        <h6><?php echo e(date('F d, Y', strtotime(Auth::user()->last_login))); ?> <?php echo e(date('g:i A', strtotime(Auth::user()->last_login))); ?></h6>
                                        <p>Last Access</p>
                                    </div>
                                    <div class="col-4">
                                        <h6><?php echo e(ucfirst(Auth::user()->username)); ?></h6>
                                        <p>Username</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>





                <div class="col-md-8">
                    <div class="row">
                  
                    <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Balance</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">$<?php echo e(number_format($total_balance + $earned),2); ?></h2>
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class=" ml-1 mb-0">Updated: now</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">Your account balance</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-binoculars text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Total Earnings</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">$<?php echo e(number_format($earned,2)); ?></h2>
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class="ml-1 mb-0">Updated: now</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">Your total Earnings</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-money-bill-alt text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  

                    <div class="col-md-6" style="padding-top: 10px;">
                        <div class="card">
                            <div class="card-body p-0">
                                <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #FF5E6D">Deposit History</h5>
                                <!-- stat 1 -->
                                <div class="media px-3 py-2 border-bottom btn-light">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">$<b><?php echo e(number_format($total_deposit,2)); ?></b></h4>
                                        <span class="text-muted">Total Deposits</span>
                                    </div>
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>

                                <!-- stat 2 -->
                                <div class="media px-3 py-2 border-bottom">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">$<b><?php echo e(number_format($active_deposit,2)); ?></b></h4>
                                        <span class="text-muted">Active Deposits</span>
                                    </div>
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>

                                <!-- stat 3 -->
                                <div class="media px-3 py-2 btn-light">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">$<b><?php echo e(number_format($last_deposit,2)); ?></b></h4>
                                        <span class="text-muted">Last Deposit</span>
                                    </div>
                                    <li class="fa fa-sort-amount-up" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="padding-top: 10px;">
                        <div class="card">
                            <div class="card-body p-0">
                                <h5 class="card-title header-title border-bottom p-3 mb-0" style="background: #fff; color: #111; border-left: 4px solid #FF5E6D">Withdrawal History</h5>
                                <!-- stat 1 -->
                                <div class="media px-3 py-2 border-bottom btn-light">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">$<b><?php echo e(number_format($total_withdraw),2); ?></b></h4>
                                        <span class="text-muted">Total Withdrawals</span>
                                    </div>
                                    <li class="fa fa-sort-amount-down" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>

                                <!-- stat 2 -->
                                <div class="media px-3 py-2 border-bottom">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">$<b><?php echo e(number_format($pending_withdraw,2)); ?></b></h4>
                                        <span class="text-muted">Pending Withdrawals</span>
                                    </div>
                                    <li class="fa fa-sort-amount-down" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>

                                <!-- stat 3 -->
                                <div class="media px-3 py-2 btn-light">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">$<b><?php echo e(number_format($last_withdraw,2)); ?></b></h4>
                                        <span class="text-muted">Last Withdrawal</span>
                                    </div>
                                    <li class="fa fa-sort-amount-down" style="font-size: 24px; margin-top: 14px;"></li>
                                </div>
                            </div>
                        </div>
                    </div>
                

                
                    </div>
                </div>
              </div>

    <br>
              <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <input type="text" value="<?php echo e(url('register')); ?>?ref=<?php echo e(Auth::user()->username); ?>" class="form-control" id="inputReferralLink">
                                    <label for="inputReferralLink">Referral Link</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br>
              

            
        </div>
            <?php endif; ?>
            
            
            

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/home.blade.php ENDPATH**/ ?>