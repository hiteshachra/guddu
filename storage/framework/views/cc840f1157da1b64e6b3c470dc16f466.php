<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< Updated upstream:storage/framework/views/cc840f1157da1b64e6b3c470dc16f466.php
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(config('app.name')); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="<?php echo e(asset('images/'.config('app.logo'))); ?>">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/bootstrap.min.css')); ?>" type="text/css" media="all">
    <!-- carousel CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/owl.carousel.min.css')); ?>" type="text/css" media="all">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/animate.css')); ?>" type="text/css" media="all">
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/animated-text.css')); ?>" type="text/css" media="all">
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/all.min.css')); ?>" type="text/css" media="all">
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/theme-default.css')); ?>" type="text/css" media="all">
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/meanmenu.min.css')); ?>" type="text/css" media="all">
    <!-- transitions CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/owl.transitions.css')); ?>" type="text/css" media="all">
    <!-- venobox CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/venobox/venobox.css')); ?>" type="text/css" media="all">
    <!-- flaticon -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/bootstrap-icons.css')); ?>" type="text/css" media="all">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/flaticon.css')); ?>" type="text/css" media="all">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/style.css')); ?>" type="text/css" media="all">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/responsive.css')); ?>" type="text/css" media="all">
    <!-- Coustom Animation CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/coustom-animation.css')); ?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/swiper-bundle.css')); ?>" type="text/css" media="all">
    <!-- odometer CSS -->   
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/odometer-theme-default.css')); ?>" type="text/css" media="all">    
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/scroll-up.css')); ?>" type="text/css" media="all">     

    <!-- modernizr js -->
    <script src="<?php echo e(asset('front/assets/js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
    <style>
        .mean-container .mean-bar::before {
            color: #fff;
            content: "<?php echo e(config('app.name')); ?>";
            font-size: 28px;
            font-weight: 600;
            left: 10px;
            position: absolute;
            top: 18px;
        }
    </style>
=======
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>{{config('app.name')}}</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/'.config('app.logo'))}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

	<!-- Animation CSS -->
	<link rel="stylesheet" href="{{asset('front/assets/css/animate.css')}}">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="{{asset('front/assets/plugins/tabler-icons/tabler-icons.css')}}">

	<!-- Fontawesome Icon CSS -->
	<link rel="stylesheet" href="{{asset('front/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/assets/plugins/fontawesome/css/all.min.css')}}">

	<!-- select CSS -->
	<link rel="stylesheet" href="{{asset('front/assets/plugins/select2/css/select2.min.css')}}">

	<!-- Owlcarousel CSS -->
	<link rel="stylesheet" href="{{asset('front/assets/plugins/owlcarousel/owl.carousel.min.css')}}">

	<!-- Mobile CSS-->
	<link rel="stylesheet" href="{{asset('front/assets/plugins/intltelinput/css/intlTelInput.css')}}">
	<link rel="stylesheet" href="{{asset('front/assets/plugins/intltelinput/css/demo.css')}}">

	<!-- Feather CSS -->
	<link rel="stylesheet" href="{{asset('front/assets/css/feather.css')}}">

	<!-- Style CSS -->
	<link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
>>>>>>> Stashed changes:resources/views/layouts/app_front.blade.php
</head>

<body>

<<<<<<< Updated upstream:storage/framework/views/cc840f1157da1b64e6b3c470dc16f466.php
    <!--========= Prealoader ==============-->
    <div class="loading-screen" id="loading-screen">
        <span class="bar top-bar"></span>
        <span class="bar down-bar"></span>
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="G" class="letters-loading">G</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader=" " class="letters-loading"> </span>
                <span data-text-preloader="G" class="letters-loading">G</span>
                <span data-text-preloader="B" class="letters-loading">B</span>
                <span data-text-preloader="U" class="letters-loading">U</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader="E" class="letters-loading">E</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
            </div>
        </div>
    </div>
    <!--========= End Prealoader ==============-->


