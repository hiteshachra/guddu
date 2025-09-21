@extends('layouts.app_front')
@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title mb-2">Services</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
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
            <div class="row">
                <div class="col-xl-3 col-lg-4 theiaStickySidebar">
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                                    <h5><i class="ti ti-filter-check me-2"></i>Filters</h5>
                                    <a href="javascript:void(0);">Reset Filter</a>
                                </div>
                                <div class="mb-3 pb-3 border-bottom">
                                    <label class="form-label">Search By Keyword</label>
                                    <input type="text" name="keyword" class="form-control" placeholder="What are you looking for?" value="{{ request('keyword') }}">
                                </div>
                                <div class="accordion border-bottom mb-3">
                                    <div class="accordion-item mb-3">
                                        <div class="accordion-header" id="accordion-headingThree">
                                            <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseThree" aria-expanded="true" aria-controls="accordion-collapseThree" role="button">
                                                Categories
                                            </div>
                                        </div>
                                        <div id="accordion-collapseThree" class="accordion-collapse collapse show" aria-labelledby="accordion-headingThree">
                                            <div class="content-list mb-3" id="fill-more">
                                                @foreach($categories as $category)
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox" type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                                {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                                            {{ $category->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a href="javascript:void(0);" id="more" class="more-view text-primary fs-14">View more <i class="ti ti-chevron-down ms-1"></i></a>
                                        </div>										
                                    </div>
                                </div>
                                <div class="accordion border-bottom mb-3">
                                    <div class="accordion-header" id="accordion-headingFour">
                                        <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseFour" aria-expanded="true" aria-controls="accordion-collapseFour" role="button">
                                            Sub Category
                                        </div>
                                    </div>
                                    <div id="accordion-collapseFour" class="accordion-collapse collapse show" aria-labelledby="accordion-headingFour">
                                        <div class="mb-3">
                                            <select name="sub_category" id="sub_category" class="select">
                                                <option value="">Select Sub Category</option>
                                                @foreach($selectedSubcat as $sub)
                                                    <option value="{{ $sub->id }}" {{ request('sub_category') == $sub->id ? 'selected' : '' }}>
                                                        {{ $sub->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="accordion border-bottom mb-3">
                                    <div class="accordion-header" id="accordion-headingFive">
                                        <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseFive" aria-expanded="true" aria-controls="accordion-collapseFive" role="button">
                                            Location
                                        </div>
                                    </div>
                                    <div id="accordion-collapseFive" class="accordion-collapse collapse show" aria-labelledby="accordion-headingFive">
                                        <div class="mb-3">
                                            <div class="position-relative">
                                                <input type="text" name="location" class="form-control" placeholder="Select Location" value="{{ request('location') }}">
                                                <span class="icon-addon"><i class="ti ti-map-pin"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <button type="submit" class="btn btn-dark w-100">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                        <h4 >Found <span class="text-primary">{{ $servicesCount }} Services</span></h4>
                        {{-- <div class="d-flex align-items-center">
                            <span class="text-dark me-2">Sort</span>
                            <div class="dropdown me-2">
                                <a href="javascript:void(0);" class="dropdown-toggle bg-light-300 " data-bs-toggle="dropdown">
                                    Price Low to High
                                </a>
                                <div class="dropdown-menu">
                                    <a href="javascript:void(0);" class="dropdown-item active">Price Low to High</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Price High to Low</a>
                                </div>
                            </div>
                            <a href="https://truelysell.dreamstechnologies.com/html/template/services-grid.html" class="tags d-flex justify-content-center align-items-center bg-primary rounded me-2"><i class="ti ti-layout-grid"></i></a>
                            <a href="https://truelysell.dreamstechnologies.com/html/template/services-list.html" class="tags d-flex justify-content-center align-items-center border rounded"><i class="ti ti-list"></i></a>
                        </div> --}}
                    </div>
                    <div class="row justify-content-center align-items-center">
                        @foreach ($services as $service)
                        <div class="col-xl-4 col-md-6">
                            <div class="card p-0">
                                <div class="card-body p-0">
                                    <div class="img-sec w-100">
                                        {{-- <a href="{{ route('service-details',['slug' => $service->slug]) }}"> --}}
                                            <div class="img-slider owl-carousel nav-center">
                                                @foreach ($service->decoded_images??[] as $image)
                                                <div class="slide-images">
                                                    <a href="{{ route('service-details',['slug' => $service->slug]) }}">
                                                        <img src="{{asset('services/images/'.$image)}}" class="img-fluid" alt="img">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            {{-- <img src="{{ $service->decoded_images[0]??'' }}"  onerror="this.onerror=null;this.src='{{asset('images/demo.png')}}';" class="img-fluid rounded-top w-100" alt="img"> --}}
                                        {{-- </a> --}}
                                        <div class="image-tag d-flex justify-content-end align-items-center">
                                            <span class="trend-tag">{{ $service->category->name??'' }}</span>
                                            {{-- <a href="javascript:void(0);" class="fav-icon like-icon"><i class="ti ti-heart"></i></a> --}}
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="mb-2">
                                                <a href="{{ route('service-details',['slug' => $service->slug]) }}">{{ $service->title }}</a>
                                            </h5>
                                            <span class="rating text-gray fs-14"><i class="fa fa-star filled me-1"></i>{{ $service->rating }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>₹{{ number_format($service->price - $service->discount, 2) }}<span class="fs-13 text-gray"><del>₹{{ number_format($service->price,2) }}/hr</del></span></h5>
                                            <a href="https://truelysell.dreamstechnologies.com/html/template/booking.html" class="btn bg-primary-transparent">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <nav aria-label="Page navigation">
                        @if ($services->hasPages())
                            <ul class="pagination d-flex justify-content-center align-items-center mt-4">
                                {{-- Previous Page Link --}}
                                @if ($services->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link prev"><i class="ti ti-arrow-left me-2"></i>Prev</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link prev" href="{{ $services->previousPageUrl() }}"><i class="ti ti-arrow-left me-2"></i>Prev</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($services->links()->elements[0] ?? [] as $page => $url)
                                    @if ($page == $services->currentPage())
                                        <li class="page-item"><span class="page-link active">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($services->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link next" href="{{ $services->nextPageUrl() }}">Next<i class="ti ti-arrow-right ms-2"></i></a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link next">Next<i class="ti ti-arrow-right ms-2"></i></span>
                                    </li>
                                @endif
                            </ul>
                        @endif
                        </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryCheckboxes = document.querySelectorAll('.category-checkbox');
    const subCategorySelect = document.getElementById('sub_category');

    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', fetchSubCategories);
    });

    function fetchSubCategories() {
        // Get all checked category IDs
        let selectedCategories = Array.from(categoryCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        // Clear current options
        subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';

        if (selectedCategories.length === 0) return;

        // AJAX request to get subcategories
        fetch(`{{ route('get-subcategories') }}?categories=${selectedCategories.join(',')}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(sub => {
                    const option = document.createElement('option');
                    option.value = sub.id;
                    option.text = sub.name;
                    subCategorySelect.appendChild(option);
                });
            });
    }
});
</script>
@endpush
