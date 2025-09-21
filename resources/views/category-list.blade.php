@extends('layouts.app_front')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title mb-2">Categories</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
    <div class="content content-two">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                @foreach($data as $category)

                <div class="col-lg-3 col-md-6">
                    <div class="category card wow fadeInUp" data-wow-delay="0.3s">
                        <div class="card-body">
                            <div class="feature-icon d-flex justify-content-center align-items-center mb-2">
                                <span class="rounded-pill d-flex justify-content-center align-items-center p-3">
                                    <img src="{{ asset('category_images/'.$category->image) }}" class="img-fluid" alt="{{ $category->name }}">
                                </span>
                            </div>
                            <h5 class="text-center">
                                <a href="{{ route('services-list', ['categories[]' => $category->id]) }}">{{ $category->name }}</a>
                            </h5>
                            <div class="overlay">
                                <img src="{{asset('images/demo.png')}}" class="img-fluid" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
