<?php $__env->startSection('content'); ?>
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Blog</h5>
                </div>
                <div class="card-body">
                    <form id="addBlog" action="<?php echo e(route('blog_store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row"> 

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="category" class="form-label">Category<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select select2" id="category" name="category"
                                        aria-label="Select Category" required>
                                        <option value="">Select Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php if(old('category') == $category->id): echo 'selected'; endif; ?>>
                                                <?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['category'];
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
                                    <label for="image" class="form-label">Image<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="image" name="image" />
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
                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                    <select class="selectpicker w-100" data-style="btn-default" id="status" name="status" data-placeholder="Select Status" required>
                                        <option value="Pending" <?php if(old('status') == 'Pending'): echo 'selected'; endif; ?>>Pending</option>
                                        <option value="Schedule" <?php if(old('status') == 'Schedule'): echo 'selected'; endif; ?>>Schedule</option>
                                        <option value="Publish" <?php if(old('status') == 'Publish'): echo 'selected'; endif; ?>>Publish</option>
                                        <option value="Unpublish" <?php if(old('status') == 'Unpublish'): echo 'selected'; endif; ?>>Unpublish</option>
                                    </select>
                                    <?php $__errorArgs = ['category'];
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
                            
                            <div class="col-sm-3" id="div_schedule_date"  <?php if(old('status') == 'Schedule'): ?> <?php else: ?> style="display: none;" <?php endif; ?>>
                                <div class="mb-6">
                                    <label for="schedule_date" class="form-label">Schedule Date<span class="text-danger">*</span></label>
                                    <input class="form-control" type="datetime-local" id="schedule_date" name="schedule_date" value="<?php echo e(old('schedule_date', now())); ?>" />
                                </div>
                                <?php $__errorArgs = ['schedule_date'];
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
                                    <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="title2" class="input-group-text"><i class="icon-base ti tabler-package"></i></span>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="First Course" aria-label="First Course" value="<?php echo e(old('title')); ?>" aria-describedby="title2" />
                                    </div>
                                    <?php $__errorArgs = ['title'];
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
   
                            <textarea name="content" id="content" style="display: none;"></textarea>

                            <div class="col-sm-12">
                                <div class="mb-6">
                                    <label class="form-label" for="content">Content<span class="text-danger">*</span></label>
                                    <div id="full-editor"> <?php echo old('content'); ?> </div>
                                    <?php $__errorArgs = ['content'];
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
        
        $('#status').on('change', function (e) {
            $('#div_schedule_date').hide();
            if($('#status').val() == 'Schedule') {
                $('#div_schedule_date').show();
            }
        });

        var fullEditor = new Quill('#full-editor', {
            bounds: '#full-editor',
            placeholder: 'Type Something...',
            modules: {
                syntax: true,
                toolbar: fullToolbar
            },
            theme: 'snow'
        });

        $('#addBlog').on('submit', function () {
            const html = fullEditor.root.innerHTML;
            $('#content').val(html);
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/blog/add.blade.php ENDPATH**/ ?>