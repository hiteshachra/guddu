<?php $__env->startSection('content'); ?>
<style>
  #iframeViewer, #videoPlayer {
    width: 100%;
    height: 500px;
    border: none;
    display: none;
  }

  .modal-dialog {
    max-width: 800px;
  }
  
    #download, #print {
        display: none !important;
    }
</style>


    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">


            <?php if(count($courses) > 0): ?>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-xxl-4 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="bg-label-primary rounded text-center mb-4 pt-4">
                                    <img <?php if($course->thumbnail != null): ?> src="<?php echo e(asset('course_file/thumbnail/' . $course->thumbnail)); ?>"
                          <?php else: ?>
                            src="<?php echo e(asset('assets/img/illustrations/girl-with-laptop.png')); ?>" <?php endif; ?>
                                        alt="Course Image" width="140" height="200px" />
                                </div>
                                <h5 class="mb-2"><?php echo e($course->title); ?></h5>

                                <div class="row mb-4 g-3">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-initial rounded bg-label-primary"><i
                                                        class="icon-base ti tabler-calendar-event icon-28px"></i></span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-nowrap"><?php echo e($course->created_at); ?></h6>
                                                <small>Date</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button type="button" onclick="openCourse('<?php echo e($course->file_type); ?>','<?php echo e($course->path); ?>', '<?php echo e($course->title); ?>', '<?php echo e($course->description); ?>')" class="btn btn-primary w-100">View</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="text-center img-fluid">
                    <img src="<?php echo e(asset('assets/img/course-not-found.jpg')); ?>" alt="No Courses Found" width="auto">

                </div>
            <?php endif; ?>


        </div>
    </div>
    <!--/ Content -->


    <div class="modal fade" id="courseModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rounded-top">
                        <div id="pdfLoader">Loading PDF, please wait...</div>
                        <div id="iframeViewer"></div>
                        <video id="videoPlayer" controls  controlsList="nodownload"  oncontextmenu="return false;" style="height: auto;"></video>
                        <div id="ModalDescription"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.3.1/pdfobject.js"></script>
    
    <script>
        function openCourse(type, path, title, description) {
         
            $('#ModalLabel').text(title);
            $('#ModalDescription').html(description);

            const iframe = document.getElementById("iframeViewer");
            const video = document.getElementById("videoPlayer");

            iframe.style.display = "none";
            video.style.display = "none";
            iframe.src = "";
            video.src = "";

            // Show modal first
            const $modal = $('#courseModal');
            $modal.modal('show');

            // After modal is shown, load the content
            $modal.off('shown.bs.modal').on('shown.bs.modal', function () {
                if (type === 'video_url') {
                    video.src = path;
                    video.style.display = "block";
                    document.getElementById('pdfLoader').style.display = 'none';
                } else if (type === 'pdf_url') {
                    PDFObject.embed(path + '#toolbar=0', "#iframeViewer");
                    iframe.style.display = "block";
                    document.getElementById('pdfLoader').style.display = 'block';
                    const checkIframeLoaded = () => {
                        const iframe = document.querySelector("#iframeViewer iframe");
                        if (iframe) {
                            iframe.onload = () => {
                                document.getElementById('pdfLoader').style.display = 'none';
                            };
                        } else {
                            setTimeout(checkIframeLoaded, 100);
                        }
                    };

                    checkIframeLoaded();
                } else if (type === 'video') {
                    const fullPath = '<?php echo e(asset("course_file")); ?>/' + path;
                    console.log(fullPath);
                    video.src = fullPath;
                    video.style.display = "block";
                    document.getElementById('pdfLoader').style.display = 'none';
                } else if (type === 'pdf') {
                    document.getElementById('pdfLoader').style.display = 'block';
                    const fullPath = '<?php echo e(asset("course_file")); ?>/' + path + '#toolbar=0';
                    PDFObject.embed(fullPath, "#iframeViewer");
                    iframe.style.display = "block";
                    const checkIframeLoaded = () => {
                        const iframe = document.querySelector("#iframeViewer iframe");
                        if (iframe) {
                            iframe.onload = () => {
                                document.getElementById('pdfLoader').style.display = 'none';
                            };
                        } else {
                            setTimeout(checkIframeLoaded, 100);
                        }
                    };

                    checkIframeLoaded();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/courses/user_courses.blade.php ENDPATH**/ ?>