<!--==================================================-->
<!-- Start Consalt Header Area Style Sixs-->
<!--==================================================-->
<div class="consalt-header-area style_two style_three style_sixs" id="sticky-header" >
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="header-logo">
                    <a class="active_header" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/'.config('app.logo'))); ?>" width="90" alt="logo"></a>
                    <a class="active_sticky" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/'.config('app.dark_logo'))); ?>" width="90" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="header-menu">
                    <ul class="nav_scroll">
                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo e(url('about-us')); ?>">About</a></li>
                        <li><a href="<?php echo e(url('videos')); ?>">Videos</a></li>
                        <li><a href="<?php echo e(url('training')); ?>">Training</a></li>
                        <li><a href="<?php echo e(url('our-services')); ?>">Our Services</a></li>
                        <li><a href="<?php echo e(url('blogs')); ?>">Blogs</a></li>
                        <li><a href="<?php echo e(url('contact-us')); ?>">Contact</a></li>
                    </ul>
                    
                </div>
            </div>
            <div class="col-lg-3">  
                <div class="consalt_header-right">
                    
                    <div class="sidebar-btn">
                        <div class="nav-btn navSidebar-button"><span><i class="bi bi-filter-left"></i></span></div>                         
                    </div>      
                    <div class="header-button style_two">
                        <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('dashboard')); ?>">Dashboard</a>
                        <?php else: ?>
                        <a href="<?php echo e(url('login')); ?>">Login</a>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End Consalt Header Area -->
<!--==================================================-->
=======
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
					<a href="{{url('/')}}" class="navbar-brand logo">
						<img src="{{asset('images/'.config('app.dark_logo'))}}" class="img-fluid" alt="Logo">
					</a>
					<a href="{{url('/')}}" class="navbar-brand logo-small">
						<img src="{{asset('images/'.config('app.dark_logo'))}}" class="img-fluid" alt="Logo">
					</a>
				</div>
				<div class="main-menu-wrapper">
					<div class="menu-header">
						<a href="{{url('/')}}" class="menu-logo">
							<img src="{{asset('images/'.config('app.dark_logo'))}}" class="img-fluid" alt="Logo">
						</a>
						<a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
					</div>
					<ul class="main-nav align-items-lg-center">
                        
						<li class="nav-item active">
							<a class="nav-link" href="{{url('/')}}">Home</a>
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
							<a class="nav-link" href="{{url('about-us')}}">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('blogs')}}">Blogs</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('contact-us')}}">Contact</a>
						</li>
                        @auth
                        <li class="nav-item d-sm-none">
							<a class="nav-link" href="{{url('dashboard')}}">Dashboard</a>
						</li>
                        @else
                        <li class="nav-item d-sm-none">
							<a class="nav-link" href="{{url('login')}}">Login</a>
						</li>
						{{-- <li class="nav-item d-sm-none">
							<a class="nav-link" href="register.html">Join Us</a>
						</li> --}}
                        @endauth
						
					</ul>
				</div>
				<ul class="nav header-navbar-rht">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link btn btn-linear-primary" href="{{url('dashboard')}}"><i class="ti ti-user-filled me-2"></i>Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item pe-1">
                            <a class="nav-link btn btn-light" href="{{url('login')}}"><i class="ti ti-lock me-2"></i>Login</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link btn btn-linear-primary" href="#" data-bs-toggle="modal" data-bs-target="#register-modal"><i class="ti ti-user-filled me-2"></i>Join Us</a>
                        </li> --}}
                    @endauth
				</ul>
			</nav>
		</div>
	</header>
	<!-- /Header -->
>>>>>>> Stashed changes:resources/views/layouts/app_front.blade.php

    @yield('content')

