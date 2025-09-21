<?php $__env->startSection('content'); ?>
    <h4 class="mb-1">Forgot Password? 🔒</h4>
    <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
    <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert"> <?php echo e(session('status')); ?> </div>
    <?php endif; ?>
    <form class="mb-6 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-6 form-control-validation fv-plugins-icon-container">
            <label for="email" class="form-label"><?php echo e(__('Email Address')); ?></label>
            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
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
        <button type="submit" class="btn btn-primary d-grid w-100 waves-effect waves-light"><?php echo e(__('Send Password Reset Link')); ?></button>
    <input type="hidden"></form>
    <div class="text-center">
        <a href="<?php echo e(url('login')); ?>" class="d-flex justify-content-center">
        <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
        Back to login
        </a>
    </div>
       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>