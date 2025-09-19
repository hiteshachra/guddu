@extends('front.layouts.app')
@section('content')
<style>
  .btn-discount-badge {
    position: relative;
  }

  .btn-discount-badge .badge-discount {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: red;
    color: white;
    font-size: 0.7rem;
    padding: 2px 6px;
    border-radius: 10px;
  }
</style>
<div class="row mb-3">
    <div class="col-auto">
        <div class="card">
            <div class="card-body p-1">
                <div class="avatar avatar-44 rounded-15 shadow-sm">
                    <img src="{{asset('assets/img/coin_rupee.jpeg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="col align-self-center ps-0">
        <p class="mb-1 text-color-theme">Withdraw Request</p>
    </div>
    <div class="col-auto">
        <a href="{{url('withdraw-request-list')}}" class="btn btn-default btn-44 shadow-sm">
            <i class="bi bi-receipt"></i>
        </a>
    </div>
</div>
<div class="card shadow-sm mb-4">
    <div class="card theme-bg text-white border-0 text-center">
        <div class="card-body">
            <h1 class="display-1 my-2">{{config('app.currency_symbol')}} <span id="main_balance">{{number_format($walletData->main_balance, 2)}}</span></h1>
            <p class="text-muted mb-2">Main Balance</p>
        </div>
    </div>
</div>

<form method="post"  action="{{url('withdraw-request')}}">
    @csrf
<!-- select Amount -->
<div class="row">
    <div class="col-12 text-center mb-2">
        <input type="text" class="trasparent-input text-center" data-amount="{{$walletData->main_balance}}" name="amount" id="amount" value="{{old('amount')}}" placeholder="Enter Amount" style="background-color: rgba(0, 0, 0, 0.1); outline: none;" autocomplete="off">
    </div>
    <div class="col-12 mt-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <p>User Name</p>
                    </div>
                    <div class="col-auto text-end">
                        <p class="text-muted">{{$bankInfo->user_name_at_bank}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Bank Name</p>
                    </div>
                    <div class="col-auto text-end">
                        <p class="text-muted">{{$bankInfo->name}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Branch</p>
                    </div>
                    <div class="col-auto text-end">
                        <p class="text-muted">{{$bankInfo->branch}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>IFSC Code</p>
                    </div>
                    <div class="col-auto text-end">
                        <p class="text-muted">{{$bankInfo->ifscode}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Account Number</p>
                    </div>
                    <div class="col-auto text-end">
                        <p class="text-muted">{{$bankInfo->account_number}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>UPI</p>
                    </div>
                    <div class="col-auto text-end">
                        <p class="text-muted">{{$bankInfo->upi_id}}</p>
                    </div>
                </div>

                <div class="row fw-medium">
                    <div class="col-12">
                        <div class="dashed-line mb-3"></div>
                    </div>
                    <div class="col-12 text-center text-danger">
                        {{$bankInfo->status == 'PENDING' || $bankInfo->status == 'RESUBMIT'?'Please update bank account details':''}}
                        {{$bankInfo->status == 'REJECT'?'Please update bank account details':''}}
                    </div>
                    <div class="col">
                        <p>Status</p>
                    </div>
                    <div class="col-auto text-end">
                        <p class="text-muted">{{$bankInfo->status}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mb-4">
        <div class="form-group form-floating is-valid">
            <input type="text" class="form-control " id="remark" name="remark" placeholder="Enter Remark" value="">
            <label class="form-control-label" for="coupon">Remark</label>
        </div>
    </div>
    @if($bankInfo->status == 'VERIFIED')
        <div class="col-12 ">
            <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">
                WITHDRAW 
            </button>
        </div>
    @endif
</div>
<!-- coupon code-->

</form>
<script>
 function toNumber(str) {
    if (!str || str.trim() === '') return 0; 
    let num = parseFloat(str.replace(/[^0-9.]/g, ''));
    return isNaN(num) ? 0 : num;
}

const $amount = $('#amount');

$amount.on('input', function () {
    let val = toNumber($(this).val());
    let raw = toNumber($(this).data('amount'));

    if (val > raw) {
        val = raw;
        $(this).val(val.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));
    }

    let formatted = (raw - val).toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    $("#main_balance").text(formatted);
});

$amount.on('keypress', function (e) {
    const key = String.fromCharCode(e.which);
    if (!/[0-9.]/.test(key)) {
        e.preventDefault(); // Block non-numeric input
        return;
    }

    let val = toNumber($(this).val() + key);
    let raw = toNumber($(this).data('amount'));
    if (val > raw) {
        e.preventDefault(); // Stop key press if it would exceed balance
    }
});

$amount.on('paste', function (e) {
    const pastedData = (e.originalEvent || e).clipboardData.getData('text');
    let val = toNumber($(this).val() + pastedData);
    let raw = toNumber($(this).data('amount'));
    if (val > raw) {
        e.preventDefault(); // Stop paste if over limit
    }
});

</script>
@endsection