<<<<<<< Updated upstream:storage/framework/views/cc840f1157da1b64e6b3c470dc16f466.php
<div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none">
    <div class="mobile-menu">
        <nav class="header-menu">
            <ul class="nav_scroll">
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(url('about-us')); ?>">About</a></li>
                <li><a href="<?php echo e(url('videos')); ?>">Videos</a></li>
                <li><a href="<?php echo e(url('training')); ?>">Training</a></li>
                <li><a href="<?php echo e(url('our-services')); ?>">Our Services</a></li>
                <li><a href="<?php echo e(url('blogs')); ?>">Blogs</a></li>
                <li><a href="<?php echo e(url('contact-us')); ?>">Contact</a></li>
                <?php if(auth()->guard()->check()): ?>
                <li><a href="<?php echo e(url('dashboard')); ?>" class="text-primary ">Dashboard</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(url('login')); ?>" class="text-primary ">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
<!--========= End Mobile Memu========== -->

<!-- Sidebar Cart Item -->
<div class="xs-sidebar-group info-group">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">
                    <i class="far fa-times-circle"></i>
                </a>
            </div>
            <div class="sidebar-textwidget">
                <!-- Sidebar Info Content -->
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="nav-logo">
                            <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/'.config('app.logo'))); ?>" width="90" alt="sid img" ></a>
                        </div>
                        <div class="row padding-two">
                            <div class="col-lg-6">
                                <div class="content-thumb-box">
                                    <img src="<?php echo e(asset('front/assets/images/home-six/team.jpg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="content-thumb-box">
                                    <img src="<?php echo e(asset('front/assets/images/home-six/team1.jpg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="content-thumb-box">
                                    <img src="<?php echo e(asset('front/assets/images/home-six/team2.jpg')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="content-thumb-box">
                                    <img src="<?php echo e(asset('front/assets/images/home-six/team.jpg')); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="contact-info">
                            <h2>Contact Info</h2>
                            <ul class="list-style-one">
                                <li><i class="bi bi-envelope"></i>Chicago 12, Melborne City, USA</li>
                                <li><i class="bi bi-envelope"></i>(+001) 123-456-7890</li>
                                <li><i class="bi bi-envelope"></i>Example.com</li>
                                <li><i class="bi bi-envelope"></i>Week Days: 09.00 to 18.00 Sunday: Closed</li>
                            </ul>
                        </div>
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li class="facebook"><a href="#" class="fab fa-facebook-f"></a></li>
                            <li class="twitter"><a href="#" class="fab fa-instagram"></a></li>
                            <li class="linkedin"><a href="#" class="fab fa-twitter"></a></li>
                            <li class="instagram"><a href="#" class="fab fa-pinterest-p"></a></li>
                            <li class="youtube"><a href="#" class="fab fa-linkedin-in"></a></li>
                        </ul>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>
            
<?php echo $__env->yieldContent('content'); ?>

