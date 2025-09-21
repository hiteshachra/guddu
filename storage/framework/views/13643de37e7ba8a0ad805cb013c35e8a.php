<?php $__env->startSection('content'); ?>
    <!-- Basic Layout -->
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Lead</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('add_lead')); ?>" method="POST" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <div class="row">




                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="name">Name <span
                                            class="text-danger">*</span></label>
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


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="email">Email <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="email2" class="input-group-text"><i
                                                class="icon-base ti tabler-mail"></i></span>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Email" aria-label="Email" required value="<?php echo e(old('email')); ?>"
                                            aria-describedby="email2" />
                                    </div>
                                    <?php $__errorArgs = ['email'];
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
                                    <label class="form-label" for="phone">Phone <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="phone2" class="input-group-text"><i
                                                class="icon-base ti tabler-phone"></i></span>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Phone" aria-label="Phone" required value="<?php echo e(old('phone')); ?>"
                                            aria-describedby="phone2" />
                                    </div>
                                    <?php $__errorArgs = ['phone'];
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
                                    <label class="form-label" for="company_name">Company Name</label>
                                    <div class="input-group input-group-merge">
                                        <span id="company_name2" class="input-group-text"><i
                                                class="icon-base ti tabler-components"></i></span>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                            placeholder="Company Name" aria-label="Company Name"
                                            value="<?php echo e(old('company_name')); ?>" aria-describedby="company_name2" />
                                    </div>
                                    <?php $__errorArgs = ['company_name'];
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

                            <div class="col-sm-12">
                                <div class="mb-6">
                                    <label class="form-label" for="address">Address</label>
                                    <div class="input-group">
                                        <textarea id="address" name="address" class="form-control" placeholder="Address" aria-label="address"
                                            aria-describedby="Address"><?php echo e(old('address')); ?></textarea>
                                    </div>
                                    <?php $__errorArgs = ['address'];
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
                                    <label for="lead_source" class="form-label">Lead Source<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="lead_source" name="lead_source"
                                        aria-label="Select Lead Source" required>
                                        <option value="">Select Lead Source</option>
                                        <option value="Website">Website</option>
                                        <option value="Referral">Referral</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <?php $__errorArgs = ['lead_source'];
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



                            <div class="col-sm-12">
                                <div class="mb-6">
                                    <label class="form-label" for="description">Description</label>
                                    <div class="input-group">
                                        <textarea id="description" name="description" class="form-control" placeholder="Description"
                                            aria-label="Description" aria-describedby="Description"><?php echo e(old('description')); ?></textarea>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/CRM/leads/add.blade.php ENDPATH**/ ?>