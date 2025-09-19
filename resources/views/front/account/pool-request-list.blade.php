@extends('front.layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h6 class="title">Pool Requests</h6>
    </div>
    <div class="col-auto align-self-center">
    </div>
</div>
<div class="row">
    <div class="col">
        @include('front.account.pagination.pool-request-list') 
    </div>    
    <div id="loader" class="mb-3" style="text-align:center; display: none;">
        <p>Loading...</p>
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
        url: "{{ url('withdraw-request-list') }}?page=" + page,
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