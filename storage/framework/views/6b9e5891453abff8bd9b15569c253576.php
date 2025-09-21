<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-4 col-md-6">
    <div class="single-blog-box">
        <div class="single-blog-thumb">
            <img src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt="<?php echo e($blog->title); ?>"> 						
        </div>
        <div class="blog-content">
            <div class="meta-blog">
                <p><span class="solution"><?php echo e($blog->category->name); ?></span><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('d M, Y')); ?></p>
            </div>
            <div class="blog-title">
                <h3><a href="<?php echo e(route('blog_details', [$blog->slug])); ?>"><?php echo e(Str::limit($blog->title, 50, '...')); ?></a></h3>
            </div>
            <div class="blog_btn">
                <a href="<?php echo e(route('blog_details', [$blog->slug])); ?>">Read More <i class="flaticon flaticon-right-arrow"></i></a>
            </div>
        </div>
    </div>
</div>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/blog-items.blade.php ENDPATH**/ ?>