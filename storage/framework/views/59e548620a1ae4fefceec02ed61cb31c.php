<?php $__env->startSection('content'); ?>
    <div class="card p-6 mb-6">
        <div class="row gy-6">

            <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md">
                    <div class="form-check custom-option custom-option-icon <?php echo e($step->status == 'Completed' ? 'checked' : ''); ?> checked"
                        <?php if($step->status != 'Completed'): ?> style="border-color: #82808b" <?php endif; ?>>
                        <label class="form-check-label custom-option-content" for="customRadioIcon1">
                            <span class="custom-option-body">
                                <i class="icon-base ti tabler-<?php echo e($step->icon); ?>"></i>
                                <span class="custom-option-title mb-2"> <?php echo e($step->step); ?> </span>
                            </span>
                            <input name="customDeliveryRadioIcon" class="form-check-input" type="checkbox" value=""
                                id="customRadioIcon1" <?php echo e($step->status == 'Completed' ? 'checked' : ''); ?> disabled
                                style="opacity: unset;" />
                        </label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="row mb-6 g-6">
        <div class="col-12 col-xl-4 col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="bg-label-primary rounded-3 text-center mb-4 pt-6">
                        <?php if($package != null): ?>
                            <img class="img-fluid"
                                src="<?php echo e(asset('categories_images/' . $package->business_category->image)); ?>"
                                alt="Card package image" width="140">
                        <?php else: ?>
                            <img class="img-fluid" src="<?php echo e(asset('assets/img/illustrations/girl-with-laptop.png')); ?>"
                                alt="Card girl image" width="140">
                        <?php endif; ?>

                    </div>
                    <h5 class="mb-2">
                        <?php if($package != null): ?>
                            <?php echo e($package->business_category->name); ?>

                        <?php else: ?>
                            No Package Found
                        <?php endif; ?>
                    </h5>
                    <p class="small">
                        <?php if($package != null): ?>
                            <?php echo $package->business_category->description; ?>

                        <?php else: ?>
                            Buy Package to boost your business.
                        <?php endif; ?>
                    </p>

                    <div class="row mb-4 g-3">
                        <?php if($package != null): ?>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="icon-base ti tabler-calendar-event icon-28px"></i></span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap"><?php echo e($package->business_category->created_at); ?></h6>
                                        <small>Date</small>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    <?php if($package == null): ?>
                        <div class="col-12 text-center">
                            <a href="<?php echo e(route('user_packages_list')); ?>"
                                class="btn btn-primary w-100 d-grid waves-effect waves-light">Buy Now</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/dashboard/user.blade.php ENDPATH**/ ?>