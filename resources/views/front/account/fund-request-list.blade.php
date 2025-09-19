@extends('front.layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h6 class="title">Add Money History</h6>
    </div>
    <div class="col-auto align-self-center">
        <a href="{{url('add-money')}}" class="small">Add Money</a>
    </div>
</div>
<div class="row">
    <div class="col">
        @include('front.account.pagination.fund-request-list') 
    </div>    
    <div id="loader" class="mb-3" style="text-align:center; display: none;">
        <p>Loading...</p>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content position-relative">
      <div class="modal-body text-center p-0">
        <!-- Close Button on the right side -->
        <span onclick="closeImageModal()" type="button" class="position-absolute top-50 end-0 me-3" style="right: 0; margin-right: -16px; margin-top: -20px; font-size: 30px; color: #b40404;"><i class="fas fa-window-close"></i></span>
        <!-- Image -->
        <img id="modalImage" src="" style="max-width: 100%; max-height: 80vh;">
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
        url: "{{ url('fund-request-list') }}?page=" + page,
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

function showImageModal(imageUrl) {
  // Set image source
  $('#modalImage').attr('src', imageUrl);

  // Show modal using jQuery and Bootstrap
  $('#imageModal').modal('show');
}

function closeImageModal() {
  $('#imageModal').modal('hide');
}
</script>
@endsection