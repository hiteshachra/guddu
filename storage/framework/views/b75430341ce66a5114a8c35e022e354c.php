
<?php $__env->startSection('content'); ?>
<div class="breadcumb-area d-flex">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 text-center">
				<div class="breadcumb-content">
					<div class="breadcumb-title">
						<h4><?php echo e($data->sc_title); ?></h4>
					</div>
					<ul>
						<li><a href="<?php echo e(route('home')); ?>"><i class="bi bi-house-door-fill"></i> Home </a></li>
						<li class="rotates"><i class="bi bi-slash-lg"></i><?php echo e($data->sc_title); ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="about_area style_two">
	<div class="container">
		<?php echo $data->sc_desc; ?>

	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_front', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/static_content.blade.php ENDPATH**/ ?>