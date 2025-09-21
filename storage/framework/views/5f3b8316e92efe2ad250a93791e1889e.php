<?php $__env->startSection('content'); ?>

<h4 class="mb-1">Reset Password 🔒</h4>
<p class="mb-6"><span class="fw-medium">Your new password must be different from previously used passwords</span></p>
<form  method="POST" action="<?php echo e(route('password.update')); ?>" class="fv-plugins-bootstrap5 fv-plugins-framework">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="token" value="<?php echo e($token); ?>">
    <div class="mb-6 form-control-validation fv-plugins-icon-container">
        <label for="email" class="form-label"><?php echo e(__('Email Address')); ?></label>
        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" autofocus readonly>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty"><?php echo e($message); ?></div>
            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
        <label class="form-label" for="password">New Password</label>
        <div class="input-group input-group-merge has-validation">
            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"  placeholder="············" aria-describedby="password" autocomplete="new-password">
            <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
        </div>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty"><?php echo e($message); ?></div>
            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
        <label class="form-label" for="confirm-password">Confirm Password</label>
        <div class="input-group input-group-merge has-validation">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="············" aria-describedby="password" autocomplete="new-password">
            <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
        </div>
    </div>
    <button type="submit" class="btn btn-primary d-grid w-100 mb-6 waves-effect waves-light">Set new password</button>
    <div class="text-center">
    <a href="<?php echo e(url('login')); ?>" class="d-flex justify-content-center">
        <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
        Back to login
    </a>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>