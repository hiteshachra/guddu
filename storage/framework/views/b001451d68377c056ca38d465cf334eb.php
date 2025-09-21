
<?php $__env->startSection('content'); ?>
<?php
    $blogImage = asset('blog/'.$blog->image);
?>
<!--==================================================-->
<!-- Start Consalt Breadcumb Area -->
<!--==================================================-->
<div class="breadcumb-area d-flex style_two" style="background: url('<?php echo e($blogImage); ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 text-center">
				<div class="breadcumb-content style_two">
					<span class="category"><?php echo e($blog->category->name); ?></span>
					<div class="breadcumb-title style_two style_three">
						<h4><?php echo e($blog->title); ?></h4>
					</div>
					<div class="breadcumb_meta-blog">
						<p><span><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('d M, Y')); ?></span> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Consalt Breadcumb Area -->
<!--==================================================-->

<!--==================================================-->
<!-- Start Consalt Service Details Area -->
<!--==================================================-->
<section class="portfolio_details pb-0">
	<div class="container">
		<div class="port_main style_two">
			<?php echo $blog->content; ?>

            
			
		</div>
	</div>
</section>
<!--==================================================-->
<!-- End Consalt Service Details Area -->
<!--==================================================-->

<!--==================================================-->
<!-- Start Consalt Blog Area -->
<!--==================================================-->
<section class="blog_area inner_page two pt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section_title text-center">
					<h1>Related Blog Post</h1>
				</div>
			</div>		
		</div>
		<div class="row">
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
		</div>
	</div>
</section>
<!--==================================================-->
<!-- End Consalt Blog Area -->
<!--==================================================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_front', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/blog-details.blade.php ENDPATH**/ ?>