<!--==================================================-->
<!-- Start Consalt Footer Area Style Five -->
<!--==================================================-->
<section class="footer_area style_sixs boxed">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer_logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/'.config('app.dark_logo'))); ?>" width="100" alt=""></a>
                </div>
                <p class="footer_desc">Continually plagiarize virtual web service pro with home_one maximizing action</p>
                <form action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form">
                    <div class="subscribe_form">
                        <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Your E-Mail">
                        <button type="submit" class="btn">Subscribe</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Menu</h4>
                    </div>
                    <div class="footer-widget-menu">
                        <ul>
                            <li><a href="<?php echo e(url('/')); ?>"><i class="bi bi-chevron-double-right"></i> Home</a></li>
                            <li><a href="<?php echo e(url('about-us')); ?>"><i class="bi bi-chevron-double-right"></i> About Us</a></li>
                            <li><a href="<?php echo e(url('training')); ?>"><i class="bi bi-chevron-double-right"></i> Training</a></li>
                            <li><a href="<?php echo e(url('videos')); ?>"><i class="bi bi-chevron-double-right"></i> Videos</a></li>
                            <li><a href="<?php echo e(url('contact-us')); ?>"><i class="bi bi-chevron-double-right"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Service</h4>
                    </div>
                    <div class="footer-widget-menu">
                        <ul>
                            <li><a href="<?php echo e(url('our-services')); ?>"><i class="bi bi-chevron-double-right"></i> Our Services</a></li>
                            <li><a href="<?php echo e(url('privacy-policy')); ?>"><i class="bi bi-chevron-double-right"></i> Privacy Policy</a></li>
                            <li><a href="<?php echo e(url('refund-policy')); ?>"><i class="bi bi-chevron-double-right"></i> Refund Policy</a></li>
                            <li><a href="<?php echo e(url('terms')); ?>"><i class="bi bi-chevron-double-right"></i> Terms & Conditions</a></li>
                            <li><a href="<?php echo e(url('blogs')); ?>"><i class="bi bi-chevron-double-right"></i> Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget-contact">
                    <div class="footer-widget-title">
                        <h4>Contact</h4>
                    </div>
                    <!-- footer widget address -->
                    <div class="footer-widget-address style_two">
                        <div class="footer_widget_icon style_upper">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="footer-widget-address_text">
                            <p>Our address:</p>
                            <span><?php echo e(config('app.address')); ?></span>
                        </div>
                    </div>
                    <!-- footer widget address -->
                    <div class="footer-widget-address">
                        <div class="footer_widget_icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="footer-widget-address_text">
                            <p><?php echo e(config('app.contact_us')); ?></p>
                        </div>
                    </div>
                    <!-- footer widget address -->
                    <div class="footer-widget-address">
                        <div class="footer_widget_icon">
                            <i class="bi bi-envelope-open"></i>
                        </div>
                        <div class="footer-widget-address_text">
                            <p><?php echo e(config('app.email')); ?></p>
                        </div>
                    </div>
                    <div class="footer-widget-address">
                        <div class="footer_widget_icon">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div class="footer-widget-address_text">
                            <p><?php echo e(config('app.whatsapp')); ?></p>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="row add-border align-items-center">
            <div class="col-md-7">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-content-copy">
                        <p>Copyright 2025 <a class="text-white" href="<?php echo e(url('/')); ?>"><?php echo e(config('app.name')); ?></a> | Developed by Team <a class="text-white" href="https://webazu.in"> Webazu Technology OPC Private Limited</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 text-right">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-menu">
                        <ul>
                            <li><a href="#">FACEBOOK</a></li>
                            <li><a href="#">TWITTER</a></li>
                            <li><a href="#">INSTAGRAM</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
=======
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
							<a href="javascript:void(0);"><img src="{{asset('front/assets/img/icons/fb.svg')}}" class="img" alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="{{asset('front/assets/img/icons/instagram.svg')}}" class="img"
									alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="{{asset('front/assets/img/icons/twitter.svg')}}" class="img"
									alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="{{asset('front/assets/img/icons/whatsapp.svg')}}" class="img"
									alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="{{asset('front/assets/img/icons/youtube.svg')}}" class="img"
									alt="icon"></a>
						</li>
						<li>
							<a href="javascript:void(0);"><img src="{{asset('front/assets/img/icons/linkedin.svg')}}" class="img"
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
>>>>>>> Stashed changes:resources/views/layouts/app_front.blade.php

			</div>
		</div>
	</div>
	<!-- /success message Modal -->



	<div class="back-to-top">
		<a class="back-to-top-icon align-items-center justify-content-center d-flex" href="#top"><i
				class="fa-solid fa-arrow-up"></i></a>
	</div>

<<<<<<< Updated upstream:storage/framework/views/cc840f1157da1b64e6b3c470dc16f466.php
<!--==================================================-->
<!-- Start Consalt Scroll Up-->
<!--==================================================-->
<div class="prgoress_indicator active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 212.78;"></path>
    </svg>
 </div>
