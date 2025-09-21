
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
						<h4>Blog Grid</h4>
					</div>
					<ul>
						<li><a href="index.html"><i class="bi bi-house-door-fill"></i> Home </a></li>
						<li class="rotates"><i class="bi bi-slash-lg"></i>Blog Grid</li>
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
<!-- Start Consalt Blog Area -->
<!--==================================================-->
<section class="blog_area inner_page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section_title text-center">
					<h4>LATEST BLOG</h4>
					<h1>Read Our Latest Insights from the</h1>
					<h1>Latest Blog Articles</h1>
				</div>
			</div>		
		</div>
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