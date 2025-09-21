<?php $__env->startSection('content'); ?>
<!-- /Logo -->
<h4 class="mb-1">Registration Verify 🚀</h4>

<form id="formAuthentication" class="mb-6" method="POST" action="<?php echo e(route('register.create')); ?>">
    <?php echo csrf_field(); ?>

    <div class="mb-6 form-control-validation">
        <label for="phone_number" class="form-label"><?php echo e(__('Phone Number')); ?></label>
        <input type="tel" id="phone_number" name="phone_number" placeholder="Enter your phone number" class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(session('otp_phone')); ?>" readonly="readonly"/>
        <?php $__errorArgs = ['phone_number'];
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

    <div class="mb-6 form-control-validation">
        <label for="otp" class="form-label"><?php echo e(__('OTP')); ?></label>
        <input type="number" id="otp" class="form-control <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="otp" placeholder="Enter OTP" />
        <?php $__errorArgs = ['otp'];
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


   
    <div class="my-8 form-control-validation">
      <div class="form-check mb-0 ms-2">
        <input class="form-check-input <?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" id="terms-conditions" name="terms" checked readonly="readonly"/>
        <label class="form-check-label" for="terms-conditions">
          I agree to
          <a href="javascript:void(0);">privacy policy & terms</a>
        </label>
        <?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <div data-field="terms" data-validator="notEmpty">Please agree to terms &amp; conditions</div>
        </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>
    <button class="btn btn-primary d-grid w-100"><?php echo e(__('Verify Account')); ?></button>
</form>

<p class="text-center">
<span>Already have an account?</span>
<a href="<?php echo e(url('login')); ?>">
  <span>Sign in instead</span>
</a>
</p>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app_auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/auth/verify-register.blade.php ENDPATH**/ ?>