<!--==================================================-->
<!-- End Consalt Scroll Up-->
<!--==================================================-->
    
    <!-- jquery js -->
    <script src="<?php echo e(asset('front/assets/js/vendor/jquery-3.6.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/popper.min.js')); ?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo e(asset('front/assets/js/bootstrap.min.js')); ?>"></script>
    <!-- carousel js -->
    <script src="<?php echo e(asset('front/assets/js/owl.carousel.min.js')); ?>"></script>
    <!-- counterup js -->
    <script src="<?php echo e(asset('front/assets/js/jquery.counterup.min.js')); ?>"></script>
    <!-- waypoints js -->
    <script src="<?php echo e(asset('front/assets/js/waypoints.min.js')); ?>"></script>
    <!-- wow js -->
    <script src="<?php echo e(asset('front/assets/js/wow.js')); ?>"></script>
    <!-- imagesloaded js -->
    <script src="<?php echo e(asset('front/assets/js/imagesloaded.pkgd.min.js')); ?>"></script>
    <!-- venobox js -->
    <script src="<?php echo e(asset('front/venobox/venobox.js')); ?>"></script>
    <!--  animated-text js -->
    <script src="<?php echo e(asset('front/assets/js/animated-text.js')); ?>"></script>
    <!-- venobox min js -->
    <script src="<?php echo e(asset('front/venobox/venobox.min.js')); ?>"></script>
    <!-- isotope js -->
    <script src="<?php echo e(asset('front/assets/js/isotope.pkgd.min.js')); ?>"></script>
    <!-- jquery meanmenu js -->
    <script src="<?php echo e(asset('front/assets/js/jquery.meanmenu.js')); ?>"></script>
    <!-- jquery scrollup js -->
    <script src="<?php echo e(asset('front/assets/js/jquery.scrollUp.js')); ?>"></script>
    <!-- theme js -->
    <script src="<?php echo e(asset('front/assets/js/theme.js')); ?>"></script>
    <!-- barfiller -->
    <script src="<?php echo e(asset('front/assets/js/jquery.barfiller.js')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/swiper-bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/magnific-popup-js.html')); ?>"></script>
    <script src="<?php echo e(asset('front/assets/js/custom.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
=======
	<!-- Cursor -->
	<div class="xb-cursor tx-js-cursor">
		<div class="xb-cursor-wrapper">
			<div class="xb-cursor--follower xb-js-follower"></div>
		</div>
	</div>
	<!-- /Cursor -->

	<!-- Jquery JS -->
    <script src="{{asset('front/assets/js/jquery-3.7.1.min.js')}}"></script>

	<!-- Bootstrap JS -->
	<script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>

	<!-- Wow JS -->
	<script src="{{asset('front/assets/js/wow.min.js')}}"></script>

	<!-- Owlcarousel Js -->
	<script src="{{asset('front/assets/plugins/owlcarousel/owl.carousel.min.js')}}"></script>

	<!-- select JS -->
	<script src="{{asset('front/assets/plugins/select2/js/select2.min.js')}}"></script>

	<!-- counterup JS -->
	<script src="{{asset('front/assets/js/cursor.js')}}"></script>

	<!-- Mobile Input -->
	<script src="{{asset('front/assets/plugins/intltelinput/js/intlTelInput.js')}}"></script>
	<script src="{{asset('front/assets/plugins/ityped/index.js')}}"></script>

	<!-- Validation-->
	<script src="{{asset('front/assets/js/validation.js')}}"></script>

	<!-- Script JS -->
	<script src="{{asset('front/assets/js/script.js')}}"></script>

    {{-- <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"></script> --}}
    {{-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"9820f87f9f62e2c9","version":"2025.9.1","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script> --}}
	@stack('scripts')
>>>>>>> Stashed changes:resources/views/layouts/app_front.blade.php
</body>
</html><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/layouts/app_front.blade.php ENDPATH**/ ?>