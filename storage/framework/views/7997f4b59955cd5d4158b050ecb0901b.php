<?php $__env->startSection('content'); ?>
    <!-- Basic Layout -->
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Document Type</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('add_document_type')); ?>" method="POST">

                        <?php echo csrf_field(); ?>
                        <div class="row">


                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label for="business_category" class="form-label">Business Category<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="business_category" name="business_category"
                                        aria-label="Business Category" required>
                                        <option value="">Business Category</option>
                                        <?php $__currentLoopData = $businessCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php if(old('business_category') == $category->id): echo 'selected'; endif; ?>>
                                                <?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    <?php $__errorArgs = ['business_category'];
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


                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="name2" class="input-group-text"><i
                                                class="icon-base ti tabler-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" aria-label="Name" required value="<?php echo e(old('name')); ?>"
                                            aria-describedby="name2" />
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




                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label for="document_type" class="form-label">Type<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="document_type" name="document_type"
                                        aria-label="Select Type" required>
                                        <option value="">Select Type</option>
                                        <option value="image" <?php if(old('document_type') == 'image'): echo 'selected'; endif; ?>>Image</option>
                                        <option value="pdf" <?php if(old('document_type') == 'pdf'): echo 'selected'; endif; ?>>Pdf</option>
                                    </select>
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
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/Document/Type/add.blade.php ENDPATH**/ ?>