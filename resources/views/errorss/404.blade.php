<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="{{config('app.description')}}" />
    <meta name="keywords" content="{{config('app.description')}}"/>
    <meta name="robots" content="index, follow">
    <meta name="copyright" content="{{config('app.copyright')}}" />
    <meta name="author" content="Durgesh Verma" />
    <meta name="email" content="durgeshvrm010@gmail.com" /> 
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick-theme.min.css')}}" />
    <link href="{{asset('vendor/icons/icofont.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/sidebar/demo.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/3M Trislan.css')}}" rel="stylesheet">

    <!--for whatsappp facebook linkedin-->
    <meta property="taboola:title" content="{{ config('app.name') }}"/>
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="699" />
    <meta property="og:image:height" content="486" />
    <meta property="og:image:alt" content="{{ config('app.name') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:description" content="{{config('app.description')}}">
    <meta property="og:type" content="article">
     <!--for linkedin -->
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="{{config('app.description')}} ">
    <meta name="twitter:image:width" content="662" />
    <meta name="twitter:image:height" content="127" />
    <meta name="twitter:card" content="{{ config('app.name') }}">
    <meta name="twitter:site" content="@AppworksTECHNO">
    <meta property="og:url" content="{{url()->full()}}" />
</head>
<body>
<nav aria-label="breadcrumb" class="breadcrumb mb-0 d-none">
   <div class="container">
      <ol class="d-flex align-items-center mb-0 p-0">
         <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page"></li>
      </ol>
   </div>
</nav>

<section class="py-4 osahan-main-body">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 ">
            <div class="text-center">
               <img src="{{asset('error-404.webp')}}">
                  <h3 class="h2">Look like you're lost</h3>
                  <p>the page you are looking for not avaible!</p>
                  <a class="btn btn-lg btn-info" href="{{url('/')}}">Go Back Home</a>
            </div>
         </div>
      </div>
   </div>
</section>
</body>
</html>