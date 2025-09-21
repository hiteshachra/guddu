<?php $__env->startSection('title', 'User List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mb-6">

        <?php $__currentLoopData = $userDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-3 col-lg-3 col-sm-4 mb-6">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="mb-4 text-heading icon-base ti tabler-<?php echo e($document->document_type->type == 'pdf' ? 'file-type-pdf' : 'photo-scan'); ?> icon-32px"></i>
                        <h5><?php echo e($document->document_type->name); ?></h5>

                            <p>Document Name : <?php echo e($document->name ?? '-'); ?></p>
                            <?php if($document->status == 'Not Approved'): ?>
                            <button type="button" class="btn btn-primary" onclick="openUploadModal('<?php echo e($document->id); ?>')">
                                Upload
                            </button>
                            <?php endif; ?>

                            <?php if($document->path != null): ?>
                            <a href="<?php echo e(asset('user_documents/' . $document->path)); ?>" download
                                class="btn btn-primary">Show</a>
                                <?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>




    <div class="modal fade" id="documentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-pricing">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="rounded-top">
                        <form action="<?php echo e(route('user_documents_list')); ?>" method="post" enctype="multipart/form-data">
                            <div class="row gy-4">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="document_id" id="document_id" value="<?php echo e(old('document_id')); ?>">
                                <div class="col-sm-12">
                                    <div class="mb-6">
                                        <label class="form-label" for="name">Document Name <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="name2" class="input-group-text"><i
                                                    class="icon-base ti tabler-file"></i></span>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Document Name" aria-label="Document Name" required
                                                value="<?php echo e(old('name')); ?>" aria-describedby="name2" />
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


                                <div class="col-sm-12">
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

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary" >
                                    Upload
                                </button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/ Content -->


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    function openUploadModal(id){
        $('#document_id').val(id);
        $('#documentModal').modal('show');
    }
</script>


<?php if($errors->any()): ?>
    <script>
        $('#documentModal').modal('show');
    </script>
<?php endif; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/user_documents_list.blade.php ENDPATH**/ ?>