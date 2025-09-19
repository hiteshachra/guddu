@extends('front.layouts.app')
@section('content')
<!-- Transactions -->
<div class="row mb-3">
      <div class="col">
        @if(auth()->user()->role == 2)
         <h6 class="title">Pay Request<br>
        @else
         <h6 class="title">Pay History<br>
        @endif
         </h6>
      </div>
</div>
<div class="row mb-4">
      <div class="col-12">
         <div class="card">
            <div class="card-body p-0">
                    @if(auth()->user()->role == 2)
                    <ul class="list-group list-group-flush bg-none" id="data-wrapper">
                        @include('front.account.partials.coin-trans-received') 
                    </ul>
                    @endif
                    @if(auth()->user()->role == 3)
                    <ul class="list-group list-group-flush bg-none" id="data-wrapper">
                        @include('front.account.partials.coin-trans-send') 
                    </ul>
                    @endif
                    <div id="loader" class="mb-3" style="text-align:center; display: none;">
                        <p>Loading...</p>
                    </div>
            </div>
         </div>
      </div>
</div>



<div class="position-fixed bottom-0 start-50 translate-middle-x z-index-99">
    <div class="toast mb-3" role="alert" aria-live="assertive" aria-atomic="true" id="conform-action" data-bs-animation="true">
        <div class="toast-header text-bg-success">
            <img src="{{ asset('logo-icon.png') }}" style="width: 25px;" class="rounded me-2" alt="...">
            <strong class="me-auto" id="toast-title">Confirm</strong>
            <small>now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <div class="row">
    <!--             <div class="col" id="toast-message">
                    Are you sure?
                </div> -->
                <div class="form-group">
                    <label for="amount">Send Poins</label>
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter Poins to be send">
                </div>
                <div class="form-group">
                    <label for="remark">Remark</label>
                    <textarea id="remark" name="remark" class="form-control" placeholder="Enter Remark"></textarea>
                    <div class="invalid-feedback d-block" id="error-amount"></div>
                </div>
                <div class="col-12 align-self-center mt-4">
                    <button class="btn btn-success btn-sm me-1 w-100" id="toast-yes-btn">Yes</button>
                    <button class="btn btn-danger btn-sm mt-2 w-100" id="toast-no-btn" data-bs-dismiss="toast">No</button>
                </div>
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
        url: "{{ url('coin-transaction') }}?page=" + page,
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

function confirmSubmit(id, status) {
    $('#error-amount').text('');
    showConfirmationToast({
        title: "Confirm",
        message: "Are you sure? ",
        yesText: "Yes",
        noText: "No",
        onConfirm: function () {
            $('#error-amount').text('');
            var amt = $('#amount').val();

            $.ajax({
                url: `{{ url('coin-transaction-verify') }}?id=${id}&status=Approved&amount=${amt}`,
                type: "GET",
                success: function (data) {
                    if(data['status'] == 'success') {   
                        $('#statusid_'+data['data']['id']).html(data['data']['status']).removeClass('text-danger').addClass('text-success');
                        $('#btnid_'+data['data']['id']).html('');
                        location.reload();
                    } else {
                        $('#error-amount').text(data['message']);
                        const toastElement = new bootstrap.Toast(document.getElementById("conform-action"));
                        toastElement.show();   
                    }
                },
                error: function (error) {
                        $('#error-amount').text(error.responseJSON.message);
                        const toastElement = new bootstrap.Toast(document.getElementById("conform-action"));
                        toastElement.show();
                }
            });
        }
    });
}
</script>
<script>
    let toastAction = null;

    function showConfirmationToast({ title, message, yesText = "Yes", noText = "No", onConfirm }) {
        // Set content
        document.getElementById("toast-title").innerText = title;
        // document.getElementById("toast-message").innerText = message;
        document.getElementById("toast-yes-btn").innerText = yesText;
        document.getElementById("toast-no-btn").innerText = noText;

        // Set action
        toastAction = onConfirm;

        // Show toast
        const toastElement = new bootstrap.Toast(document.getElementById("conform-action"));
        toastElement.show();
    }

    // Handle confirm click
    document.getElementById("toast-yes-btn").addEventListener("click", function () {
        if (typeof toastAction === "function") {
            toastAction();
        }
        bootstrap.Toast.getInstance(document.getElementById("conform-action")).hide();
    });
</script>
@endsection