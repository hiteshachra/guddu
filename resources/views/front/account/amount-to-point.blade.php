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
    <div class="col align-self-center">
        <h6 class="title">Purchase Points</h6>
    </div>
    <div class="col-auto">
    </div>
</div>
<div class="row mb-3">
    <div class="col-auto">
        <div class="card">
            <div class="card-body p-1">
                <div class="avatar avatar-44 rounded-15 shadow-sm">
                    <img src="{{asset('assets/img/coin_prizoo.jpeg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="col align-self-center ps-0">
        <p class="mb-1 text-color-theme">Total Points</p>
        <p class="text-muted size-12">{{number_format($walletData->dmt_balance,2)}}</p>
    </div>
    <div class="col-auto">
        <a href="{{url('purchase-point-history')}}" class="btn btn-default btn-44 shadow-sm">
            <i class="bi bi-receipt"></i>
        </a>
    </div>
</div>

<form method="post"  action="{{url('amount-to-points')}}">
    @csrf
<!-- select Amount -->
<div class="row">
    <div class="col-12 text-center mb-2">
        <input type="number" class="trasparent-input text-center" name="amount" id="amount" value="{{old('amount')}}" placeholder="Enter Amount" style="background-color: rgba(0, 0, 0, 0.1); outline: none;" min="1" max="1000000000">
        <div class="text-center mt-2">
            <span class="text-muted" style="font-size: 25px;">Rupee To Point</span>
        </div>    
    </div>
    <div class="col-12 text-center mb-4">
        <input type="number" class="trasparent-input text-center" name="point" id="point" value="{{old('point', '0.00')}}" placeholder="Enter Point" style="background-color: rgba(0, 0, 0, 0.1); outline: none;"  readonly>
        @error('point')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror    
        @error('amount')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
<!-- Amount breakdown -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <p class="mb-0">Offer Points</p>
                <small class="text-danger" style="font-size: 12px;">If you buy points without selecting the offer then you will get {{config('app.coin_in_inr')}} points for 1 rupee</small>
            </div>
        </div>
        <div class="row mb-3">
            @foreach($tariffData as $value)
            <div class="col-12 col-md-4 col-lg-3 gy-4">
                <button type="button" class="btn btn-outline-primary btn-lg shadow-sm w-100 btn-discount-badge" onclick="setValueForm('{{$value->amount}}', '{{$value->points}}', '{{$value->id}}')" style="font-weight: 700;" > <span class="text-danger">
                  {{config('app.currency_symbol')}}{{ number_format($value->amount, 2) }} <b>=</b></span> <span class="text-success">{{ number_format($value->points, 2) }} Pts </span>
                  @if($value->percentage != '' && $value->percentage > 0)
                  <span class="badge-discount">{{$value->percentage}} off</span>
                  @endif
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">
            Purchase Points
        </button>
    </div>
</div>
</form>
<script>
    function setValueForm(amount, points, id) {
        $('#amount').val(amount);
        $('#point').val(points);
    }


    document.addEventListener('DOMContentLoaded', function () {
        const amountInput = document.getElementById('amount');
        const amountInWords = document.getElementById('amount_in_words');

        amountInput.addEventListener('keydown', function (e) {
          if (['e', 'E', '+', '-'].includes(e.key)) {
            e.preventDefault();
          }
        });

        amountInput.addEventListener('input', function () {
          const num = parseInt(this.value);
          const min = parseInt(this.min);
          const max = parseInt(this.max);

          if (isNaN(num)) {
              amountInWords.textContent = '';
              return;
            }

            if (num < min) {
              this.value = min;
              num = min;
            } else if (num > max) {
              this.value = max;
              num = max;
            }

            amountInWords.textContent = numberToWords(num);
          });

        function numberToWords(num) {
          const a = [
            '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten',
            'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen',
            'Seventeen', 'Eighteen', 'Nineteen'
          ];
          const b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

          function inWords(n) {
            if (n < 20) return a[n];
            if (n < 100) return b[Math.floor(n / 10)] + (n % 10 ? ' ' + a[n % 10] : '');
            if (n < 1000) return a[Math.floor(n / 100)] + ' Hundred' + (n % 100 ? ' ' + inWords(n % 100) : '');
            if (n < 100000) return inWords(Math.floor(n / 1000)) + ' Thousand' + (n % 1000 ? ' ' + inWords(n % 1000) : '');
            if (n < 10000000) return inWords(Math.floor(n / 100000)) + ' Lakh' + (n % 100000 ? ' ' + inWords(n % 100000) : '');
            return inWords(Math.floor(n / 10000000)) + ' Crore' + (n % 10000000 ? ' ' + inWords(n % 10000000) : '');
          }

          return inWords(num);
        }
    });
</script>
@endsection