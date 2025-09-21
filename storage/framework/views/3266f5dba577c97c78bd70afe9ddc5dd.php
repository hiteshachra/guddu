<?php $__env->startSection('content'); ?>
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Course</h5>
                </div>
                <div class="card-body">
                    <form id="addCourse" action="<?php echo e(route('add_course')); ?>" method="POST" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>


                        <div class="row">


                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label for="category" class="form-label">Category<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="category" name="category" aria-label="Select Category"
                                        required>
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

                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label class="form-label" for="title">Title <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="title2" class="input-group-text"><i
                                                class="icon-base ti tabler-package"></i></span>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="First Course" aria-label="First Course" value="<?php echo e(old('title')); ?>"
                                            aria-describedby="title2" />
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

                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label for="thumbnail" class="form-label">Thumbnail Image<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="thumbnail" name="thumbnail" />
                                </div>
                                <?php $__errorArgs = ['thumbnail'];
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

                            <div class="col-sm-4">
                                <div class="mb-6">
                                    <label for="file_type" class="form-label">File Type<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="file_type" name="file_type"
                                        aria-label="Select File Type" required onchange="changeFileType(this.value)">
                                        <option value="pdf" <?php if(old('file_type') == 'pdf'): echo 'selected'; endif; ?>>PDF</option>
                                        <option value="pdf_url" <?php if(old('file_type') == 'pdf_url'): echo 'selected'; endif; ?>>PDF URL</option>
                                        <option value="video" <?php if(old('file_type') == 'video'): echo 'selected'; endif; ?>>Video</option>
                                        <option value="video_url" <?php if(old('file_type') == 'video_url'): echo 'selected'; endif; ?>>Video URL</option>
                                    </select>
                                    <?php $__errorArgs = ['file_type'];
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

                            <div class="col-sm-4" id="path_file">
                                <div class="mb-6">
                                    <label for="file_upload" class="form-label">File<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="file_upload" name="file_upload" />
                                </div>
                                <?php $__errorArgs = ['file_upload'];
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

                            <div class="col-sm-12" id="path_url" style="display: none;">
                                <div class="mb-6">
                                    <label class="form-label" for="path">Path<span class="text-danger">*</span>
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="path" name="path"
                                            placeholder="Padth to PDF or Video" aria-label="Padth to PDF or Video"
                                            value="<?php echo e(old('path')); ?>" aria-describedby="path2" />
                                    </div>
                                    <?php $__errorArgs = ['path'];
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

                            <textarea name="description" id="description" style="display: none;"></textarea>


                            <div class="col-sm-12">
                                <div class="mb-6">
                                    <label class="form-label" for="description">Description<span
                                            class="text-danger">*</span>
                                        <span class="text-danger">*</span></label>
                                    <div id="full-editor">
                                        <?php echo old('description'); ?>

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
<?php $__env->startPush('scripts'); ?>
    <script>
        function changeFileType(type) {
            if (type == 'pdf' || type == 'video') {
                $('#path_file').show();
                $('#path_url').hide();
            } else if (type == 'pdf_url' || type == 'video_url') {
                $('#path_file').hide();
                $('#path_url').show();
            }
        }

        var fullEditor = new Quill('#full-editor', {
            bounds: '#full-editor',
            placeholder: 'Type Something...',
            modules: {
                syntax: true,
                toolbar: fullToolbar
            },
            theme: 'snow'
        });

        $('#addCourse').on('submit', function() {
            const html = fullEditor.root.innerHTML;
            $('#description').val(html);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/courses/courses/add.blade.php ENDPATH**/ ?>