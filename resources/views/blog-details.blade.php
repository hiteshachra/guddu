@extends('layouts.app_front')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="breadcrumb-title mb-2">Blog Details</h2>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb justify-content-center mb-0">
						<li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
<div class="page-wrapper">
	<div class="content">
		<div class="container">					
			<div class="row">
				<div class="col-lg-8 col-md-12 blog-details">
					<div class="blog-head">
						<div class="blog-category">
							<ul>
								<li><span class="badge badge-light text-dark">{{$blog->category->name}}</span></li>
								<li><i class="feather-calendar me-1"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</li>
								<li>
									<div class="post-author">
										<a href="javascript:void(0);"><span>Admin</span></a>
									</div>
								</li>
							</ul>
						</div>	
						<h4 class="mb-3">{{ $blog->title }}</h4>	
					</div>

					<!-- Blog Post -->
					<div class="card blog-list shadow-none">
						<div class="card-body">
							<div class="blog-image">
								<a href="{{ route('blog_details', [$blog->slug]) }}">
									<img class="img-fluid" src="{{ asset('blog/'.$blog->image) }}" alt="Post Image">
								</a>
							</div>
							<div class="blog-content">	
								{!! $blog->content !!}
							</div>
						</div>
					</div>
					<!-- /Blog Post -->
					
					
					<!-- Reviews -->
					{{-- <div class="service-wrap blog-review">
						<h4>Comments</h4>
						<ul>
							<li>
								<div class="review-box">
									<div class="card shadow-none">
										<div class="card-body">
											<div class="d-flex align-items-start justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<span class="avatar avatar-md flex-shrink-0 me-2"><img src="https://truelysell.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg" class="img-fluid rounded-circle" alt="img"></span>
													<div class="review-name">
														<h6 class="fs-16 fw-medium mb-1">Charles Lozano</h6>
														<p class="fs-14">a week ago</p>
													</div>
												</div>
												<a href="javascript:void(0);" class="reply-box"><i class="fas fa-reply me-2"></i> Reply</a>
											</div>
											<p>This blog is incredibly insightful! I’ve been on the lookout for a dependable IT support 
												provider, and the tips provided here are exactly what I needed. The emphasis on assessing expertise 
												and specializations really helps me focus on what’s most important for my specific needs. Checking references 
												and reviews will be my next step to ensure that I’m choosing a provider with a solid track record.
											</p>
										</div>
									</div>
								</div>
								<ul class="comments-reply">
									<li>
										<div class="review-box mb-4">
											<div class="d-flex align-items-start justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<span class="avatar avatar-md flex-shrink-0 me-2"><img src="https://truelysell.dreamstechnologies.com/html/template/assets/img/profiles/avatar-03.jpg" class="img-fluid rounded-circle" alt="img"></span>
													<div class="review-name">
														<h6 class="fs-16 fw-medium mb-1">Robert Koch</h6>
														<p class="fs-14">a week ago</p>
													</div>
												</div>
												<a href="javascript:void(0);" class="reply-box"><i class="fas fa-reply me-2"></i> Reply</a>
											</div>
											<p>
												Thank you for your feedback! I'm glad you found the section on checking customer reviews and 
												references particularly valuable. Understanding a provider’s past performance is indeed crucial for 
												ensuring reliable support. It helps in making a more 
												informed decision and choosing a provider who can meet your needs effectively.
											</p>
										</div>
									</li>
								</ul>
							</li>
							<li>
								<div class="review-box">
									<div class="card shadow-none">
										<div class="card-body">
											<div class="d-flex align-items-start justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<span class="avatar avatar-md flex-shrink-0 me-2"><img src="https://truelysell.dreamstechnologies.com/html/template/assets/img/profiles/avatar-04.jpg" class="img-fluid rounded-circle" alt="img"></span>
													<div class="review-name">
														<h6 class="fs-16 fw-medium mb-1">Gregory Gonzalez</h6>
														<p class="fs-14">a week ago</p>
													</div>
												</div>
												<a href="javascript:void(0);" class="reply-box"><i class="fas fa-reply me-2"></i> Reply</a>
											</div>
											<p>I really appreciate the detailed advice on evaluating response times and support availability. 
												It’s so crucial to have a provider who can offer prompt assistance and emergency support, especially 
												when dealing with critical IT issues. 
												The points about comparing service plans and costs are also very helpful
											</p>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="review-box">
									<div class="card shadow-none">
										<div class="card-body">
											<div class="d-flex align-items-start justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<span class="avatar avatar-md flex-shrink-0 me-2"><img src="https://truelysell.dreamstechnologies.com/html/template/assets/img/profiles/avatar-05.jpg" class="img-fluid rounded-circle" alt="img"></span>
													<div class="review-name">
														<h6 class="fs-16 fw-medium mb-1">Odell Nevin</h6>
														<p class="fs-14">a week ago</p>
													</div>
												</div>
												<a href="javascript:void(0);" class="reply-box"><i class="fas fa-reply me-2"></i> Reply</a>
											</div>
											<p>This blog provides a comprehensive guide to selecting the right 
												computer service provider. The section on checking customer reviews and references really 
												resonated with me; understanding a 
												provider’s past performance can make all the difference in ensuring reliable support.
											</p>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div> --}}
					<!-- /Reviews -->
					
					<!-- Comments -->
					{{-- <div class="new-comment">
						<h4>Write a Comment</h4>
						<form>
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Name</label>
										<input type="text" class="form-control" placeholder="Enter Your Name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Email</label>
										<input type="email" class="form-control" placeholder="Enter Email Address">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Message</label>
										<textarea rows="6" class="form-control" placeholder="Enter Your Comment Here...."></textarea>
									</div>
								</div>
								<div>
									<button class="btn btn-dark" type="submit">Post Comment</button>
								</div>
							</div>
						</form>
					</div> --}}
					<!-- /Comments -->
			
				</div>
				
				<!-- Blog Sidebar -->
				<div class="col-lg-4 col-md-12 blog-sidebar theiaStickySidebar">

					<!-- Search -->
					{{-- <div class="card search-widget">
						<div class="card-body">
							<h5 class="side-title">Search</h5>
							<form class="search-form">
								<div class="input-group">
									<input type="text" placeholder="Search..." class="form-control">
									<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
								</div>
							</form>
						</div>
					</div> --}}
					<!-- /Search -->
					
					<!-- Categories -->
					{{-- <div class="card about-widget">
						<div class="card-body">
							<h5 class="side-title">About Me</h5>
							<img src="https://truelysell.dreamstechnologies.com/html/template/assets/img/avatar-big.jpg" alt="User">
							<p>Robert Koch is an accomplished IT professional and writer with extensive 
								experience in the field of computer services and technology solutions.
							</p>
							<a href="javascript:void(0);" class="btn btn-dark">About Author</a>
						</div>
					</div> --}}
					<!-- /Categories -->

					<!-- Categories -->
					{{-- <div class="card category-widget">
						<div class="card-body">
							<h4 class="side-title">Categories</h4>
							<ul class="categories">									
								<li class="d-flex align-items-center justify-content-between p-2 bg-white"><a href="https://truelysell.dreamstechnologies.com/html/template/categories.html">Car Wash</a>(2)</li>
								<li class="d-flex align-items-center justify-content-between p-2 bg-white"><a href="https://truelysell.dreamstechnologies.com/html/template/categories.html">Plumbing</a>(5)</li>
								<li class="d-flex align-items-center justify-content-between p-2 bg-white"><a href="https://truelysell.dreamstechnologies.com/html/template/categories.html">Carpenter</a>(4)</li>
								<li class="d-flex align-items-center justify-content-between p-2 bg-white"><a href="https://truelysell.dreamstechnologies.com/html/template/categories.html">Computer Service</a>(6)</li>
								<li class="d-flex align-items-center justify-content-between p-2 bg-white"><a href="https://truelysell.dreamstechnologies.com/html/template/categories.html">Cleaning</a>(8)</li>
							</ul>
						</div>
					</div> --}}
					<!-- /Categories -->

					<!-- Latest Posts -->
					<div class="card post-widget">
						<div class="card-body">
							<h4 class="side-title">
								{{-- Latest News  --}}
								Related Blogs
							</h4>
							<ul class="latest-posts">
								@foreach ($data as $blog)
								<li>
									<div class="post-thumb">
										<a href="{{ route('blog_details', [$blog->slug]) }}">
											<img class="img-fluid" src="{{asset('blog/'.$blog->image)}}" alt="Blog Image">
										</a>
									</div>
									<div class="post-info">
										<p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</p>
										<h4>
											<a href="{{ route('blog_details', [$blog->slug]) }}">{{ Str::limit($blog->title, 50, '...') }}</a>
										</h4>
									</div>
								</li>
            					@endforeach
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
	
@endsection
