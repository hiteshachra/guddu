@extends('front.layouts.app')
@section('content')
@php
    $profile_image = 'assets/img/user-1.svg';  
    if(auth()->user()->gender == 'Female' ) {
        $profile_image = 'assets/img/user-2.svg';
    }    

    $words = explode(' ', strtolower(Auth()->user()->name));
    $short = '';

    if (count($words) === 1) {
        $short = strtoupper(substr($words[0], 0, 1));
    } elseif (count($words) === 2) {
        $short = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
    } elseif (count($words) >= 3) {
        $short = strtoupper(substr($words[0], 0, 1) . substr($words[2], 0, 1));
    }
@endphp
<div class="row" id="capture-section">
    <div style="text-align:center">
        <img  src="{{asset('logo-icon.png')}}" style="width: 145px;margin-bottom: -15px;" alt="" />
    </div> 
    <div class="col-12 d-flex align-items-center flex-column">    
        <div style="border: 5px solid #6500d8;border-radius: 15px;background-color: #ffffff; box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;padding: 15px 40px;max-width: max-content;    text-align: center;">   
            <p style="font-weight: 700; padding-bottom: 5px;display: flex;align-items: center;">
                <img src="{{asset('images/profile/'.auth()->user()->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo" style="width: 20px;border: 2px solid #e8e8e8;border-radius: 50%;margin-right: 8px;">{{ Auth()->user()->name }} ({{$short}})
            </p>
            <span style="padding-left: -80px;padding-right: -150px;">
                {!! QrCode::size(250)->generate(json_encode(['email' => Auth()->user()->email, 'phone_number' => Auth()->user()->phone_number])) !!}
            </span>

            <p style="font-weight: 700;padding-top: 10px;">PAY: {{ Auth()->user()->phone_number }}</p>

        </div>
        <p style="padding-top: 10px; padding-bottom: 20px;">Scan to pay with prizoo app</p>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-3">
<button onclick="downloadQRCodeImage()" class="btn btn-light"><i class="bi bi-cloud-download-fill"></i></button>
        <h3 class="mb-3"><span class="text-secondary fw-light">Scan QR</span><br />Pay & Instant</h3>
    </div>
</div>
<!-- offers banner -->
<!-- <div class="row mb-4">
    <div class="col-12">
        <div class="card theme-bg overflow-hidden">
            <figure class="m-0 p-0 position-absolute top-0 start-0 w-100 h-100 coverimg right-center-img">
                <img src="{{asset('assets/img/offerbg.png')}}" alt="">
            </figure>
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-10 align-self-center">
                        <h1 class="mb-3"><span class="fw-light">15% OFF</span><br>GiftCard</h1>
                        <p>Thank you for spending with us, You have received Gift Card.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script>
    function downloadQRCodeImage() {
        const target = document.getElementById('capture-section');
        html2canvas(target, {
            backgroundColor: null, // for transparent background if needed
            useCORS: true
        }).then(canvas => {
            const link = document.createElement('a');
            link.download = 'qr-code.png';
            link.href = canvas.toDataURL();
            link.click();
        });
    }
</script>
@endsection