<?php $__env->startSection('content'); ?>
<!-- Basic Layout -->
<div class="row mb-6 gy-6">
    <div class="col-xl">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add Business Category</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('add_business_category')); ?>" method="POST" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="mb-6">
                                <label for="package" class="form-label">Package<span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="package" name="package"
                                    aria-label="Select Package" required>
                                    <option value="">Select Package</option>
                                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($package->id); ?>" <?php if(old('package_id') == $package->id): echo 'selected'; endif; ?>>
                                            <?php echo e($package->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['package_id'];
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

                        <div class="col-sm-3">
                            <div class="mb-6">
                                <label for="document_type" class="form-label">Document Type<span
                                        class="text-danger">*</span></label>
                                <select class="selectpicker w-100" id="document_type" name="document_type[]"
                                    data-style="btn-default" multiple data-icon-base="icon-base ti"
                                    data-tick-icon="tabler-check text-white" required>
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($document->id); ?>" <?php if(in_array($document->id,old('document_type'))): echo 'selected'; endif; ?>>
                                            <?php echo e($document->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['document_type'];
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




                        <div class="col-sm-3">
                            <div class="mb-6">
                                <label class="form-label" for="name">Name <span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="name2" class="input-group-text"><i
                                            class="icon-base ti tabler-package"></i></span>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="First Category" aria-label="First Category"
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
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image"
                                    accept="image/*" />
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
                                    <textarea id="description" name="description" class="form-control" placeholder="Description" aria-label="Description"
                                        aria-describedby="Description"><?php echo e(old('description')); ?></textarea>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/courses/business_category/add.blade.php ENDPATH**/ ?>