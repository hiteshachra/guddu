<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name')}} | {{ __('Reset Password') }}</title>
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
      <h4 class="login-box-msg pb-3">{{ __('Reset Password') }}</h4>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
      <form  method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append"> <div class="input-group-text"> <span class="fas fa-envelope"></span> </div> </div>
            @error('email')
                <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>
</html>