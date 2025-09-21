<?php $__env->startSection('content'); ?>

<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="breadcrumb-title mb-2">Contact Us</h2>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb justify-content-center mb-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><i class="ti ti-home-2"></i></a></li>
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content">
			
		<div class="container">
		
		<div class="contacts">
			<div class="contacts-overlay-img d-none d-lg-block">
				<img src="https://truelysell.dreamstechnologies.com/html/template/assets/img/bg/bg-07.png" alt="img" class="img-fluid">
			</div>
			<div class="contacts-overlay-sm d-none d-lg-block">
				<img src="https://truelysell.dreamstechnologies.com/html/template/assets/img/bg/bg-08.png" alt="img" class="img-fluid">
			</div>
				<!-- Contact Details -->
				<div class="contact-details">
					<div class="row justify-content-center">
						<div class="col-md-6 col-lg-4 d-flex">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<span class="rounded-circle"><i class="ti ti-phone text-primary"></i></span>
										<div>
											<h6 class="fs-18 mb-1">Phone Number</h6>
											<p class="fs-14"><?php echo e(config('app.contact_us')); ?></p>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-4 d-flex">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<span class="rounded-circle"><i class="ti ti-mail text-primary"></i></span>
										<div>
											<h6 class="fs-18 mb-1">Email Address</h6>
											<p class="fs-14"><a><?php echo e(config('app.email')); ?></a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-4 d-flex">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<span class="rounded-circle"><i class="ti ti-map-pin text-primary"></i></span>
										<div>
											<h6 class="fs-18 mb-1">Address</h6>
											<p class="fs-14"><?php echo e(config('app.address')); ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Contact Details -->
				
				<!-- Get In Touch -->
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<div class="contact-img flex-fill">
							<img src="https://truelysell.dreamstechnologies.com/html/template/assets/img/services/service-76.jpg" class="img-fluid" alt="img">
						</div>
					</div>
					<div class="col-md-6 d-flex align-items-center justify-content-center">
						<div class="contact-queries flex-fill">
							<h2>Get In Touch</h2>
							<?php if(session('success')): ?>
								<div class="alert alert-success mt-3"><?php echo e(session('success')); ?></div>
							<?php endif; ?>
							<form action="<?php echo e(route('contact.submit')); ?>" method="POST">
								<?php echo csrf_field(); ?>
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
											<div class="form-group">
												<input class="form-control" type="text" name="name" placeholder="Your Name" value="<?php echo e(old('name')); ?>">
												<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<div class="form-group">
												<input class="form-control" type="email" name="email" placeholder="Your Email Address" value="<?php echo e(old('email')); ?>">
												<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<div class="form-group">
												<input class="form-control" type="text" name="phone" placeholder="Your Phone No" value="<?php echo e(old('phone')); ?>">
												<?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
										</div>
										<div class="mb-3">
											<div class="form-group">
												<input class="form-control" type="text" name="subject" placeholder="Subject" value="<?php echo e(old('subject')); ?>">
												<?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
										</div>
										<div class="mb-3">
											<div class="form-group">
												<textarea class="form-control" name="message" cols="30" rows="5" placeholder="Write Message"><?php echo e(old('message')); ?></textarea>
												<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
										</div>
									</div>
									<div class="col-md-12 submit-btn">
										<div class="form-check mb-3">
											<input class="form-check-input" type="checkbox" name="accept_terms" id="accept_terms" checked> 
											<label class="form-check-label" for="accept_terms">	I agree to terms</label>
										</div>
										<?php $__errorArgs = ['accept_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

										<button class="btn btn-dark d-flex align-items-center " type="submit">Send Message<i class="feather-arrow-right-circle ms-2"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Get In Touch -->
		</div>
			
		</div>
	</div>

	<!-- Map -->
	<div class="map-grid">
		<iframe src="https://www.google.com/maps?q=Uttar+Pradesh,+India&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>	
	<!-- /Map -->
</div>
<!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_front', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\guddu\resources\views/contact-us.blade.php ENDPATH**/ ?>