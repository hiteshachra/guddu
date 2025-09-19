@extends('front.layouts.app')
@section('content')
@php
    $profile_image = 'assets/img/user-1.svg';  
    if(auth()->user()->gender == 'Female' ) {
        $profile_image = 'assets/img/user-2.svg';
    }
@endphp
<div class="row mb-3">
    <div class="col align-self-center">
        <h6 class="title">Wallet</h6>
    </div>
    <div class="col-auto">
    </div>
</div>
<!-- wallet balance -->
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
                <div class="avatar avatar-44 rounded-10">
                    <img src="{{asset('images/kyc/user_photo/'.auth()->user()->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo">
                </div>
            </div>
            <div class="col px-0 align-self-center">
                <p class="mb-0 text-color-theme">{{auth()->user()->name}}</p>
                <p class="text-muted size-12">{{auth()->user()->reg_code}} | {{auth()->user()->roles->role_name}}</p>
            </div>
            <div class="col-auto">
                @if(auth()->user()->role == 2)
                    @if($ledger_type == 'point')
                    <a href="{{url('amount-to-points')}}" class="btn btn-44 btn-light shadow-sm">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    @else
                    <a href="{{url('add-money')}}" class="btn btn-44 btn-light shadow-sm">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    @endif
                @endif
                <a href="{{url('withdraw-request')}}" class="btn btn-44 btn-default shadow-sm ms-1">
                    <i class="bi bi-arrow-down-circle"></i>
                </a>
            </div>
        </div>
    </div>
    @if($ledger_type == 'point')
    <div class="card theme-bg text-white border-0 text-center">
        <div class="card-body">
            <h1 class="display-1 my-2">{{config('app.coin_symbol')}} {{number_format($wallet_data->dmt_balance, 2)}}</h1>
            <p class="text-muted mb-2">Total Points</p>
        </div>
    </div>
    @else
    <div class="card theme-bg text-white border-0 text-center">
        <div class="card-body">
            <h1 class="display-1 my-2">{{config('app.currency_symbol')}} {{number_format($wallet_data->main_balance, 2)}}</h1>
            <p class="text-muted mb-2">Total Main Balance</p>
        </div>
    </div>
    @endif
</div>

<!-- tabs structure -->
<!-- <ul class="nav nav-pills nav-justified tabs mb-3" id="assetstabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#cards" type="button" role="tab" aria-controls="cards" aria-selected="true">Points</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="currency-tab" data-bs-toggle="tab" data-bs-target="#currency" type="button" role="tab" aria-controls="currency" aria-selected="false">Main Balance</button>
    </li>
</ul> -->
<ul class="nav nav-pills nav-justified tabs mb-3" id="assetstabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a href="{{url('my-wallet')}}?type=point" class="nav-link {{$ledger_type == 'point'?'active':''}}">Points</a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="{{url('my-wallet')}}?type=main" class="nav-link {{$ledger_type == 'main'?'active':''}}" type="button">Main Balance</a>
    </li>
</ul>
<div class="tab-content" id="assetstabsContent">
    <div class="tab-pane fade active show" id="cards" role="tabpanel">
        <!-- Transactions -->
        <div class="row mb-3">
            <div class="col">
                <h6 class="title">Transactions</h6>
            </div>                        
        </div>
        <div class="row mb-4">
            <div class="col-12 px-0">
                <ul class="list-group list-group-flush bg-none">
                
                    @include('front.account.pagination.transactions') 
                
                    <div id="loader" class="mt-3 mb-3" style="text-align:center; display: none;">
                        <p>Loading...</p>
                    </div>
                </ul>
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
        url: "{{ url('my-wallet') }}?page=" + page + "&type={{$ledger_type}}",
        type: "GET",
        success: function (data) {
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