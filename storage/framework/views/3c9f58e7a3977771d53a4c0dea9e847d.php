<?php $__env->startSection('content'); ?>
    <!-- Basic Layout -->
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Loan</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('add_loan')); ?>" method="POST" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <div class="row">



                            <div class="col-sm-6">
                                <div class="mb-6">
                                    <label for="user" class="form-label">User</label>
                                    <select class="form-select" id="user" name="user" aria-label="Select user"
                                        required>
                                        <option value="">Select user</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>" <?php if(old('user') == $user->id): echo 'selected'; endif; ?>>
                                                <?php echo e($user->name); ?> - <?php echo e($user->phone_number); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="amount">Amount <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="amount2" class="input-group-text"><i
                                                class="icon-base ti tabler-currency-rupee"></i></span>
                                        <input type="text" class="form-control" id="amount" name="amount"
                                            placeholder="Amount" aria-label="Amount" required value="<?php echo e(old('amount')); ?>"
                                            aria-describedby="amount2" />
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
                                    <label class="form-label" for="commission_amount">Commission Amount <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="commission_amount2" class="input-group-text"><i
                                                class="icon-base ti tabler-currency-rupee"></i></span>
                                        <input type="text" class="form-control" id="commission_amount"
                                            name="commission_amount" placeholder="Commission Amount"
                                            aria-label="Commission Amount" required value="<?php echo e(old('commission_amount')); ?>"
                                            aria-describedby="commission_amount2" />
                                    </div>
                                    <?php $__errorArgs = ['commission_amount'];
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/loans/add.blade.php ENDPATH**/ ?>