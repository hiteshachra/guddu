<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?php echo e(config('app.name')); ?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/'.config('app.logo'))); ?>">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/css/bootstrap.min.css')); ?>">

	<!-- Animation CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/css/animate.css')); ?>">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/plugins/tabler-icons/tabler-icons.css')); ?>">

	<!-- Fontawesome Icon CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/plugins/fontawesome/css/fontawesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/plugins/fontawesome/css/all.min.css')); ?>">

	<!-- select CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/plugins/select2/css/select2.min.css')); ?>">

	<!-- Owlcarousel CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/plugins/owlcarousel/owl.carousel.min.css')); ?>">

	<!-- Mobile CSS-->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/plugins/intltelinput/css/intlTelInput.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/plugins/intltelinput/css/demo.css')); ?>">

	<!-- Feather CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/css/feather.css')); ?>">

	<!-- Style CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('front/assets/css/style.css')); ?>">
</head>

<body>

	<!-- Header -->
	<header class="header header-new">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg header-nav">
				<div class="navbar-header">
					<a id="mobile_btn" href="javascript:void(0);">
						<span class="bar-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</a>
					<a href="<?php echo e(url('/')); ?>" class="navbar-brand logo">
						<img src="<?php echo e(asset('images/'.config('app.dark_logo'))); ?>" class="img-fluid" alt="Logo">
					</a>
					<a href="<?php echo e(url('/')); ?>" class="navbar-brand logo-small">
						<img src="<?php echo e(asset('images/'.config('app.dark_logo'))); ?>" class="img-fluid" alt="Logo">
					</a>
				</div>
				<div class="main-menu-wrapper">
					<div class="menu-header">
						<a href="<?php echo e(url('/')); ?>" class="menu-logo">
							<img src="<?php echo e(asset('images/'.config('app.dark_logo'))); ?>" class="img-fluid" alt="Logo">
						</a>
						<a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
					</div>
					<ul class="main-nav align-items-lg-center">
                        
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
						</li>
						<li class="has-submenu">
							<a href="javascript:void(0);">Services <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="services-grid.html">All Service</a></li>
                                
								<li><a href="service-request.html">Service Request</a></li>
								<li class="has-submenu">
									<a href="javascript:void(0);">Service Details</a>
									<ul class="submenu">
										<li><a href="service-details.html">Service Details 1</a></li>
										<li><a href="service-details2.html">Service Details 2</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo e(url('about-us')); ?>">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo e(url('blogs')); ?>">Blogs</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo e(url('contact-us')); ?>">Contact</a>
						</li>
                        <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item d-sm-none">
							<a class="nav-link" href="<?php echo e(url('dashboard')); ?>">Dashboard</a>
						</li>
                        <?php else: ?>
                        <li class="nav-item d-sm-none">
							<a class="nav-link" href="<?php echo e(url('login')); ?>">Login</a>
						</li>
						
                        <?php endif; ?>
						
					</ul>
				</div>
				<ul class="nav header-navbar-rht">
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-linear-primary" href="<?php echo e(url('dashboard')); ?>"><i class="ti ti-user-filled me-2"></i>Dashboard</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item pe-1">
                            <a class="nav-link btn btn-light" href="<?php echo e(url('login')); ?>"><i class="ti ti-lock me-2"></i>Login</a>
                        </li>
                        
                    <?php endif; ?>
				</ul>
			</nav>
		</div>
	</header>
	<!-- /Header -->

    <?php echo $__env->yieldContent('content'); ?>

	<!-- Footer -->
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xl-2">
						<div class="footer-widget">
							<h5 class="mb-4">Product</h5>
							<ul class="footer-menu">
								<li>
									<a href="javascript:void(0);">Features</a>
								</li>
								<li>
									<a href="pricing.html">Pricing</a>
								</li>
								<li>
									<a href="javascript:void(0);">Case studies</a>
								</li>
								<li>
									<a href="javascript:void(0);">Reviews</a>
								</li>
								<li>
									<a href="javascript:void(0);">Updates</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-xl-2">
						<div class="footer-widget">
							<h5 class="mb-4">Support</h5>
							<ul class="footer-menu">
								<li>
									<a href="javascript:void(0);">Getting started</a>
								</li>
								<li>
									<a href="javascript:void(0);">Help center</a>
								</li>
								<li>
									<a href="javascript:void(0);">Server status</a>
								</li>
								<li>
									<a href="javascript:void(0);">Report a bug</a>
								</li>
								<li>
									<a href="user-chat.html">Chat support</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-xl-2">
						<div class="footer-widget">
							<h5 class="mb-4">For Provider</h5>
							<ul class="footer-menu">
								<li>
									<a href="about-us.html">About</a>
								</li>
								<li>
									<a href="contact-us.html">Contact us</a>
								</li>
								<li>
									<a href="javascript:void(0);">Careers</a>
								</li>
								<li>
									<a href="faq.html">Faq’s</a>
								</li>
								<li>
									<a href="blogs.html">Blog</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-xl-2">
						<div class="footer-widget">
							<h5 class="mb-4">Support</h5>
							<ul class="footer-menu">
								<li>
									<a href="javascript:void(0);">Getting started</a>
								</li>
								<li>
									<a href="javascript:void(0);">Help center</a>
								</li>
								<li>
									<a href="javascript:void(0);">Other Products</a>
								</li>
								<li>
									<a href="javascript:void(0);">Report a bug</a>
								</li>
								<li>
									<a href="user-chat.html">Chat support</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-12 col-xl-4">
						<div class="footer-widget">
                            <div class="d-flex align-items-center flex-wrap">
								<p><b>Guddu Bhiya Handy Helper</b> is your one-stop solution for reliable home and office maintenance services. From plumbing, electrical, and carpentry to painting, repairs, and daily handyman tasks – we provide trusted, quick, and affordable service at your doorstep.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex align-items-center justify-content-between flex-wrap mt-3">
					<ul class="social-icon mb-3">
						<li>
							<a href="javascript:void(0);"><img src="<?php echo e(asset('front/assets/img/icons/fb.svg')); ?>" class="img" alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="<?php echo e(asset('front/assets/img/icons/instagram.svg')); ?>" class="img"
									alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="<?php echo e(asset('front/assets/img/icons/twitter.svg')); ?>" class="img"
									alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="<?php echo e(asset('front/assets/img/icons/whatsapp.svg')); ?>" class="img"
									alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="<?php echo e(asset('front/assets/img/icons/youtube.svg')); ?>" class="img"
									alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="<?php echo e(asset('front/assets/img/icons/linkedin.svg')); ?>" class="img"
									alt="icon"></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="d-flex align-items-center justify-content-between flex-wrap">
							<p class="mb-2">Copyright &copy; 2024 - All Rights Reserved Truelysell</p>
							<ul class="menu-links mb-2">
								<li>
									<a href="terms-condition.html"> Terms and Conditions</a>
								</li>
								<li>
									<a href="privacy-policy.html">Privacy Policy</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Footer Bottom -->

	</footer>
	<!-- /Footer -->

	<!-- success message Modal -->
	<div class="modal fade" id="success-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
					<a href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close"><i
							class="ti ti-circle-x-filled fs-20"></i></a>
				</div>
				<div class="modal-body p-4">
					<div class="text-center">
						<span class="success-check mb-3 mx-auto"><i class="ti ti-check"></i></span>
						<h4 class="mb-2">Success</h4>
						<p>Your new password has been successfully saved</p>
						<div>
							<button type="submit" class="btn btn-lg btn-linear-primary w-100">Back to Sign In</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- /success message Modal -->



	<div class="back-to-top">
		<a class="back-to-top-icon align-items-center justify-content-center d-flex" href="#top"><i
				class="fa-solid fa-arrow-up"></i></a>
	</div>

	<!-- Cursor -->
	<div class="xb-cursor tx-js-cursor">
		<div class="xb-cursor-wrapper">
			<div class="xb-cursor--follower xb-js-follower"></div>
		</div>
	</div>
	<!-- /Cursor -->

	<!-- Jquery JS -->
    <script src="<?php echo e(asset('front/assets/js/jquery-3.7.1.min.js')); ?>"></script>

	<!-- Bootstrap JS -->
	<script src="<?php echo e(asset('front/assets/js/bootstrap.bundle.min.js')); ?>"></script>

	<!-- Wow JS -->
	<script src="<?php echo e(asset('front/assets/js/wow.min.js')); ?>"></script>

	<!-- Owlcarousel Js -->
	<script src="<?php echo e(asset('front/assets/plugins/owlcarousel/owl.carousel.min.js')); ?>"></script>

	<!-- select JS -->
	<script src="<?php echo e(asset('front/assets/plugins/select2/js/select2.min.js')); ?>"></script>

	<!-- counterup JS -->
	<script src="<?php echo e(asset('front/assets/js/cursor.js')); ?>"></script>

	<!-- Mobile Input -->
	<script src="<?php echo e(asset('front/assets/plugins/intltelinput/js/intlTelInput.js')); ?>"></script>
	<script src="<?php echo e(asset('front/assets/plugins/ityped/index.js')); ?>"></script>

	<!-- Validation-->
	<script src="<?php echo e(asset('front/assets/js/validation.js')); ?>"></script>

	<!-- Script JS -->
	<script src="<?php echo e(asset('front/assets/js/script.js')); ?>"></script>

    
    
	<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\wamp64\www\sgitsss\guddu\resources\views/layouts/app_front.blade.php ENDPATH**/ ?>