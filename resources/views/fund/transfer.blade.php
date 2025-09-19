@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Fund Transfer</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
            <li class="breadcrumb-item">Wallet</li>
            <li class="breadcrumb-item active">Fund Transfer</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Fund Transfer</h3></div>
                <div class="col-sm-12 col-md-6 text-right"><a href="{{url('fund/transfer-list')}}" class="btn btn-sm btn-warning"><i class="fas fa-list-ol"></i> &ensp;Fund Transfer List</a></div>
              </div>
            </div>
            <form method="post" action="" id="submit-form" enctype="multipart/form-data">
              <div class="card-body">
                @csrf
                <div class="row"> 

                  <div class="col-sm-3">
                     <div class="form-group">
                          <label for="wallet_type">Ledger Type <code>*</code></label>
                          <select class="form-control select2 @error('ledger_type') is-invalid @enderror" name="ledger_type" id="ledger_type">
                            <option value="">Select Ledger Type</option>
                            <option value="1" {{old('ledger_type') == '1'? 'selected':''}}>Transfer</option>
                            <option value="2" {{old('ledger_type') == '2'? 'selected':''}}>Deduct</option>
                          </select>
                          @error('ledger_type')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>  
                  <div class="col-sm-3">
                     <div class="form-group">
                          <label for="wallet_type">Balance Type <code>*</code></label>
                          <select class="form-control select2 @error('wallet_type') is-invalid @enderror" name="wallet_type" id="wallet_type">
                            <option value="">Select Balance Type</option>
                            <option value="DMT" {{old('wallet_type') == 'DMT'? 'selected':''}}>Points</option>
                            <option value="MAIN" {{old('wallet_type') == 'MAIN'? 'selected':''}}>Main</option>
                          </select>
                          @error('wallet_type')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>     
                </div>     
                <div class="row"> 
                  <div class="col-sm-12">
                    <h5>User Info</h5>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="control-label" for="phone_number">Phone Number<code>*</code></label>
                      <input type="number" id="phone_number" name="phone_number" class="form-control form-control-sm @error('phone_number') is-invalid @enderror" placeholder="Enter Phone Number." value="{{ old('phone_number') }}" onblur="getUserByPhone(this.value)">
                      @error('phone_number')
                            <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="control-label" for="user_name">User Name<code>*</code></label>
                      <input type="text" id="user_name" name="user_name" class="form-control form-control-sm @error('user_name') is-invalid @enderror" placeholder="Enter User Name." value="{{old('user_name')}}" readonly>
                      @error('user_name')
                            <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="control-label" for="points">Points<code>*</code></label>
                      <input type="text" id="points" name="points" class="form-control form-control-sm @error('points') is-invalid @enderror" value="{{old('points')}}" readonly>
                      @error('points')
                            <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="control-label" for="main_balance">Main Balance<code>*</code></label>
                      <input type="text" id="main_balance" name="main_balance" class="form-control form-control-sm @error('main_balance') is-invalid @enderror" value="{{old('main_balance')}}" readonly>
                      @error('main_balance')
                            <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> 
                </div>     
                <div class="row"> 
                  <div class="col-sm-12">
                    <h5>Amount / Remark</h5>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="control-label" for="amount">Amount <code>Min: 1 - Max: 1000000000</code></label>
                      <input type="number" id="amount" name="amount" class="form-control form-control-sm @error('amount') is-invalid @enderror" placeholder="Enter Amount." value="{{old('amount')}}" min="1" max="1000000000">
                      @error('amount')
                            <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label class="control-label" for="remark">Remark</label>
                      <input type="text" id="remark" name="remark" class="form-control form-control-sm @error('remark') is-invalid @enderror" placeholder="Enter Remark." value="{{old('remark')}}">
                      @error('remark')
                            <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    Amount in words -: <span id="amount_in_words"></span>
                  </div>
                  <div class="col-12"><span id="errors"></span>
                  </div>
                </div>                
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary bg-gradient"><i class="far fa-save"></i> Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  function getUserByPhone(phone) {
      if (!phone) return;

      $('#errors').text('');
      fetch(`/find-user-name?referral_code=${phone}`)
      .then(res => res.json())
      .then(data => {
          if (data['status'] == 'success') {
           $('#user_name').val(data['name']);
           $('#points').val(data['dmt_balance']);
           $('#main_balance').val(data['main_balance']);
          } else {
            $('#errors').text('User not found');
          }
      })
      .catch(err => {
          $('#errors').text('not fetching user');
      });
  }
</script>
<script>
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