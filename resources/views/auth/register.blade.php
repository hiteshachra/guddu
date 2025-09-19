<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name')}} | Vendor Registration</title>
  <link rel="apple-touch-icon" href="{{asset('favicon.ico')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page" style="background:linear-gradient(rgb(187 15 163 / 42%), rgb(45 52 216 / 46%)), url({{asset('dist/img/14457362.jpg')}});background-repeat: no-repeat;background-size: cover;background-position: center;height: 100vh;margin: 0;">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{url('/')}}" class="h1">  <img src="{{asset('logo.png')}}" width="100"> </a> 
    </div>
    <div class="card-body">
      <h4 class="login-box-msg">{{-- request()->type == 2?'Vendor':'User' --}} Registration</h4>
      <form  method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf
        <input type="hidden" name="type" value="{{request()->type}}">
        <div class="row mb-2 mt-2">

          @if (!empty(request()->referral_code))
            <div class="col-md-12">
                <label for="referral_code" class="col-form-label text-md-end">{{ __('Referral Code') }}</label>
                <input id="referral_code" type="text" class="form-control form-control-sm @error('referral_code') is-invalid @enderror"  placeholder="Enter Your Referral Code." name="referral_code" value="{{ old('referral_code', request()->referral_code) }}" required readonly>
                @error('referral_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 
          @endif
            <div class="col-md-12">
                <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"  placeholder="Enter Your Name." name="name" value="{{ old('name') }}" required>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Enter Your Email Address." name="email" value="{{ old('email') }}" required>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="phone_number" class="col-form-label text-md-end">{{ __('Phone Number') }}</label>
                <input id="phone_number" type="number" max="9999999999" class="form-control form-control-sm @error('phone_number') is-invalid @enderror" placeholder="Enter Your Phone Number." name="phone_number" value="{{ old('phone_number') }}" required>
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12">
                <label class="col-form-label text-md-end" for="role">Role </label>
                <select class="form-control form-control-sm select2 @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
                  <option value="">Select Role</option>
                  <option value="2" {{old('role_id') == 2? 'selected':''}}>Vendor</option>
                  <option value="3" {{old('role_id') == 3? 'selected':''}}>Users</option>
                </select>
                @error('role_id')
                    <span  class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control form-control-sm"  placeholder="Enter Confirm Password" name="password_confirmation" required>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
          @if ($typeError)
          <div class="col-12 mb-3 mt-1 text-center">
            <span class="text-danger center" role="alert">
                <strong>Invalid Registration URL</strong>
            </span>
          </div>
          @else
          <div class="col-12 mb-3 mt-1">
            <button type="submit" class="btn btn-outline-primary btn-block"><i class="fas fa-save mr-2"></i> {{ __('Register') }}</button>
          </div>
          @endif
          <div class="col-6">
            <a href="{{url('/')}}" class="btn btn-outline-success btn-block"><i class="fas fa-home mr-2"></i>{{ __('Home') }}</a>
          </div>
          <div class="col-6">
            <a href="{{url('/login')}}" class="btn btn-outline-info btn-block"><i class="fas fa-sign-in-alt mr-2"></i> {{ __('Login') }}</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>
</html>