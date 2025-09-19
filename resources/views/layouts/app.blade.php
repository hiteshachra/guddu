<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" href="{{asset('favicon.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">


    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/imageuploadify.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
</head>
  
  @php
      $mode = "dark";
      $mode = "light";
  @endphp
 

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm {{$mode}}-mode"> 
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('round-logo.png')}}" alt="Logo" height="100" width="100">
  </div>

  <nav class="main-header navbar navbar-expand navbar-{{$mode}} {{$mode == 'dark'? '':'bg-light'}}">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="javascript:void(0)" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="javascript:void(0)" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
     {{--  
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="javascript:void(0)" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('round-logo.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('round-logo.png')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('round-logo.png')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      --}}
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="javascript:void(0)" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>        
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
          {{ Auth::user()->name }}
          <i class="fas fa-sort-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 170px;">
 <!--          <a href="javascript:void(0)" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="javascript:void(0)" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Change Password
          </a> -->
          <div class="dropdown-divider"></div>
          <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Logout </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
      </li>

    </ul>
  </nav>

  <aside class="main-sidebar sidebar-{{$mode}}-primary elevation-4">
    <a href="javascript:void(0)" class="brand-link" style="display: flex;flex-direction: column;align-content: center;flex-wrap: wrap;">
      <img src="{{asset('admin-logo.png')}}" alt="Logo" class="brand-image" style="opacity: .8">
      <img src="{{asset('logo.png')}}" alt="Logo" class="brand-images brand-image" style="opacity: .8;display: none;">
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('21.svg')}}" class="img-circle elevation-2" alt="User Image" style="width: 3.1rem;height: 3.1rem;">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block"><b>{{ Auth::user()->name }} </b></br>{{ Auth::user()->roles->role_name == 'Employee'?'Admin':Auth::user()->roles->role_name }}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="javascript:void(0)" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/dashboard')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          @if(Auth::user()->role == 1)
          <li class="nav-header">USERS</li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('users/user')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/user-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Users List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/user-kyc-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Users KYC</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/user-bank-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Users Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/user-shop-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Stores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/address-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Users Address</p>
                </a>
              </li>
            </ul>
          </li> 
          @endif
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Team
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('users/direct-team-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Direct Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/level-team-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Level Team</p>
                </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                Tariff
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('tariffs/add')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Add Tariff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tariffs/list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Tariff</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Wallet
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Auth::user()->role == 1)
              <li class="nav-item">
                <a href="{{url('fund/transfer')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Fund Transfer</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{url('fund/transfer-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Fund Transfer List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('fund/request-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Fund Request List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/available-balance-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Available Balance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/point-ledger-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Point Ledger</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/main-ledger-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Main Ledger</p>
                </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Withdrawal 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('withdraw/list/Pending')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Withdrawal Pending</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('withdraw/list/Approved')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Withdrawal Approved</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('withdraw/list/Canceled')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Withdrawal Canceled</p>
                </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Support
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('support/support-list/Open')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Open Support</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('support/support-list/Closed')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Closed Support</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-header">POOL</li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Pool
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('pools/create')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Add Pool</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pools')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Pool List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pool/commissions/list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Pool Commission List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pool/user-pool-request-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>User Pool Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('pool/pool-cashback-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>User Pool Cashback</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Master</li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-camera-retro"></i>
              <p>
                Banners
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{--  <li class="nav-item">
                <a href="{{url('settings/banners')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>  --}}
              <li class="nav-item">
                <a href="{{url('settings/banner-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Banner List</p>
                </a>
              </li>
            </ul>
          </li>  
          {{-- <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Coupons
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('settings/coupon')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Coupons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('settings/coupon-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Coupons List</p>
                </a>
              </li>
            </ul>
          </li>  --}}
          @if(Auth::user()->role == 1)
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{url('settings/config')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Configuration</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-strikethrough"></i>
              <p>
                Static Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{url('settings/static-content')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Static Content</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
<!--           <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-question"></i>
              <p>
                FAQ'S
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('settings/faq')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Add Faq's</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('settings/faq-list')}}" class="nav-link">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>Faq's List</p>
                </a>
              </li>
            </ul>
          </li>   -->
          <li class="nav-header"></li>
          <li class="nav-item">
              <a href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p> Logout </p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-header"></li>
          <li class="nav-header"></li>


      
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} <a href="{{url('/')}}">{{config('app.name')}}</a></strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block"> <b>Version</b> 3.2.0 </div>
  </footer>
</div>

<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
@if(\Request()->route()->getName() == 'dashboard')
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
@endif
<script src="{{asset('dist/js/sweetalert2.js')}}"></script>

<!-- <script src="{{asset('dist/js/imageuploadify.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="file"]').imageuploadify();
    })
</script> -->

<script type="text/javascript">
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('*[aria-controls="example1"][type="button"]').addClass('btn-md btn-primary').removeClass('btn-secondary');
    $("#example1").removeClass('pt-2');
    //$('*[type="search"][class="form-control input-sm"]').addClass('input-lg').css({ 'width': '400px', 'display': 'inline-block' });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      bsCustomFileInput.init();

  });

 

  $("#form-submit").click(function(){
    Swal.fire({
      title: 'Are you sure?',
      text: "You want to submit this form!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        $("#submit-form").submit();
      }
    })
  });

  $("#form-edit").click(function(){
    Swal.fire({
      title: 'Are you sure?',
      text: "You want to edit this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        $("#edit-form").submit();
      }
    })
  });

  $("#form-change").click(function(){
    Swal.fire({
      title: 'Are you sure?',
      text: "You want to change status!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        $("#change-form").submit();
      }
    })
  });
  $("#form-update").click(function(){
    Swal.fire({
      title: 'Are you sure?',
      text: "You want to update this form!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        $("#update-form").submit();
      }
    })
  });

  


function get_cat(id, callback) {

  var options = $("javascript:void(0)"+callback); 
  options.empty();
  $('#category_name').empty();
  $('#sub_category_name').empty();
// options.push({ id: 4, product_text: 'text_4' });
  Swal.fire({
      timer: 1000,
      title: 'Please Wait !',
      html: 'loading data',// add html attribute if you want or remove
      allowOutsideClick: false,
      onBeforeOpen: () => {
          Swal.showLoading()
      },
  });

  $.ajax({
    type:"GET",
    url:"{{url('get-category')}}",
    data:{'id': id},
    success:function(result)
    { console.log(result);
      if(result.length != 0)
      {
        options.append('<option value="">Select Option</option>');
        $.each(result, function(key, value){
          options.append('<option value ="'+value.id+'">'+value.name+'</option>');
        });

        $('.select2').select2()
      }
    }
  })
}

function get_sub_cat(id, callback , multiple) {

  var options = $("javascript:void(0)"+callback); 
  options.empty();
// options.push({ id: 4, product_text: 'text_4' });
  Swal.fire({
      timer: 1000,
      title: 'Please Wait !',
      html: 'loading data',// add html attribute if you want or remove
      allowOutsideClick: false,
      onBeforeOpen: () => {
          Swal.showLoading()
      },
  });

  $.ajax({
    type:"GET",
    url:"{{url('get-sub-category')}}",
    data:{'id': id},
    success:function(result)
    { 
      if(result.length != 0)
      {
        if(multiple == false){
          options.append('<option value="">Select Option</option>');
        }

        $.each(result, function(key, value){
          options.append('<option value ="'+value.id+'">'+value.name+'</option>');
        });

        $('.select2').select2();
      }
    }
  })
}
</script>

@if(session('success'))
<script type="text/javascript">
  Swal.fire({
        title: "{{session('success')}}",
        icon: "success",
        button: "OK",
      });
</script>
@endif  
@if(session('warning'))
<script type="text/javascript">
  Swal.fire({
        title: "{{session('warning')}}",
        icon: "warning",
        button: "OK",
      });
</script>
@endif  
@if(session('error'))
<script type="text/javascript">
  Swal.fire({
        title: "{{session('error')}}",
        icon: "error",
        button: "OK",
      });
</script>
@endif 


</body>
</html>
