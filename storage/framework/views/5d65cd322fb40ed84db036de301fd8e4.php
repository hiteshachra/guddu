
<<<<<<< Updated upstream:storage/framework/views/5d65cd322fb40ed84db036de301fd8e4.php

<?php $__env->startSection('content'); ?>
<!--==================================================-->
<!-- Start Consalt Breadcumb Area -->
<!--==================================================-->
<div class="breadcumb-area d-flex">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 text-center">
				<div class="breadcumb-content">
					<div class="breadcumb-title">
						<h4>Contact Us</h4>
					</div>
					<ul>
						<li><a href="index.html"><i class="bi bi-house-door-fill"></i> Home </a></li>
						<li class="rotates"><i class="bi bi-slash-lg"></i>Contact</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Consalt Breadcumb Area -->
<!--==================================================-->

<!--==================================================-->
<!-- Start Consalt Contact Area Inner Page -->
<!--==================================================-->
<section class="contact_area inner_section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="section_title">
					<h4>GET IN TOUCH</h4>
					<h1>Trusted By the Genius </h1>
					<h1>People with Consalt</h1>
					<p>Media leadership skills before cross-media innovation main technology
						develop standardized platforms without consalt.</p>
				</div>
				<div class="contact_main_info">
					<div class="call-do-action-info">
						<div class="call-do-social_icon">
							<i class="fas fa-phone-alt"></i>
						</div>
						<div class="call_info">
							<p>Call us Anytime</p>
							<h3><?php echo e(config('app.contact_us')); ?></h3>
						</div>
					</div>
					<div class="call-do-action-info">
						<div class="call-do-social_icon">
							<i class="fas fa-envelope-open"></i>
						</div>
						<div class="call_info">
							<p>Mail us Anytime</p>
							<h3><?php echo e(config('app.email')); ?></h3>
						</div>
					</div>
					<div class="call-do-action-info">
						<div class="call-do-social_icon">
							<i class="fas fa-map-marker-alt"></i>
						</div>
						<div class="call_info">
							<p>Our Locations</p>
							<span><?php echo e(config('app.address')); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<!-- contact form box -->
				<div class="contact-form-box style_two">
					<!-- section title -->
					<div class="section_title style_three style_four text-center ">
						<h4>CONTACT US</h4>
						<h1>Get In Touch with Consalt</h1>
					</div>
					<?php if(session('success')): ?>
						<div class="alert alert-success mt-3"><?php echo e(session('success')); ?></div>
					<?php endif; ?>
					<form action="<?php echo e(route('contact.submit')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-box">
									<input type="text" name="name" placeholder="Your Name" value="<?php echo e(old('name')); ?>">
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
							<div class="col-lg-6 col-md-6">
								<div class="form-box">
									<input type="text" name="phone" placeholder="Phone No" value="<?php echo e(old('phone')); ?>">
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
							<div class="col-lg-6 col-md-6">
								<div class="form-box">
									<input type="email" name="email" placeholder="E-Mail Address" value="<?php echo e(old('email')); ?>">
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
							<div class="col-lg-6 col-md-6">
								<div class="form-box">
									<input type="text" name="subject" placeholder="Subject" value="<?php echo e(old('subject')); ?>">
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
							<div class="col-lg-12 col-md-12">
								<div class="form-box message">
									<textarea name="message" cols="30" rows="5" placeholder="Write Message"><?php echo e(old('message')); ?></textarea>
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
							<div class="checkbox mb-3">
								<label>
									<input type="checkbox" name="accept_terms" <?php echo e(old('accept_terms') ? 'checked' : ''); ?>> I agree to terms
								</label>
								<?php $__errorArgs = ['accept_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
							<div class="contact-form">
								<button type="submit"><i class="far fa-thumbs-up"></i> Request Call Back</button>
							</div>
						</div>
					</form>
					<div id="status"></div>
				</div> 
			</div>
		</div>

	</div>

	<div class="contact_shape2 dance2">
		<img src="assets/images/home_3/service_shpe2.png" alt="">
	</div>
</section>
<!--==================================================-->
<!-- End Consalt Contact Area  Inner Page -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Consalt Map Area -->
<!--==================================================-->
<div class="map-section">
	<div class="-custon-container-fluid">
=======
@extends('layouts.app_front')
@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
	<div class="container">
>>>>>>> Stashed changes:resources/views/contact-us.blade.php
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="breadcrumb-title mb-2">Contact Us</h2>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb justify-content-center mb-0">
						<li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i></a></li>
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="breadcrumb-bg">
			<img src="{{ asset('front/assets/img/bg/bg-07.webp') }}" class="breadcrumb-bg-1" alt="">
			<img src="{{ asset('front/assets/img/bg/bg-07.webp') }}" class="breadcrumb-bg-2" alt="">
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
											<p class="fs-14">{{ config('app.contact_us') }}</p>
											{{-- <p class="fs-14">(123) 456-7890</p> --}}
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
											<p class="fs-14"><a>{{ config('app.email') }}</a></p>
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
											<p class="fs-14">{{ config('app.address') }}</p>
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
							@if(session('success'))
								<div class="alert alert-success mt-3">{{ session('success') }}</div>
							@endif
							<form action="{{ route('contact.submit') }}" method="POST">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
											<div class="form-group">
												<input class="form-control" type="text" name="name" placeholder="Your Name" value="{{ old('name') }}">
												@error('name') <small class="text-danger">{{ $message }}</small> @enderror
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<div class="form-group">
												<input class="form-control" type="email" name="email" placeholder="Your Email Address" value="{{ old('email') }}">
												@error('email') <small class="text-danger">{{ $message }}</small> @enderror
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<div class="form-group">
												<input class="form-control" type="text" name="phone" placeholder="Your Phone No" value="{{ old('phone') }}">
												@error('phone') <small class="text-danger">{{ $message }}</small> @enderror
											</div>
										</div>
										<div class="mb-3">
											<div class="form-group">
												<input class="form-control" type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
												@error('subject') <small class="text-danger">{{ $message }}</small> @enderror
											</div>
										</div>
										<div class="mb-3">
											<div class="form-group">
												<textarea class="form-control" name="message" cols="30" rows="5" placeholder="Write Message">{{ old('message') }}</textarea>
												@error('message') <small class="text-danger">{{ $message }}</small> @enderror
											</div>
										</div>
									</div>
									<div class="col-md-12 submit-btn">
										<div class="form-check mb-3">
											<input class="form-check-input" type="checkbox" name="accept_terms" id="accept_terms" checked> 
											<label class="form-check-label" for="accept_terms">	I agree to terms</label>
										</div>
										@error('accept_terms') <br><small class="text-danger">{{ $message }}</small> @enderror

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
<<<<<<< Updated upstream:storage/framework/views/5d65cd322fb40ed84db036de301fd8e4.php
</section>
<!--==================================================-->
<!-- End Consalt Call Area -->
<!--==================================================-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_front', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/contact-us.blade.php ENDPATH**/ ?>
=======

	<!-- Map -->
	<div class="map-grid">
		<iframe src="https://www.google.com/maps?q=Uttar+Pradesh,+India&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>	
	<!-- /Map -->
</div>
<!-- /Page Wrapper -->
@endsection
>>>>>>> Stashed changes:resources/views/contact-us.blade.php
