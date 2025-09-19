<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ config('app.name') }} | {{$title??""}}</title>
    <meta name="description" content="{{config('app.description')}}" />
    <meta name="keywords" content="{{config('app.description')}}"/>
    <meta name="robots" content="index, follow">
    <meta name="copyright" content="{{config('app.copyright')}}" />
    <meta name="author" content="Durgesh Verma" />
    <meta name="generator" content="">
    <meta name="email" content="durgeshvrm010@gmail.com" /> 
    <meta name="_token" content="{{ csrf_token() }}">

    <!--for whatsappp facebook linkedin-->
    <meta property="taboola:title" content="{{ config('app.name') }} | {{$title??''}}"/>
    <meta property="og:title" content="{{$title??''}} {{ config('app.name') }}">
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
    <meta name="twitter:site" content="">
    <meta property="og:url" content="{{url()->full()}}" />
    <link rel="canonical" content="{{url('/')}}"/>

    @include('front.layouts.custom-css')


    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('favicon.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="{{asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css')}}">

    <!-- style css for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" id="style">

    <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
    
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
    </style>
</head>

<body class="body-scroll" data-page="index">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="logo-wallet">
                    <img class="wallet-top-new flip-animation" src="{{asset('logo-icon.png')}}" style="box-shadow: unset;" alt="" />
                </div>
                <p class="mt-4"><span class="text-secondary">Win Prize And Rewards App</span><br><strong>Please
                        wait...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    <div class="sidebar-wrap  sidebar-overlay">
        <!-- Add pushcontent or fullmenu instead overlay -->
        <div class="closemenu text-muted">Close Menu</div>
        <div class="sidebar ">
            <!-- user information -->
            <div class="row my-3">
                <div class="col-12 profile-sidebar">
                    <div class="clearfix"></div>
                    <div class="circle small one"></div>
                    <div class="circle small two"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 194.287 141.794" class="menubg">
                        <defs>
                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#09b2fd" />
                                <stop offset="1" stop-color="#6b00e5" />
                            </linearGradient>
                        </defs>
                        <path id="menubg"
                            d="M672.935,207.064c-19.639,1.079-25.462-3.121-41.258,10.881s-24.433,41.037-49.5,34.15-14.406-16.743-50.307-29.667-32.464-19.812-16.308-41.711S500.472,130.777,531.872,117s63.631,21.369,93.913,15.363,37.084-25.959,56.686-19.794,4.27,32.859,6.213,44.729,9.5,16.186,9.5,26.113S692.573,205.985,672.935,207.064Z"
                            transform="translate(-503.892 -111.404)" fill="url(#linear-gradient)" />
                    </svg>
                    @php
                        $profile_image = 'assets/img/user-1.svg';  
                        if(auth()->user()->gender == 'Female' ) {
                            $profile_image = 'assets/img/user-2.svg';
                        }
                    @endphp
                    <div class="row mt-3">
                        <div class="col-auto">
                            <figure class="avatar avatar-80 rounded-20 p-1 bg-white shadow-sm">
                                <img src="{{asset('images/profile/'.auth()->user()->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo" class="rounded-18">
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">
                            <h5 class="mb-2">{{auth()->user()->name}}</h5>
                            <p class="text-muted size-12">{{auth()->user()->reg_code}} | {{auth()->user()->roles->role_name}}</p>
                            <p class="text-muted size-12">{{auth()->user()->phone_number}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- user emnu navigation -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="{{url('home')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Dashboard</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" aria-current="page" href="{{url('profile')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-wallet"></i></div>
                                <div class="col">Profile</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('my-wallet') ? 'active' : '' }}" aria-current="page" href="{{url('my-wallet')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-wallet"></i></div>
                                <div class="col">My Wallet</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('my-referrals') ? 'active' : '' }}" aria-current="page" href="{{url('my-referrals')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-person-lines-fill"></i></div>
                                <div class="col">Referrals</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        @if(auth()->user()->role == 2)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('add-money') ? 'active' : '' }}" aria-current="page" href="{{url('add-money')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-cash-stack"></i></div>
                                <div class="col">Add Money</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('fund-request-list') ? 'active' : '' }}" aria-current="page" href="{{url('fund-request-list')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-list-ul"></i></div>
                                <div class="col">Add Money History</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('amount-to-points') ? 'active' : '' }}" aria-current="page" href="{{url('amount-to-points')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-cash-coin"></i></div>
                                <div class="col">Purchase Points</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('purchase-point-history') ? 'active' : '' }}" aria-current="page" href="{{url('purchase-point-history')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-list-ul"></i></div>
                                <div class="col">Purchase Point History</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('coin-transaction') ? 'active' : '' }}" aria-current="page" href="{{url('coin-transaction')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-cash-coin"></i></div>
                                <div class="col">User Pay Request</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('coin-transaction') ? 'active' : '' }}" aria-current="page" href="{{url('coin-transaction')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-cash-coin"></i></div>
                                <div class="col">Pay History</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('withdraw-request') ? 'active' : '' }}" aria-current="page" href="{{url('withdraw-request')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-wallet2"></i></div>
                                <div class="col">Withdrawal</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('withdraw-request-list') ? 'active' : '' }}" aria-current="page" href="{{url('withdraw-request-list')}}">
                                <div class="avatar avatar-40 icon"><i class="bi bi-view-list"></i></div>
                                <div class="col">Withdrawal List</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('support-list') ? 'active' : '' }}" href="{{url('support-list')}}" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="col">Support</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}" href="{{url('about-us')}}" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="col">About Us</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('privacy') ? 'active' : '' }}" href="{{url('privacy')}}" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="col">Privacy</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('terms') ? 'active' : '' }}" href="{{url('terms')}}" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="col">Terms</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                  <!--       <li class="nav-item">
                            <a class="nav-link {{ Request::is('faq') ? 'active' : '' }}" href="{{url('faq')}}" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="col">FAQ's</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-box-arrow-right"></i></div>
                                <div class="col">Logout</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar main menu ends -->

    <!-- Begin page -->
    <main class="h-100">
        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-outline-primary btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col text-center">
                    <div class="logo-small">
                        <img src="{{asset('logo-icon.png')}}" alt="" />
                        <h5>
                                <!-- <span class="text-secondary fw-light">app</span><br /> -->
                            <!-- Prizoo -->
                        </h5>
                    </div>
                </div>
                <div class="col-auto">
                    <a href="{{url('profile')}}" target="_self" class="btn btn-light btn-outline-primary btn-44">
                        <i class="bi bi-person-circle"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->
        <div id="google_translate_element" style="margin-bottom: 20px;margin-left: 14px;text-align: center;"></div>
        <!-- main page content -->
        <div class="main-container container">
            @yield('content')
        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('home')}}">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            <span class="nav-text">Home</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{('pool-ledger')}}">
                        <span>
                            <i class="nav-icon bi bi-binoculars"></i>
                            <span class="nav-text">Pools</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item centerbutton">
                    <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal"
                        id="centermenubtn">
                        <span class="theme-radial-gradient">
                            <i class="bi bi-grid size-22"></i>
                        </span>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('my-referrals')}}">
                        <span>
                            <i class="nav-icon bi bi-bag"></i>
                            <span class="nav-text">Referrals</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('my-wallet')}}">
                        <span>
                            <i class="nav-icon bi bi-wallet2"></i>
                            <span class="nav-text">Wallet</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Show a second modal and hide this one with the button below.
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Menu Modal -->
    <div class="modal fade" id="menumodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow">
                <div class="modal-body">
                    <h4 class="mb-4"><span class="text-secondary fw-light">Quick </span> Actions!</h4>
                    <!-- <div class="text-center"> -->
                        <!-- {!! QrCode::size(200)->generate(json_encode(['email' => Auth()->user()->email, 'phone_number' => Auth()->user()->phone_number])) !!} -->
                        <!-- <img src="{{asset('assets/img/QRCode.png')}}" alt="" class="mb-2" /> -->
                        <!-- <p class="small text-secondary mb-4">Ask to scan this QR-Code<br />to accept money</p> -->
                    <!-- </div> -->
                    <div class="row justify-content-center mb-4">
                        <div class="col-auto text-center">
                            <a href="{{url('coin-transaction')}}" class="avatar avatar-70 p-1 shadow-sm shadow-danger rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-danger">
                                    <i class="bi bi-receipt-cutoff size-24"></i>
                                </div>
                            </a>
                            @if(auth()->user()->role == 2)
                            <p class="size-10">Pay Request</p>
                            @else
                            <p class="size-10">Pay History</p>
                            @endif
                            <!-- <p class="size-10 text-secondary">Transaction</p> -->
                        </div>
                        @if(auth()->user()->role == 3)
                        <div class="col-auto text-center">
                            <a href="{{url('send-money')}}" class="avatar avatar-70 p-1 shadow-sm shadow-purple rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-purple">
                                    <i class="bi bi-arrow-up-right size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Send</p>
                        </div>
                        @endif
                        @if(auth()->user()->role == 2)
                        <div class="col-auto text-center">
                            <a href="{{url('receive-money')}}" class="avatar avatar-70 p-1 shadow-sm shadow-success rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-success">
                                    <i class="bi bi-arrow-down-left size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Receive</p>
                        </div>
                        @endif
                        <div class="col-auto text-center">
                            <a href="{{url('withdraw-request')}}" class="avatar avatar-70 p-1 shadow-sm shadow-secondary rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-secondary">
                                    <i class="bi bi-bank size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Withdraw</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer ends-->

    @if(session('success'))
    <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-99">
        <div class="toast mb-3 fade show" role="alert" aria-live="assertive" aria-atomic="true" id="toastinstall"
            data-bs-animation="true">
            <div class="toast-header text-bg-success">
                <img src="{{asset('logo-icon.png')}}" style="width: 25px;" class="rounded me-2" alt="...">
                <strong class="me-auto">Success</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col">
                        {{session('success')}}
                    </div>
                    <div class="col-auto align-self-center ps-0">
                        <button class="btn-default btn btn-sm btn-close">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif  
    @if(session('warning'))
    <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-99">
        <div class="toast mb-3 fade show" role="alert" aria-live="assertive" aria-atomic="true" id="toastinstall"
            data-bs-animation="true">
            <div class="toast-header text-bg-success">
                <img src="{{asset('logo-icon.png')}}" style="width: 25px;" class="rounded me-2" alt="...">
                <strong class="me-auto">Warning</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col">
                        {{session('warning')}}
                    </div>
                    <div class="col-auto align-self-center ps-0">
                        <button class="btn-default btn btn-sm btn-close">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif  
    @if(session('error'))
    <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-99">
        <div class="toast mb-3 fade show" role="alert" aria-live="assertive" aria-atomic="true" id="toastinstall"
            data-bs-animation="true">
            <div class="toast-header text-bg-success">
                <img src="{{asset('logo-icon.png')}}" style="width: 25px;" class="rounded me-2" alt="...">
                <strong class="me-auto">Error</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col">
                        {{session('error')}}
                    </div>
                    <div class="col-auto align-self-center ps-0">
                        <button class="btn-default btn btn-sm btn-close">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif 




    <!-- Required jquery and libraries -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Customized jquery file  -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/color-scheme.js')}}"></script>

    <!-- PWA app service registration and works -->
    <script src="{{asset('assets/js/pwa-services.js')}}"></script>

    <!-- Chart js script -->
    <script src="{{asset('assets/vendor/chart-js-3.3.1/chart.min.js')}}"></script>

    <!-- Progress circle js script -->
    <script src="{{asset('assets/vendor/progressbar-js/progressbar.min.js')}}"></script>

    <!-- swiper js script -->
    <script src="{{asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js')}}"></script>

    <!-- page level custom script -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script src="{{asset('dist/js/sweetalert2.js')}}"></script>

    <script>
      function saveFCMTokenFromFlutter(token) {
//         console.log('Received token from Flutter:', token);
// alert(token);

          // Add the token in the URL as a query parameter
          fetch(`/update-fcm-token?token=${encodeURIComponent(token)}`, {
            method: 'GET',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          })
          .then(response => response.json())
          .then(data => console.log('Server response:', data))
          .catch(error => console.error('Error:', error));
      }
    </script>

    <script>
        function get_state(id, callback) {

          var options = $("#"+callback); 
          options.empty();

          $.ajax({
            type:"GET",
            url:"{{url('get-state')}}",
            data:{'id': id},
            success:function(result)
            { 
              if(result.length != 0)
              {
                options.append('<option value="">Select Option</option>');
                $.each(result, function(key, value){
                  options.append('<option value ="'+value.id+'">'+value.name+'</option>');
                });

                // $('.select2').select2()
              }
            }
          })
        }

        function get_city(id, callback) {

          var options = $("#"+callback); 
          options.empty();
     

          $.ajax({
            type:"GET",
            url:"{{url('get-city')}}",
            data:{'id': id},
            success:function(result)
            { 
              if(result.length != 0)
              {
                $.each(result, function(key, value){
                  options.append('<option value ="'+value.id+'">'+value.name+'</option>');
                });

                // $('.select2').select2();
              }
            }
          })
        }
        $(".btn-close").click(function (e) {
            $("#toastinstall").removeClass('fade show');
        });
    </script>
    <script>
    function copyReferralLink() {
        const input = document.getElementById("referral-link");
        const link = input.value;

        // Try modern Clipboard API first
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(link)
                .then(() => alert("Referral link copied!"))
                .catch(err => {
                    console.error("Modern copy failed:", err);
                    fallbackCopy(link);
                });
        } else {
            // Fallback
            fallbackCopy(link);
        }
    }

    function fallbackCopy(text) {
        const tempInput = document.createElement("input");
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        try {
            document.execCommand("copy");
            alert("Referral link copied (fallback)!");
        } catch (err) {
            alert("Failed to copy.");
            console.error("Fallback copy failed:", err);
        }
        document.body.removeChild(tempInput);
    }
    </script>

    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({
          pageLanguage: 'en',
          includedLanguages: 'en,hi,fr,de,es', // add your desired languages
          layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
      }
    </script>

    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>