<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="chat-message <?php echo e(Auth::user()->id == $message->user_id? 'chat-message-right':''); ?>">
        <div class="d-flex overflow-hidden">
            <div class="chat-message-wrapper flex-grow-1">
                <?php if(!empty($message->file)): ?>  
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <img src="<?php echo e(asset('follow_ups_doc/'.$message->file)); ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img">
                </div>
                <?php endif; ?>
                <div class="chat-message-text">
                    <p class="mb-0"><?php echo e($message->message); ?></p>
                </div>
                <div class="text-end text-body-secondary mt-1">
                    <small><?php echo e($message->created_at); ?></small>
                </div>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/CRM/leads/partials/follow-up-messages.blade.php ENDPATH**/ ?>