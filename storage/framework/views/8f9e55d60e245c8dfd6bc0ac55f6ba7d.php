
<?php $__env->startSection('content'); ?>
<div class="row mb-6 gy-6">
    <div class="col-xl">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit FAQ</h5>
            </div>
            <div class="card-body">
                <form id="addContent" action="<?php echo e(route('update_faq',[$faq->id])); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-sm-10 mb-6">
                                <label class="form-label" for="question">Title <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="title2" class="input-group-text"><i class="icon-base ti tabler-package"></i></span>
                                    <input type="text" class="form-control" id="question" name="question" placeholder="Enter question" aria-label="Enter question" value="<?php echo e(old('question', $faq->question)); ?>" />
                                </div>
                                <?php $__errorArgs = ['question'];
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

                        <div class="col-sm-2 mb-6">
                                <label class="form-label" for="order_by">Order By <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="title2" class="input-group-text"><i class="icon-base ti tabler-sort-ascending-numbers"></i></span>
                                    <input type="number" class="form-control" id="order_by" name="order_by" placeholder="Enter order by" aria-label="Enter order by" value="<?php echo e(old('order_by', $faq->order_by)); ?>" />
                                </div>
                                <?php $__errorArgs = ['order_by'];
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
                        <textarea name="answer" id="answer" style="display: none;"></textarea>

                        <div class="col-sm-12">
                            <div class="mb-6">
                                <label class="form-label" for="answer">Answer<span class="text-danger">*</span></label>
                                <div id="full-editor"> <?php echo old('answer', $faq->answer); ?> </div>
                                <?php $__errorArgs = ['answer'];
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
<?php $__env->startPush('scripts'); ?>
    <script>
        var fullEditor = new Quill('#full-editor', {
            bounds: '#full-editor',
            placeholder: 'Type Something...',
            modules: {
                syntax: true,
                toolbar: fullToolbar
            },
            theme: 'snow'
        });

        $('#addContent').on('submit', function () {
            const html = fullEditor.root.innerHTML;
            $('#answer').val(html);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/setting/faq/edit_faq.blade.php ENDPATH**/ ?>