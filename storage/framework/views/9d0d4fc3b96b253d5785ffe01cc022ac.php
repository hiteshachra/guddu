<?php $__env->startSection('content'); ?>
    <!-- Basic Layout -->
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Configuration</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('update_config')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="<?php echo e($value->name); ?>"><?php echo e($value->title); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="<?php echo e($value->name); ?>" name="<?php echo e($value->name); ?>" placeholder="Enter <?php echo e($value->title); ?>" aria-label="Enter <?php echo e($value->title); ?>" value="<?php echo e($value->value); ?>" aria-describedby="name2" />
                                    <?php $__errorArgs = [$value->name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/setting/update_config.blade.php ENDPATH**/ ?>