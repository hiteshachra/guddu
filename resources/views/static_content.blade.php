@extends('layouts.app_front')
@section('content')

		<!-- Breadcrumb -->
		<div class="breadcrumb-bar text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-12">
					<h2 class="breadcrumb-title mb-2">{{ $data->sc_title }}</h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb justify-content-center mb-0">
							<li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i></a></li>
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item active" aria-current="page">{{ $data->sc_title }}</li>
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
			<div class="content p-0">
				<!-- About -->
				<div class="about-sec pt-4">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-12">
								{!! $data->sc_desc !!}
							</div>
						</div>
					</div>
				</div>
				<!-- /About -->
			</div>
		</div>
		<!-- /Page Wrapper -->
@endsection