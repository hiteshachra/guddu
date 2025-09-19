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

  .upload-box {
    width: 100%;
    height: 200px;
    border: 1px dashed #ccc;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: #f9f9f9;
    overflow: hidden;
    position: relative;
    flex-direction: column;
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
    -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.placeholder {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #aaa;
}

.plus-icon {
  font-size: 40px;
  margin-bottom: 5px;
}

.preview-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  border-radius: 5px;
}

.remove-button {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 12px;
    cursor: pointer !important;
}
</style>
<div class="row mb-3">
    <div class="col align-self-center">
        <h6 class="title">Add Money</h6>
    </div>
    <div class="col-auto">
    </div>
</div>
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
        <p class="mb-1 text-color-theme">Total Main Balance</p>
        <p class="text-muted size-12">{{number_format($wallet_data->main_balance,2)}}</p>
    </div>
    <div class="col-auto">
        <a href="{{url('fund-request-list')}}" class="btn btn-default btn-44 shadow-sm">
            <i class="bi bi-receipt"></i>
        </a>
    </div>
</div>

<form method="post"  action="{{url('add-money')}}" enctype="multipart/form-data">
    @csrf
<!-- select Amount -->
<div class="row gy-3">
    <div class="col-12">
        <input type="number" class="trasparent-input text-center" name="amount" id="amount" value="{{old('amount')}}" placeholder="Enter Amount" style="background-color: rgba(0, 0, 0, 0.1); outline: none;" min="1" max="1000000000">
        @error('amount')
            <span  class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>


    <div class="col-12 mb-4 mt-4">
        <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">Add Money</button>
    </div>
</div>
<a href="upi://pay?pa=yourname@okaxis&pn=Your+Name&am=150&cu=INR">
  Pay ₹150 with Google Pay
</a>
<div id="google-pay-button-container"></div>
</form>
<script async src="https://pay.google.com/gp/p/js/pay.js"></script>
<script>
$(document).ready(function () {
    const paymentsClient = new google.payments.api.PaymentsClient({ environment: 'TEST' });

    const paymentDataRequest = {
      apiVersion: 2,
      apiVersionMinor: 0,
      allowedPaymentMethods: [{
        type: 'UPI',
        parameters: {
          // For UPI support
        }
      }],
      merchantInfo: {
        merchantId: 'YOUR_MERCHANT_ID',
        merchantName: 'Your Business Name'
      },
      transactionInfo: {
        totalPriceStatus: 'FINAL',
        totalPrice: '100.00',
        currencyCode: 'INR',
        countryCode: 'IN'
      }
    };

    // Show the Google Pay button
    paymentsClient.isReadyToPay({ allowedPaymentMethods: paymentDataRequest.allowedPaymentMethods })
      .then(function(response) {
        if (response.result) {
          const button = paymentsClient.createButton({
            onClick: () => {
              paymentsClient.loadPaymentData(paymentDataRequest).then(paymentData => {
                console.log('Payment successful', paymentData);
                // Send token to your server for processing
              });
            }
          });
          document.getElementById('google-pay-button-container').appendChild(button);
        }
    });


    $('#fileInput').on('change', function (e) {
      const file = e.target.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (event) {
          $('#previewImage').attr('src', event.target.result).show();
          $('#placeholder').hide();
          $('#removeBtn').show();
        };
        reader.readAsDataURL(file);
      }
    });
    $('#removeBtn').on('click', function (e) {
      e.preventDefault();
      $('#fileInput').val('');
      $('#previewImage').hide().attr('src', '');
      $('#placeholder').show();
      $('#removeBtn').hide();
    });
});

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