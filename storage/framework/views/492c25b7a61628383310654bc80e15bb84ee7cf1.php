<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Manage Plan</title>
<meta  name="description" content="Manage Plan">
<meta itemprop="keywords" name="keywords" content="<?php echo e(ucfirst($settings['site_name'])); ?> - Manage Plan"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

 <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Plan</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>
                            <button type="button" class="btn btn-theme btn-circle" data-toggle="modal" data-target="#modal-default">
                                Add New Plan
                            </button>
                            <div class="modal fade" id="modal-default" >
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header ">
                                            <h4 class="modal-title">Add Plan</h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form class="" method="Post" action="<?php echo e(url('add-plan')); ?>">
                                                <?php echo csrf_field(); ?>    

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"> 
                                                            <input  type=text name=name value="" class="form-control" placeholder="Name" required="required" data-error="Name is required.">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type=text name=ref value="" class="form-control" placeholder="Referral Bonus" required="required">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group"> 
                                                            <input  type=text name=min class="form-control" placeholder="Min" required="required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> 
                                                            <input id="password" type=text name=max value="" class="form-control" placeholder="Max" required="required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type=text class="form-control" size=30 name="percentage"  placeholder="Percentage">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select  name="compound_id" class="form-control">
                                                                <option value="" selected disabled>Select Compound</option>
                                                                <?php $__currentLoopData = $compounds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compound): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($compound->id); ?>"> <?php echo e($compound->name); ?> </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                                        <th>Name</th>
                                                        <th>Min</th>
                                                        <th>Max</th>
                                                        <th>Percentage</th>
                                                        <th>Referral Bonus</th>
                                                        <th>Compound</th>
                                                        <th>Date Created</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($plan->name); ?></td>
                                                        <td><?php if($plan->name == 'PLAN 6'): ?> <?php echo e($plan->min); ?> BTC   <?php else: ?> $<?php echo e($plan->min); ?> <?php endif; ?></td>
                                                        <td> <?php if($plan->name == 'PLAN 6'): ?> <?php echo e($plan->max); ?> BTC   <?php else: ?> $<?php echo e($plan->max); ?> <?php endif; ?></td>
                                                        <td><?php echo e($plan->percentage); ?>%</td>
                                                        <td><?php echo e($plan->ref); ?>%</td>
                                                        <td><?php echo e($plan->compound->name); ?></td>
                                                        <td><?php echo e(date('F d, Y', strtotime($plan->created_at))); ?></td>
                                                        <td style='white-space: nowrap'>
                                                            <button type="button" class="" data-toggle="modal" data-target="#edit<?php echo e($plan->id); ?>">
                                                                <i class="fa fa-edit text-success"></i>
                                                            </button>

                                                            <form  class="deleted" style="display: inline-block!important"  role="form" method="POST"
                                                                   action="<?php echo e(route('delete-plan',['id'=>$plan->id])); ?>" >
                                                                <?php echo csrf_field(); ?>   
                                                                <button type="submit"class="">
                                                                    <i class="fa fa-trash text-danger"></i>
                                                                </button>
                                                            </form> 

                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <div class="modal fade" id="edit<?php echo e($plan->id); ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Plan - <?php echo e($plan->name); ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form class="" method="Post" action="<?php echo e(route('edit-plan',['id'=>$plan->id])); ?>">
                                                                    <?php echo csrf_field(); ?>  
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" name="name" value="<?php echo e($plan->name); ?>" class="form-control" placeholder="Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Referral Bonus</label>
                                                                        <input type="text" name="ref" value="<?php echo e($plan->ref); ?>" class="form-control" placeholder="Referral Bonus">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Min</label>
                                                                        <input type="text" name="min" value="<?php echo e($plan->min); ?>" class="form-control" placeholder="Min">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Max</label>
                                                                        <input type="text" name="max" value="<?php echo e($plan->max); ?>" class="form-control" placeholder="Max">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Percentage</label>
                                                                        <input type="text" name="percentage" value="<?php echo e($plan->percentage); ?>" class="form-control" placeholder="Percentage">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">Compound</label>

                                                                        <select  name="compound_id" class="form-control">
                                                                            <option value="" selected disabled>Select Compund</option>
                                                                            <?php $__currentLoopData = $compounds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compound): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($compound->id); ?>" <?php echo e($plan->compound_id == $compound->id ? 'selected' : ''); ?>> <?php echo e($compound->name); ?> </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <div class="text-center ">
                                                    <h5 class="grey-text">No Plan created yet.</h5>
                                                    <img src="<?php echo e(asset('images/empty.png')); ?>" style="width: 80px;height: 80px">
                                                </div>

                                                <?php endif; ?>
                                                <th>Name</th>
                                                <th>Min</th>
                                                <th>Max</th>
                                                <th>Percentage</th>
                                                <th>Referral Bonus</th>
                                                <th>Compound</th>
                                                <th>Date Created</th>
                                                <th>Actions</th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                            <?php echo e($plans->appends($_GET)->links()); ?>

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

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/admin/plan.blade.php ENDPATH**/ ?>