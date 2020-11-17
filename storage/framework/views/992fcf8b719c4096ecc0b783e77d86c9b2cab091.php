<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Deposit History</title>
<meta  name="description" content="Earnings">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Deposit History"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<div class="main-panel">        
    <div class="content-wrapper">



        <script language=javascript>
            function go(p)
            {
                document.opts.page.value = p;
                document.opts.submit();
            }
        </script>


        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body row">

                    <div class="col-md-12"><h6>Sort Transactions</h6></div>

                    <div class="col-md-12">

                        <form  class="form-group"  method=post name=opts action="<?php echo e(route('get_history')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <select name=type class="inpts form-control form-control-sm" onchange="document.opts.submit();">
                                    <option value="" <?php if(empty($type)): ?>selected <?php endif; ?>>All transactions</option>
                                    <option value="deposit" <?php if($type == 'Deposit'): ?>selected <?php endif; ?>>Deposit</option>
                                    <option value="bonus" <?php if($type == 'bonus'): ?>selected <?php endif; ?>>Bonus</option>
                                    <option value="earning" <?php if($type == 'earning'): ?>selected <?php endif; ?>>Earning</option>
                                    <option value="withdrawal" <?php if($type == 'withdrawal'): ?>selected <?php endif; ?> >Withdrawal</option>
                                    <option value="early_deposit_release" <?php if($type == 'early_deposit_release'): ?>selected <?php endif; ?> >Deposit release</option>
                                    <option value="release_deposit" <?php if($type == 'release_deposit'): ?>selected <?php endif; ?>>Deposit returned to user account</option>
                                    <option value="commissions" <?php if($type == 'commissions'): ?>selected <?php endif; ?> >Referral commission</option>
                                </select>
                            </div>
                        </form>

                        <div class="form-group">
                            <form  class="form-group"  method=post name=coin action="<?php echo e(route('get_history')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <select name=type class=" form-control form-control-sm" onchange="document.coin.submit();">

                                    <option value="1" <?php if($type == 1): ?>selected <?php endif; ?>>All eCurrencies</option>
                                    <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($coin->slug); ?>" <?php if($type == $coin->slug): ?>selected <?php endif; ?> ><?php echo e($coin->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </form>
                        </div>
                    </div>

                    <form    method=post action="<?php echo e(route('get_history')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-12 form-inline p-0">

                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-12"><h6>From</h6></div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">

                                                <input type="hidden" name="type" value="filtere">
                                                <select name="month_from" class="form-control form-control-sm" style="width: 100%;">
                                                    <option value=1 >
                                                        Jan</option>
                                                    <option value=2>
                                                        Feb</option>
                                                    <option value=3 >
                                                        Mar</option>
                                                    <option value=4 >
                                                        Apr</option>
                                                    <option value=5 >
                                                        May</option>
                                                    <option value=6 >
                                                        Jun</option>
                                                    <option value=7 >
                                                        Jul</option>
                                                    <option value=8 >
                                                        Aug</option>
                                                    <option value=9 >
                                                        Sep</option>
                                                    <option value=10 >
                                                        Oct</option>
                                                    <option value=11 >
                                                        Nov</option>
                                                    <option value=12 >
                                                        Dec</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="day_from" class="form-control form-control-sm" style="width: 100%;">
                                                    <option value=1 >
                                                        1</option>
                                                    <option value=2 >
                                                        2</option>
                                                    <option value=3 >
                                                        3</option>
                                                    <option value=4 >
                                                        4</option>
                                                    <option value=5 >
                                                        5</option>
                                                    <option value=6 >
                                                        6</option>
                                                    <option value=7 >
                                                        7</option>
                                                    <option value=8 >
                                                        8</option>
                                                    <option value=9 >
                                                        9</option>
                                                    <option value=10 >
                                                        10</option>
                                                    <option value=11 >
                                                        11</option>
                                                    <option value=12 >
                                                        12</option>
                                                    <option value=13 >
                                                        13</option>
                                                    <option value=14 >
                                                        14</option>
                                                    <option value=15 >
                                                        15</option>
                                                    <option value=16 >
                                                        16</option>
                                                    <option value=17 >
                                                        17</option>
                                                    <option value=18 >
                                                        18</option>
                                                    <option value=19 >
                                                        19</option>
                                                    <option value=20 >
                                                        20</option>
                                                    <option value=21 >
                                                        21</option>
                                                    <option value=22 >
                                                        22</option>
                                                    <option value=23 >
                                                        23</option>
                                                    <option value=24 >
                                                        24</option>
                                                    <option value=25 >
                                                        25</option>
                                                    <option value=26>
                                                        26</option>
                                                    <option value=27 >
                                                        27</option>
                                                    <option value=28 >
                                                        28</option>
                                                    <option value=29 >
                                                        29</option>
                                                    <option value=30 >
                                                        30</option>
                                                    <option value=31 >
                                                        31</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="year_from" class="form-control form-control-sm" style="width: 100%;">
                                                    <option value=2010 >2010</option>
                                                    <option value=2011 >2011</option>
                                                    <option value=2012 >2012</option>
                                                    <option value=2013 >2013</option>
                                                    <option value=2014 >2014</option>
                                                    <option value=2015 >2015</option>
                                                    <option value=2016 >2016</option>
                                                    <option value=2017 >2017</option>
                                                    <option value=2018 >2018</option>
                                                    <option value=2019 >2019</option>
                                                    <option value=2020 selected>2020</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 15px;"><h6>To</h6></div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="month_to" class="form-control form-control-sm" style="width: 100%;">
                                                    <option value=1 >
                                                        Jan
                                                    </option>
                                                    <option value=2 >
                                                        Feb
                                                    </option>
                                                    <option value=3>
                                                        Mar
                                                    </option>
                                                    <option value=4 >
                                                        Apr
                                                    </option>
                                                    <option value=5 >
                                                        May
                                                    </option>
                                                    <option value=6 >
                                                        Jun
                                                    </option>
                                                    <option value=7 >
                                                        Jul
                                                    </option>
                                                    <option value=8 >
                                                        Aug
                                                    </option>
                                                    <option value=9 >
                                                        Sep
                                                    </option>
                                                    <option value=10 >
                                                        Oct
                                                    </option>
                                                    <option value=11 >
                                                        Nov
                                                    </option>
                                                    <option value=12 >
                                                        Dec
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="day_to" class="form-control form-control-sm" style="width: 100%;">
                                                    <option value=1 selected>
                                                        1
                                                    </option>
                                                    <option value=2 >
                                                        2
                                                    </option>
                                                    <option value=3 >
                                                        3
                                                    </option>
                                                    <option value=4 >
                                                        4
                                                    </option>
                                                    <option value=5 >
                                                        5
                                                    </option>
                                                    <option value=6 >
                                                        6
                                                    </option>
                                                    <option value=7 >
                                                        7
                                                    </option>
                                                    <option value=8 >
                                                        8
                                                    </option>
                                                    <option value=9 >
                                                        9
                                                    </option>
                                                    <option value=10 >
                                                        10
                                                    </option>
                                                    <option value=11 >
                                                        11
                                                    </option>
                                                    <option value=12 >
                                                        12
                                                    </option>
                                                    <option value=13 >
                                                        13
                                                    </option>
                                                    <option value=14 >
                                                        14
                                                    </option>
                                                    <option value=15 >
                                                        15
                                                    </option>
                                                    <option value=16 >
                                                        16
                                                    </option>
                                                    <option value=17 >
                                                        17
                                                    </option>
                                                    <option value=18 >
                                                        18
                                                    </option>
                                                    <option value=19 >
                                                        19
                                                    </option>
                                                    <option value=20 >
                                                        20
                                                    </option>
                                                    <option value=21 >
                                                        21
                                                    </option>
                                                    <option value=22 >
                                                        22
                                                    </option>
                                                    <option value=23 >
                                                        23
                                                    </option>
                                                    <option value=24 >
                                                        24
                                                    </option>
                                                    <option value=25 >
                                                        25
                                                    </option>
                                                    <option value=26 >
                                                        26
                                                    </option>
                                                    <option value=27 >
                                                        27
                                                    </option>
                                                    <option value=28 >
                                                        28
                                                    </option>
                                                    <option value=29 >
                                                        29
                                                    </option>
                                                    <option value=30 >
                                                        30
                                                    </option>
                                                    <option value=31 >
                                                        31
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="year_to" class="form-control form-control-sm" style="width: 100%;">
                                                    <option value=2010 >
                                                        2010
                                                    </option>
                                                    <option value=2011 >
                                                        2011
                                                    </option>
                                                    <option value=2012 >
                                                        2012
                                                    </option>
                                                    <option value=2013 >
                                                        2013
                                                    </option>
                                                    <option value=2014 >
                                                        2014
                                                    </option>
                                                    <option value=2015 >
                                                        2015
                                                    </option>
                                                    <option value=2016 >
                                                        2016
                                                    </option>
                                                    <option value=2017 >
                                                        2017
                                                    </option>
                                                    <option value=2018 >
                                                        2018
                                                    </option>
                                                    <option value=2019 >
                                                        2019
                                                    </option>
                                                    <option value=2020 selected>
                                                        2020
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>





                        <div class="col-md-12" style="margin-top: 15px;">
                            <input class="btn btn-warning btn-block text-white" type=submit value="Go">                  
                        </div>


                    </form>

                </div>
            </div>
        </div>



        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">



                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>                          
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <?php $__empty_1 = true; $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                      <td><b><?php echo e($hi->name_type); ?></b></td>
                                        <td width=200 align=right><b>$<?php echo e(number_format($hi->amount)); ?></b>
                                            <img src="<?php echo e(asset($hi->coin->photo)); ?>" align=absmiddle hspace=1 height=17></td>
                                        <td width=170 align=center valign=bottom><b><small><?php echo e(date('F d, Y', strtotime($hi->created_at))); ?> <?php echo e(date('g:i A', strtotime($hi->created_at))); ?></small></b></td>
                             
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <td colspan=3 align=center>No transactions found</td>
                                    <?php endif; ?>
                                </tr>
                                <tr><td colspan=3>&nbsp;</td>


                                                   
                            </tbody>
                        </table>
                    </div>


                    <ul class="pagination">
                       <center>
                                    <?php echo e($histories->appends($_GET)->links()); ?>

                                </center>
                    </ul>


                </div>
            </div>
        </div>

        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/user/deposit_history.blade.php ENDPATH**/ ?>