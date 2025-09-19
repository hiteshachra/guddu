<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name')}} | Login</title>
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
      <h4 class="login-box-msg pb-3">Login</h4>

      <form  method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
            @if(session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
            @endif
            @if(!session('error'))
            @error('email')
                <span class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @endif
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
            @error('password')
                <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>

<!--       <div class="social-auth-links text-center mt-2 mb-3">
        <a href="{{url('register')}}?type=2HWmoSWWX8mFxQfgwLgMpA" class="btn btn-block btn-primary">
          <i class="fa fa-users mr-2"></i>User Signup
        </a>
      </div>
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="{{url('register')}}?type=yUKFoA8E0rptnYlqza0WJw" class="btn btn-block btn-info">
          <i class="fa fa-users mr-2"></i>Vendor Signup
        </a>
      </div> -->
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="{{url('register')}}" class="btn btn-block btn-primary">
          <i class="fa fa-users mr-2"></i>Signup
        </a>
      </div>
      @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
      @endif
<!--       <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
  </div>
  </div>
</body>
</html>
