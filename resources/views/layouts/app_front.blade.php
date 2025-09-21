<!DOCTYPE html>
<html lang="en">
<head>
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
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('services-list') }}">Services</a>
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

    @yield('content')

	<!-- Links Section -->
	@php
		$categories = App\Models\ServiceCategory::where('status', 'Active')->get();
		$groups = 6;
		$total = $categories->count();
		$baseSize = intdiv($total, $groups);            // floor(total/groups)
		$remainder = $total % $groups;                  // remaining 1s to distribute

		$categoryChunks = collect();
		$offset = 0;

		for ($i = 0; $i < $groups; $i++) {
			$take = $baseSize + ($i < $remainder ? 1 : 0); // first $remainder groups get +1
			$categoryChunks->push($categories->slice($offset, $take)->values());
			$offset += $take;
		}


		$subCategories = App\Models\ServiceSubCategory::where('status', 'Active')->get();
		$totals = $subCategories->count();
		$baseSizes = intdiv($totals, $groups);            // floor(total/groups)
		$remainders = $totals % $groups;                  // remaining 1s to distribute

		$subCategoryChunks = collect();
		$offsets = 0;

		for ($i = 0; $i < $groups; $i++) {
			$takes = $baseSizes + ($i < $remainders ? 1 : 0); // first $remainder groups get +1
			$subCategoryChunks->push($subCategories->slice($offsets, $takes)->values());
			$offsets += $takes;
		}
	@endphp
	<section class="section info-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="accordion accordion-links">
						<div class="accordion-item wow fadeInUp bg-transparent" data-wow-delay="0.2s">
							<h2 class="accordion-header">
								<button class="accordion-button bg-transparent px-0" type="button" data-bs-toggle="collapse"
									data-bs-target="#professional" aria-expanded="false">
									Our Professions Near You
								</button>
							</h2>
							<div id="professional" class="accordion-collapse collapse show">
								<div class="accordion-body border-0 px-0">
									<div class="row row-cols-xl-6 row-cols-md-4 row-cols-sm-2 row-cols-1">
										@foreach($categoryChunks as $chunk)
										<div class="col">
											<div class="main-links">
												@foreach($chunk as $category)
													<a href="{{ route('services-list', ['categories[]' => $category->id]) }}">{{ $category->name }}</a>
												@endforeach
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="accordion-item mb-0 wow fadeInUp bg-transparent" data-wow-delay="0.2s">
							<h2 class="accordion-header">
								<button class="accordion-button bg-transparent px-0" type="button" data-bs-toggle="collapse" data-bs-target="#city" aria-expanded="false">
									Services
								</button>
							</h2>
							<div id="city" class="accordion-collapse collapse show">
								<div class="accordion-body border-0 px-0">
									<div class="row row-cols-xl-6 row-cols-md-4 row-cols-sm-2 row-cols-1">
										@foreach($subCategoryChunks as $chunks)
										<div class="col">
											<div class="main-links">
												@foreach($chunks as $subCategory)
													<a href="{{ route('services-list', ['sub_category' => $subCategory->id]) }}">{{ $subCategory->name }}</a>
												@endforeach
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Links Section -->

	<!-- Footer -->
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xl-3">
						<div class="footer-widget">
							<h5 class="mb-4">Top Services</h5>
							<ul class="footer-menu">
								<li>
									<a href="{{url('home')}}">Home</a>
								</li>
								<li>
									<a href="{{url('services')}}">Services</a>
								</li>
								<li>
									<a href="{{ url('categories') }}">Categories</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-xl-3">
						<div class="footer-widget">
							<h5 class="mb-4">Support</h5>
							<ul class="footer-menu">
								<li>
									<a href="{{url('about-us')}}">About</a>
								</li>
								<li>
									<a href="{{url('contact-us')}}">Contact us</a>
								</li>
								<li>
									<a href="{{url('blogs')}}">Blog</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-xl-3">
						<div class="footer-widget">
							<h5 class="mb-4">Policy</h5>
							<ul class="footer-menu">
								<li>
									<a href="{{url('privacy-policy')}}">Privacy Policy</a>
								</li>
								<li>
									<a href="{{url('refund-policy')}}">Refund Policy</a>
								</li>
								<li>
									<a href="{{url('terms')}}">Terms & Conditions</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-12 col-xl-3">
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
							<p class="mb-2">Copyright &copy; 2024 - All Rights Reserved {{ config('app.name') }}</p>
							<ul class="menu-links mb-2">
								<li>
									<a href="{{url('terms')}}"> Terms and Conditions</a>
								</li>
								<li>
									<a href="{{url('privacy-policy')}}">Privacy Policy</a>
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
</body>
</html>