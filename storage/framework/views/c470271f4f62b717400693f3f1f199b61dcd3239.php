<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Deposit</title>
<meta  name="description" content="Deposit">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Deposit"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- partial -->
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">




        <section class="pricing py-5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">





                    </div>


                    <form  class="form-group"  method="POST" action="<?php echo e(route('deposit')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?> 

                        <input type="hidden" name="user_id"   value="<?php echo e(Auth::user()->id); ?>" style="transform: scale(2);">

                        <div class="row">

                            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Free Tier -->
                            <div class="col-lg-3">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center"><?php echo e($plan->name); ?></h5>
                                        <h6 class="card-price text-center">%<?php echo e($plan->percentage); ?><span class="period">/<?php echo e($plan->compound->name); ?></span></h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li>Minimum Deposit: $<?php echo e($plan->min); ?></li>
                                            <li>Maximum Deposit: $<?php echo e($plan->max); ?></li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span> Automatic Deposit</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span> Automatic Withdrawal</li>
                                            <li><span class="fa-li"><i class="fas fa-check"></i></span> 24x7 Support</li>              
                                        </ul>
                                        <div class="checintext">
                                            <div class="check-in">
                                                <input type="radio" name="plan" class="plan"  value="<?php echo e($plan->id); ?>">

                                            </div>
                                            <div class="check_tittle">Select</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br/> 
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>



                        <br>

                        <div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"><h4>Deposit Amount: ($)</h4></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="amount" name=amount value=''>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12"><h5>Select Payment Method:</h5></div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="form-check">

                                                        <label class="form-check-label">
                                                            <input type="radio" name='coin_id' value="<?php echo e($coins->id); ?>" class="form-check-input coin">
                                                            Spend funds from <?php echo e($coins->name); ?>   
                                                        </label>
                                                       <span id="usermoney" style="float: right; color: green">

                                                        </span>
                                                    </div>


                                                </div>
                                                <input type="hidden" id="p_id" class="coin" name='plan_id' value="">

                                                <input type=submit value="Spend"  id='spend'  type="submit"  class="btn btn-warning text-white">

                                            </div>                    
                                        </div>





                                    </div>
                                </div>
                            </div>
                        </div>



                    </form>





                </div>
            </div>
        </section>





        <?php $__env->startSection('script'); ?>

        <script>

            $('.plan').click(function () {
                var planID = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                if (planID) {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo e(url('get-plan')); ?>?plan_id=" + planID,
                        success: function (res) {
                            if (res) {
                                $('#p_id').val('');
                                $('#plan_value').val('');
                                $('#amount').val('');
                                $('#sign').val('');
                                $('#plan_compound').val('');
                                $('#plan_profit').val('');
                                $("#plan_value").val($("#plan_value").val() + res.min);
                                $("#amount").val($("#amount").val() + res.amount);
                                $("#plan_compound").val($("#plan_compound").val() + res.percentage);
                                $("#plan_profit").val($("#plan_profit").val() + res.profit);
                                $("#p_id").val($("#p_id").val() + res.p_id);
                                $("#sign").html(res.sign);
                            } else {
                                $('#plan_value').val('');
                                $('#sign').val('');
                                $('#plan_compound').val('');
                                $('#plan_profit').val('');
                                $('#p_id').val('');
                                $('#amount').val('');
                            }
                        }
                    });
                } else {
                    $('#plan_value').val('');
                    $('#sign').val('');
                    $('#plan_compound').val('');
                    $('#plan_profit').val('');
                    $('#p_id').val('');
                    $('#amount').val('');
                }
            });
        </script>
        <script>

            $('.coin').click(function () {
                var coinID = $(this).val();
                var planID = $("input[id=p_id]").val();
                if (planID) {
                } else {
                    toastr.error("Please Select a Plan!", {timeOut: 50000});
                    return false;
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                if (coinID) {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo e(url('get-coin')); ?>?coin_id=" + coinID + "&plan_id=" + planID,
                        success: function (res) {
                            if (res) {

                                $('#usermoney').val('');
                                $('#message_danger').val('');
                                $('#message_success').val('');
                                if (res.status === 401) {
                                    $("#message_danger").html(res.message_danger).show();
                                    $("#message_success").html(res.message_danger).hide();
                                    $("#spend").show();
                                } else {

                                    $("#message_success").html(res.message_success).show();
                                    $("#message_danger").html(res.message_danger).hide();
                                    $("#spend").show();
                                }

                                $("#usermoney").html(res.usermoney);
                            } else {
                                $('#usermoney').val('');
                                $('#message_danger').val('');
                                $('#message_success').val('');
                            }
                        }
                    });
                } else {
                    $('#usermoney').val('');
                    $('#message_danger').val('');
                    $('#message_success').val('');
                }
            });
        </script>
        <?php $__env->stopSection(); ?>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/user/deposit.blade.php ENDPATH**/ ?>