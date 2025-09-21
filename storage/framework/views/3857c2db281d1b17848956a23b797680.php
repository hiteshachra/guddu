<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-xl-4 col-md-6">
    <div class="card p-0">
        <div class="card-body p-0">
            <div class="img-sec w-100">
                <a href="<?php echo e(route('blog_details', [$blog->slug])); ?>">
                    <img src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt="<?php echo e($blog->title); ?>" class="img-fluid rounded-top w-100"></a>
                <div class="image-tag d-flex justify-content-end align-items-center">
                    <span class="trend-tag"><?php echo e($blog->category->name); ?></span>
                </div>
            </div>
            <div class="p-3">
                <div class="d-flex align-items-center mb-3  ">
                    <div class="d-flex align-items-center border-end pe-2">
                        <span class="avatar avatar-sm me-2">
                            <img src="<?php echo e(asset('images/user-1.svg')); ?>" class="rounded-circle" alt="user">
                        </span>
                        <h6 class="fs-14 text-gray-6">Admin</h6>
                    </div>
                    <div class="d-flex align-items-center ps-2">
                        <span><i class="ti ti-calendar me-2"></i></span>
                        <span class="fs-14"><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('d M, Y')); ?></span>
                    </div>
                </div>
                <div>
                    <h6 class="fs-16 text-truncate mb-1"><a href="<?php echo e(route('blog_details', [$blog->slug])); ?>"><?php echo e(Str::limit($blog->title, 50, '...')); ?></a></h6>
                    <p class="fs-14"><?php echo e(Str::limit($blog->title, 100, '...')); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\sgitsss\guddu\resources\views/blog-items.blade.php ENDPATH**/ ?>