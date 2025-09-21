<<<<<<< Updated upstream:storage/framework/views/a89d56ace68d57cecc4df9d363825297.php

<?php $__env->startSection('content'); ?>
<!--==================================================-->
<!-- Start Consalt Breadcumb Area -->
<!--==================================================-->
<div class="breadcumb-area d-flex">
=======
@extends('layouts.app_front')
@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center mt-5">
>>>>>>> Stashed changes:resources/views/blog-list.blade.php
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="breadcrumb-title mb-2">Blog Grid</h2>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb justify-content-center mb-0">
						<li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i></a></li>
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active" aria-current="page">Blog Grid</li>
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
			<div class="row justify-content-center align-items-center" id="blog-container">
				@include('blog-items') 
			</div> 
			<div class="text-center mt-4" id="loading" style="display:none;">
				<strong>Loading more blogs...</strong>
			</div>
			{{-- <div class="table-paginate d-flex justify-content-center align-items-center flex-wrap row-gap-3">
				<div class="d-flex align-items-center justify-content-center">
					<nav aria-label="Page navigation">
						<ul class="paginations d-flex justify-content-center align-items-center">
							<li class="page-item me-2"><a class=" d-flex justify-content-center align-items-center" href="#"><i class="ti ti-arrow-left me-2"></i>Prev</a></li>
							<li class="page-item me-2"><a class="page-link-1 active d-flex justify-content-center align-items-center " href="#">1</a></li>
							<li class="page-item me-2"><a class="page-link-1 d-flex justify-content-center align-items-center" href="#">2</a></li>
							<li class="page-item "><a class="page-link-1 d-flex justify-content-center align-items-center me-2" href="#">3</a></li>
							<li class="page-item "><a class="page-link-1 d-flex justify-content-center align-items-center me-2" href="#">4</a></li>
							<li class="page-item me-2"><a class="d-flex justify-content-center align-items-center" href="#">Next <i class="ti ti-arrow-right ms-2"></i></a></li>
						</ul>
					</nav>
				</div>
			</div> --}}
		</div>
<<<<<<< Updated upstream:storage/framework/views/a89d56ace68d57cecc4df9d363825297.php
		<div class="row" id="blog-container">
            <?php echo $__env->make('blog-items', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
		</div>
        <div class="text-center mt-4" id="loading" style="display:none;">
            <strong>Loading more blogs...</strong>
        </div>
	</div>
</section>
<!--==================================================-->
<!-- End Consalt Blog Area -->
<!--==================================================-->
<?php $__env->stopSection(); ?>
=======
	</div>
</div>
<!-- /Page Wrapper -->
@endsection
>>>>>>> Stashed changes:resources/views/blog-list.blade.php


<?php $__env->startPush('scripts'); ?>
<script>
let page = 1;
let loading = false;

function loadMoreBlogs() {
    if (loading) return;
    loading = true;
    $('#loading').show();

    page++;
    $.ajax({
        url: `<?php echo e(route('blogs')); ?>?page=${page}`,
        type: 'GET',
        success: function(res) {
            if (res.trim() === '') {
                $(window).off('scroll'); // stop if no more data
                $('#loading').html("<strong>No more blogs.</strong>");
                return;
            }
            $('#blog-container').append(res);
            loading = false;
            $('#loading').hide();
        }
    });
}

$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
        loadMoreBlogs();
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app_front', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/blog-list.blade.php ENDPATH**/ ?>