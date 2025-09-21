<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="breadcrumb-title mb-2">Blog Details</h2>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb justify-content-center mb-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><i class="ti ti-home-2"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog Details</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="breadcrumb-bg">
			<img src="<?php echo e(asset('front/assets/img/bg/bg-07.webp')); ?>" class="breadcrumb-bg-1" alt="">
			<img src="<?php echo e(asset('front/assets/img/bg/bg-07.webp')); ?>" class="breadcrumb-bg-2" alt="">
		</div>
	</div>
</div>
<!-- /Breadcrumb -->
<div class="page-wrapper">
	<div class="content">
		<div class="container">					
			<div class="row">
				<div class="col-lg-8 col-md-12 blog-details">
					<div class="blog-head">
						<div class="blog-category">
							<ul>
								<li><span class="badge badge-light text-dark"><?php echo e($blog->category->name); ?></span></li>
								<li><i class="feather-calendar me-1"></i><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('d M, Y')); ?></li>
								<li>
									<div class="post-author">
										<a href="javascript:void(0);"><span>Admin</span></a>
									</div>
								</li>
							</ul>
						</div>	
						<h4 class="mb-3"><?php echo e($blog->title); ?></h4>	
					</div>

					<!-- Blog Post -->
					<div class="card blog-list shadow-none">
						<div class="card-body">
							<div class="blog-image">
								<a href="<?php echo e(route('blog_details', [$blog->slug])); ?>">
									<img class="img-fluid" src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt="Post Image">
								</a>
							</div>
							<div class="blog-content">	
								<?php echo $blog->content; ?>

							</div>
						</div>
					</div>
					<!-- /Blog Post -->
					
					
					<!-- Reviews -->
					
					<!-- /Reviews -->
					
					<!-- Comments -->
					
					<!-- /Comments -->
			
				</div>
				
				<!-- Blog Sidebar -->
				<div class="col-lg-4 col-md-12 blog-sidebar theiaStickySidebar">

					<!-- Search -->
					
					<!-- /Search -->
					
					<!-- Categories -->
					
					<!-- /Categories -->

					<!-- Categories -->
					
					<!-- /Categories -->

					<!-- Latest Posts -->
					<div class="card post-widget">
						<div class="card-body">
							<h4 class="side-title">
								
								Related Blogs
							</h4>
							<ul class="latest-posts">
								<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<div class="post-thumb">
										<a href="<?php echo e(route('blog_details', [$blog->slug])); ?>">
											<img class="img-fluid" src="<?php echo e(asset('blog/'.$blog->image)); ?>" alt="Blog Image">
										</a>
									</div>
									<div class="post-info">
										<p><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('d M, Y')); ?></p>
										<h4>
											<a href="<?php echo e(route('blog_details', [$blog->slug])); ?>"><?php echo e(Str::limit($blog->title, 50, '...')); ?></a>
										</h4>
									</div>
								</li>
            					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
					<!-- /Latest Posts -->

					
				</div>
				<!-- /Blog Sidebar -->				
			</div>
		</div>		
	</div>
</div>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_front', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\guddu\resources\views/blog-details.blade.php ENDPATH**/ ?>