@extends('front.layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col align-self-center">
        <h6 class="title">Referral List</h6>
    </div>
    <div class="col-auto">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm mb-4 ">
            <ul class="list-group list-group-flush bg-none">
                @include('front.account.pagination.my-referral') 
            </ul>
            <div id="loader" class="mb-3" style="text-align:center; display: none;">
                <p>Loading...</p>
            </div>
        </div>
    </div>
</div>
<script>
let page = 1;
let isLoading = false;

$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !isLoading) {
        page++;
        loadMoreData(page);
    }
});

function loadMoreData(page) {
    isLoading = true;
    $('#loader').show();

    $.ajax({
        url: "{{ url('my-referrals') }}?page=" + page,
        type: "GET",
        success: function (data) {
            console.log(data);
            if (data.trim() === '') {
                $('#loader').html("No more records");
                return;
            }
            $('#data-wrapper').append(data);
            isLoading = false;
            $('#loader').hide();
        },
        error: function () {
            console.log("Server error");
        }
    });
}
</script>
@endsection