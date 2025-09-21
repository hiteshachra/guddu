<?php $__env->startSection('content'); ?>
    <!-- Basic Layout -->
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Package</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('add_package')); ?>" method="POST" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="name">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="name2" class="input-group-text"><i
                                                class="icon-base ti tabler-package"></i></span>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="First Package" aria-label="First Package"
                                            value="<?php echo e(old('name')); ?>" aria-describedby="name2" />
                                    </div>
                                    <?php $__errorArgs = ['name'];
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



                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="gst">GST %<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="gst2" class="input-group-text"><i
                                                class="icon-base ti tabler-coin-rupee"></i></span>
                                        <input type="number" id="gst" name="gst"
                                            class="form-control gst-mask" placeholder="12"
                                            aria-label="12" aria-describedby="gst2" required
                                            value="<?php echo e(old('gst')); ?>" />
                                    </div>
                                    <?php $__errorArgs = ['gst'];
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


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="amount">Amount %<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="amount2" class="input-group-text"><i
                                                class="icon-base ti tabler-coin-rupee"></i></span>
                                        <input type="number" id="amount" name="amount"
                                            class="form-control amount-mask" placeholder="12"
                                            aria-label="12" aria-describedby="amount2" required
                                            value="<?php echo e(old('amount')); ?>" />
                                    </div>
                                    <?php $__errorArgs = ['amount'];
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

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="comission_amount">Comission Amount<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="comission_amount2" class="input-group-text"><i
                                                    class="icon-base ti tabler-coin-rupee"></i></span>
                                            <input type="number" id="comission_amount" name="comission_amount"
                                                class="form-control comission_amount-mask" placeholder="12"
                                                aria-label="12" aria-describedby="comission_amount2" required
                                                value="<?php echo e(old('comission_amount')); ?>" />
                                        </div>
                                        <?php $__errorArgs = ['comission_amount'];
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



                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="image"
                                        name="image" accept="image/*" />
                                </div>
                                <?php $__errorArgs = ['image'];
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




                            <div class="col-sm-12">
                                <div class="mb-6">
                                    <label class="form-label" for="description">Description<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <textarea id="description" name="description" class="form-control" placeholder="description" aria-label="description"
                                            aria-describedby="description2"><?php echo e(old('description')); ?></textarea>
                                    </div>
                                    <?php $__errorArgs = ['description'];
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

                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/courses/packages/add.blade.php ENDPATH**/ ?>