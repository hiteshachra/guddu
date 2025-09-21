@foreach ($data as $blog)
<div class="col-xl-4 col-md-6">
    <div class="card p-0">
        <div class="card-body p-0">
            <div class="img-sec w-100">
                <a href="{{ route('blog_details', [$blog->slug]) }}">
                    <img src="{{asset('blog/'.$blog->image)}}" alt="{{ $blog->title }}" class="img-fluid rounded-top w-100"></a>
                <div class="image-tag d-flex justify-content-end align-items-center">
                    <span class="trend-tag">{{ $blog->category->name }}</span>
                </div>
            </div>
            <div class="p-3">
                <div class="d-flex align-items-center mb-3  ">
                    <div class="d-flex align-items-center border-end pe-2">
                        <span class="avatar avatar-sm me-2">
                            <img src="{{asset('images/user-1.svg')}}" class="rounded-circle" alt="user">
                        </span>
                        <h6 class="fs-14 text-gray-6">Admin</h6>
                    </div>
                    <div class="d-flex align-items-center ps-2">
                        <span><i class="ti ti-calendar me-2"></i></span>
                        <span class="fs-14">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</span>
                    </div>
                </div>
                <div>
                    <h6 class="fs-16 text-truncate mb-1"><a href="{{ route('blog_details', [$blog->slug]) }}">{{ Str::limit($blog->title, 50, '...') }}</a></h6>
                    <p class="fs-14">{{ Str::limit($blog->title, 100, '...') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach