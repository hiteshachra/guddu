@extends('front.layouts.app')
@section('content')
@php
    $referralCode = auth()->user()->reg_code;
    $shareUrl = url('/register?referral_code=' . $referralCode);
    $rawShareUrl = url('/register?referral_code=' . $referralCode);
    $shareText = "Join now ".config('app.name')." using my referral link!";


    $profile_image = 'assets/img/user-1.svg';  
    if(auth()->user()->gender == 'Female' ) {
        $profile_image = 'assets/img/user-2.svg';
    }
@endphp
<div class="row mb-3">
    <div class="col align-self-center">
        <h6 class="title">Profile</h6>
    </div>
    <div class="col-auto">
    </div>
</div>
<div class="row gx-3 gx-lg-4">
    <div class="col-12 col-md-6 col-lg-5">
    <!-- profile-->

    <div class="card adminuiux-card border-0 overflow-hidden z-index-0 mb-3">
        <div class="coverimg h-100 w-100 start-0 top-0 position-absolute z-index-0 blur-overlay opacity-75">
        <img src="{{asset('images/profile/'.auth()->user()->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo">
        </div>
        <div class="text-center position-relative z-index-1 my-3">
        <div class="avatar avatar-120 coverimg rounded-circle">
            <img src="{{asset('images/profile/'.auth()->user()->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo">
        </div>
        </div>
    </div>

    <div class="card adminuiux-card mb-3 mb-lg-4 z-index-1">
        <div class="card-body">
        <div class="row gx-3 gx-lg-4 mb-3 mb-lg-4">
            <div class="col">
            <h4 class="mb-0">{{ $userInfo->name }}</h4>
            <p class="text-secondary">{{ $userInfo->roles->role_name }}</p>
            </div>
            <div class="col-auto">
            <a href="{{url('update-profile')}}" class="btn btn-square btn-link"><i class="bi bi-gear"></i></a>
            </div>
        </div>

        <p class="text-secondary mb-3"><i class="bi bi-envelope me-2 align-middle"></i> <span class="align-middle">{{ $userInfo->email }}</span></p>
        <p class="text-secondary mb-3"><i class="bi bi-telephone me-2 align-middle"></i> <span class="align-middle">{{ $userInfo->phone_number }}</span></p>
        <p class="text-secondary mb-3"><i class="bi bi-gender-ambiguous me-2 align-middle"></i> <span class="align-middle">{{ $userInfo->gender }}</span></p>
        <p class="text-secondary mb-3"><i class="bi bi-calendar-date me-2 align-middle"></i> <span class="align-middle">{{ $userInfo->dob }}</span></p>
        <p class="text-secondary d-flex"><i class="bi bi-geo-alt me-2 align-middle"></i> <span class="align-middle">{{ $address->address }}, {{$address->street}}, {{$address->city_name}}, {{$address->state_name}}, {{$address->country_name}}, {{$address->zip}}</span></p>
        </div>
    </div>

    <div class="card adminuiux-card mb-3 mb-lg-4 z-index-1">
        <div class="card-body">
            <div class="mb-2">
                <label>Referral Link:</label>
                <div style="display: none;">
                    <input type="text" id="referral-link" value="{{ $rawShareUrl }}" readonly>
                </div>
            </div>
            <div class="btn-group w-100">
                <button class="btn btn-outline-dark" onclick="copyReferralLink()">
                    <i class="bi bi-clipboard-check me-2 align-middle"></i></button>
                <a class="btn btn-outline-dark" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank">
                    <i class="bi bi-facebook me-2 align-middle"></i>
                </a>

          <!--       <a class="btn btn-outline-dark" href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank">
                    <i class="bi bi-twitter me-2 align-middle"></i>
                </a>

                <a class="btn btn-outline-dark" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareText }}" target="_blank">
                    <i class="bi bi-linkedin me-2 align-middle"></i>
                </a> -->

                <a  id="waShareBtn" class="btn btn-outline-dark" href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank">
                    <i class="bi bi-whatsapp me-2 align-middle"></i>
                </a>
            </div>
        </div>
    </div>

   {{-- <div class="card adminuiux-card mb-3 mb-lg-4 z-index-1">
        <div class="card-body">
            <div class="mb-2">
                <label>User Referral Link:</label>
                <div style="display: none;">
                    <input type="text" id="referral-link" value="{{ $rawShareUrl }}" readonly>
                </div>
            </div>
            <div class="btn-group w-100">
                <button class="btn btn-outline-dark" onclick="copyReferralLink()">
                    <i class="bi bi-clipboard-check me-2 align-middle"></i></button>
                <a class="btn btn-outline-dark" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank">
                    <i class="bi bi-facebook me-2 align-middle"></i>
                </a>

                <a class="btn btn-outline-dark" href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank">
                    <i class="bi bi-twitter me-2 align-middle"></i>
                </a>

                <a class="btn btn-outline-dark" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareText }}" target="_blank">
                    <i class="bi bi-linkedin me-2 align-middle"></i>
                </a>

                <a class="btn btn-outline-dark" href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank">
                    <i class="bi bi-whatsapp me-2 align-middle"></i>
                </a>
            </div>
        </div>
    </div>
    @if($userInfo->role == 2)
    <div class="card adminuiux-card mb-3 mb-lg-4 z-index-1">
        <div class="card-body">
            <div class="mb-2">
                <label>Vendor Referral Link:</label>
                <div style="display: none;">
                    <input type="text" id="referral-link" value="{{ $rawShareUrl }}" readonly>
                </div>
            </div>
            <div class="btn-group w-100">
                <button class="btn btn-outline-dark" onclick="copyReferralLink()">
                    <i class="bi bi-clipboard-check me-2 align-middle"></i></button>
                <a class="btn btn-outline-dark" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank">
                    <i class="bi bi-facebook me-2 align-middle"></i>
                </a>

                <a class="btn btn-outline-dark" href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank">
                    <i class="bi bi-twitter me-2 align-middle"></i>
                </a>

                <a class="btn btn-outline-dark" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareText }}" target="_blank">
                    <i class="bi bi-linkedin me-2 align-middle"></i>
                </a>

                <a class="btn btn-outline-dark" href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank">
                    <i class="bi bi-whatsapp me-2 align-middle"></i>
                </a>
            </div>
        </div>
    </div>
    @endif
    --}} 
    </div>

    <div class="col-12 col-md-6 col-lg-7">
    <!--  states -->
    <div class="row gx-3 gx-lg-4">
        <div class="col col-md-6 col-lg">
        <!-- revenue -->
        <div class="card adminuiux-card mb-3 mb-md-6 mb-lg-4">
            <div class="card-body">
            <h4 class="mb-0">{{ config('app.currency_symbol') }} {{ number_format($wallet_data->main_balance,2) }}</h4>
            <p class="small text-secondary">Total Main Balance</p>
            </div>
        </div>
        </div>
        <div class="col col-md-6 col-lg">
        <!-- earning -->
        <div class="card adminuiux-card mb-3 mb-md-6 mb-lg-4">
            <div class="card-body">
            <h4 class="mb-0">{{ config('app.coin_symbol') }} {{ number_format($wallet_data->dmt_balance,2) }}</h4>
            <p class="small text-secondary">Total Points</p>
            </div>
        </div>
        </div>
    </div>
    @if($userInfo->role == 2)
    <!-- subscription -->
    <div class="card adminuiux-card mb-3 mb-lg-4">
        <div class="card-body">
        <div class="row gx-3 gx-lg-4 align-items-center mb-3 mb-lg-4">
            <div class="col-auto">
            <i class="bi bi-shop fs-4 avatar avatar-50 text-theme-1 bg-theme-1-subtle rounded"></i>
            </div>
            <div class="col">
            <h6 class="mb-0">Shop</h6>
            </div>
            <div class="col-auto">
            <a href="{{ url('update-shop') }}" class="btn btn-square btn-link"><i class="bi bi-gear"></i></a>
            </div>
        </div>
        <div class="row gx-3 gx-lg-4 align-items-center">
            <div class="col">
            <h6 class="mb-0">{{$marketInfo->name}}</h6>
            <p class="small text-secondary">Updated At: {{ \Carbon\Carbon::parse($marketInfo->updated_at)->format('d F Y') }}</p>
            </div>
            <div class="col-auto text-end">
            <h6 class="mb-0">Address</h6>
            <p class="small text-secondary">{{$kycInfo->address}}</p>
            </div>
        </div>
        </div>
    </div>
    @endif
    
    
    <!-- Kyc -->
    <div class="card adminuiux-card mb-3 mb-lg-4">
        <div class="card-body">
        <div class="row gx-3 gx-lg-4 align-items-center mb-3 mb-lg-4">
            <div class="col-auto">
            <i class="bi bi-safe fs-4 avatar avatar-50 text-theme-1 bg-theme-1-subtle rounded"></i>
            </div>
            <div class="col">
            <h6 class="mb-0">KYC</h6>
            <p class="small">Status: <span class="{{$kycInfo->status == 'Verified'?'text-success':'text-danger'}}">{{$kycInfo->status}}</span></p>
            </div>
            <div class="col-auto">
            <a href="{{ url('update-kyc') }}" class="btn btn-square btn-link"><i class="bi bi-gear"></i></a>
            </div>
        </div>
        <div class="row gx-3 gx-lg-4 align-items-center">
            <div class="col">
            <h6 class="mb-0">{{$kycInfo->address_proof_type}}</h6>
            <p class="small text-secondary">Updated At: {{ \Carbon\Carbon::parse($kycInfo->updated_at)->format('d F Y') }}</p>
            </div>
            <div class="col-auto text-end">
            <h6 class="mb-0">{{$kycInfo->address_proof_no}}</h6>
            </div>
        </div>
        </div>
    </div>

    <!-- Bank -->
    <div class="card adminuiux-card mb-3 mb-lg-4">
        <div class="card-body">
        <div class="row gx-3 gx-lg-4 align-items-center mb-3 mb-lg-4">
            <div class="col-auto">
            <i class="bi bi-bank fs-4 avatar avatar-50 text-theme-1 bg-theme-1-subtle rounded"></i>
            </div>
            <div class="col">
            <h6 class="mb-0">Bank Details</h6>
            <p class="small">Status: <span class="{{$bankdetail->status == 'VERIFIED'?'text-success':'text-danger'}}">{{ucfirst(strtolower($bankdetail->status))}}</span></p>
            </div>
            <div class="col-auto">
            <a href="{{ url('update-bank') }}" class="btn btn-square btn-link"><i class="bi bi-gear"></i></a>
            </div>
        </div>
        <div class="row gx-3 gx-lg-4 align-items-center">
            <div class="col">
            <h6 class="mb-0">{{$bankdetail->name}}</h6>
            <p class="small text-secondary">Updated At: {{ \Carbon\Carbon::parse($bankdetail->updated_at)->format('d F Y') }}</p>
            </div>
            <div class="col-auto text-end">
            <h6 class="mb-0">{{$bankdetail->branch}}</h6>
            <p class="small text-secondary">{{$bankdetail->account_number}}</p>
            </div>
        </div>
        </div>
    </div> 
    </div>
</div>


<!-- People -->
<div class="row mb-2">
    <div class="col">
        <h6 class="title">Referral</h6>
    </div>
    <div class="col-auto">
        <a href="{{url('my-referrals')}}" class="small">View More</a>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 px-0">
        <!-- swiper users connections -->
        <div class="swiper-container connectionwiper">
            <div class="swiper-wrapper">
                @foreach($team as $tvalue)
                @php
                    $profile_image = 'assets/img/user-1.svg';  
                    if($tvalue->gender == 'Female' ) {
                        $profile_image = 'assets/img/user-2.svg';
                    }
                @endphp
                <div class="swiper-slide">
                    <a href="profile.html" class="card text-center">
                        <div class="card-body p-1">
                            <div class="position-absolute end-0 top-0 bg-success z-index-1 online-status">
                            </div>
                            <figure class="avatar avatar-80 shadow-sm rounded-18">
                                <img src="{{asset('images/kyc/user_photo/'.$tvalue->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo">
                            </figure>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('waShareBtn').addEventListener('click', function(e) {
        e.preventDefault();
        const message = encodeURIComponent("{{  $shareText }} {{ $shareUrl }}");
        const waUrl = "whatsapp://send?text=" + message;

        // Try to open WhatsApp app
        window.location.href = waUrl;

        // Fallback to browser-based wa.me link after 1s
        setTimeout(function() {
            // window.location.href = "https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}";
        }, 1000);
    });
</script>
@endsection