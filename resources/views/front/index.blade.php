@extends('front.layouts.app')
@section('content')
<style>
.live-indicator {
    display: inline-block;
    width: 14px;
    height: 14px;
    background-color: green;
    border-radius: 50%;
    margin-right: 5px;
    animation: blink 1s infinite;
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.3; }
}

    .match-card {
      border: 1px solid #ddd;
      border-radius: 12px;
      padding: 15px;
      max-width: 400px;
      background-color: #fff;
    }
    .team-logo {
      width: 30px;
      height: 30px;
      object-fit: contain;
    }
    .time-left {
      color: red;
      font-weight: bold;
    }
    .lineups-out {
      color: green;
      font-weight: 500;
    }
    .prize-box {
      background: #fff5e6;
      border-radius: 8px;
      padding: 5px 10px;
      display: inline-block;
      font-weight: 500;
    }
</style>
<div class="col align-self-center">
        <h6 class="title"> <img src="{{asset('images/welcome.png')}}" width="75" style="margin-top: -7px"> {{auth()->user()->name}}</h6>

    </div>
    <div class="col-auto">
       <h6 class="title">@if(auth()->user()->role == 2)( {{auth()->user()->roles->role_name}} ) @endif</h6>
    </div>
</div>
<!-- balance -->
<div class="row my-4 text-center">
      <div class="col-12">
         <h1 class="fw-light mb-2">{{number_format($walletData->dmt_balance,2)}}</h1>
         <p class="text-secondary">Total Points</p>
      </div>
</div>

<!-- income expense-->
<div class="row mb-4 px-3">
      <div class="col-6">
         <div class="card">
            <div class="card-body">
                  <div class="row">
                     <div class="col-auto">
                        <div class="avatar avatar-40 p-1 shadow-sm shadow-success rounded-15">
                              <div class="icons bg-success text-white rounded-12">
                                 <i class="bi bi-arrow-down-left"></i>
                              </div>
                        </div>
                     </div>
                     <div class="col align-self-center ps-0">
                        <p class="size-10 text-secondary mb-0">Earn Points</p>
                        <p>{{number_format($ledgerData->cr,2)}}</p>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <div class="col-6">
         <div class="card">
            <div class="card-body">
                  <div class="row">
                     <div class="col-auto">
                        <div class="avatar avatar-40 p-1 shadow-sm shadow-danger rounded-15">
                              <div class="icons bg-danger text-white rounded-12">
                                 <i class="bi bi-arrow-up-right"></i>
                              </div>
                        </div>
                     </div>
                     <div class="col align-self-center ps-0">
                        <p class="size-10 text-secondary mb-0">Expense Points</p>
                        <p>{{number_format($ledgerData->dr,2)}}</p>
                     </div>
                  </div>
            </div>
         </div>
      </div>
</div>

<!-- categories list -->
<div class="row mb-4 px-3">
      <div class="col-12">
         <div class="card bg-theme text-white">
            <div class="card-body pb-0">
                  <div class="row justify-content-between gx-0 mx-0 pb-3">
                     <div class="col-auto text-center">
                        <a href="{{url('coin-transaction')}}" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                              <div class="icons bg-success text-white rounded-12 bg-opac">
                                 <i class="bi bi-receipt-cutoff size-22"></i>
                              </div>
                        </a>
                        @if(auth()->user()->role == 2)
                        <p class="size-10">Pay Request</p>
                        @else
                        <p class="size-10">Pay History</p>
                        @endif
                     </div>

                     @if(auth()->user()->role == 3)
                     <div class="col-auto text-center">
                        <a href="{{url('send-money')}}" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                              <div class="icons bg-success text-white rounded-12 bg-opac">
                                 <i class="bi bi-arrow-up-right size-22"></i>
                              </div>
                        </a>
                        <p class="size-10">Send</p>
                     </div>
                     @endif
                     @if(auth()->user()->role == 2)
                     <div class="col-auto text-center">
                        <a href="{{url('receive-money')}}" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                              <div class="icons bg-success text-white rounded-12 bg-opac">
                                 <i class="bi bi-arrow-down-left size-22"></i>
                              </div>
                        </a>
                        <p class="size-10">Receive</p>
                     </div>
                     <div class="col-auto text-center">
                        <a href="{{('amount-to-points')}}" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                              <div class="icons bg-success text-white rounded-12 bg-opac">
                                 <i class="bi bi-wallet2 size-22"></i>
                              </div>
                        </a>
                        <p class="size-10">Purchase</p>
                     </div>

                     @endif
                     <div class="col-auto text-center">
                        <a href="{{url('withdraw-request')}}" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                              <div class="icons bg-success text-white rounded-12 bg-opac">
                                 <i class="bi bi-bank size-22"></i>
                              </div>
                        </a>
                        <p class="size-10">Withdraw</p>
                     </div>
                  </div>

            </div>
         </div>
      </div>
</div>
<div class="row mb-4 px-3">
      <div class="col-12">
         <div class="card shadow-sm">
            <div class="card-body">
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="darkmodeswitch">
                     <label class="form-check-label text-muted px-2 " for="darkmodeswitch">Activate Dark
                        Mode</label>
                  </div>
            </div>
         </div>
      </div>
</div>


<!-- My Goals and Targets -->
<div class="row mb-2 px-3">
      <div class="col" style="text-align: center;">
         <h6 class="title" style="font-size: 24px;">Pools</h6>
      </div>
   
</div>
<div class="row px-3">
   @if($previousPool)
      <div class="col-12 mb-2">
         <div class="card p-2" style="border: 1px solid #EFBF04;">
             <div class="card-body">
                 <div class="row">
                     <div class="col align-self-center ps-0">
                         <p class="small fw-bold ml-2">P-{{$previousPool->id}}</p>
                         <p class="small mb-1 fw-bold ml-2">{{$previousPool->name}}</p>
                         <p>Total Users: {{$previousPool->requests->count()}}</p>
                         <p class="text-danger"> <strong> Prize Pool {{config('app.currency_symbol')}}{{number_format($previousPool->amount,2)}} 🏆🎉🏅 </strong> </p>
                     </div>
                     <div class="col-auto align-self-center" style="text-align: end;">
                        <p><a href="{{url('pool-info/'.$previousPool->id)}}" class="btn btn-light"><i class="bi bi-arrow-right-circle"></i></a> </p>
                         <p class="small mb-1"><div class="countdown" id="countdown1" data-start="{{\Carbon\Carbon::now()}}" data-end="{{$previousPool->end_time}}"></div></p>
                         <p class="small mb-1 text-danger"> {{$previousPool->status}}</p>
                     </div>
                 </div>
             </div>
         </div>
      </div>
   @endif 
   @if($currentPool)
      <div class="col-12 mb-2">
         <div class="card p-2" style="border: 1px solid #EFBF04;">
             <div class="card-body">
                 <div class="row">
                     <div class="col align-self-center ps-0">
                         <p class="small fw-bold ml-2">P-{{$currentPool->id}}</p>
                         <p class="small mb-1 fw-bold ml-2">{{$currentPool->name}}</p>
                         <p>Active Users: {{$currentPool->requests->count()}}</p>
                         <p class="text-danger"> <strong> Prize Pool {{config('app.currency_symbol')}}{{number_format($currentPool->amount,2)}} 🏆🎉🏅</strong></p>
                     </div>
                     <div class="col-auto align-self-center" style="text-align: end;">
                        <p><a href="{{url('pool-info/'.$currentPool->id)}}" class="btn btn-light"><i class="bi bi-arrow-right-circle"></i></a> </p>
                         <p class="small mb-1"><div class="countdown text-danger" style="font-weight: 600;" id="countdown1" data-start="{{\Carbon\Carbon::now()}}" data-end="{{$currentPool->end_time}}"></div></p>
                         <p class="small mb-1">@if($currentPool->status == 'Open') <span class="live-indicator"></span>Live @else Pool {{$currentPool->status}} @endif</p>
                     </div>
                 </div>
             </div>
         </div>
      </div>
   @endif 
   @foreach($upcomingPool as $upvalue)
      <div class="col-12 mb-2">
         <div class="card p-2" style="border: 1px solid #EFBF04;">
             <div class="card-body">
                 <div class="row">
                     <div class="col align-self-center ps-0">
                         <p class="small fw-bold ml-2">P-{{$upvalue->id}}</p>
                         <p class="small mb-1 fw-bold ml-2">{{$upvalue->name}}</p>
                         <p></p>
                         <p class="text-danger"> <strong>Prize Pool {{config('app.currency_symbol')}}{{number_format($upvalue->amount,2)}} 🏆🎉🏅</strong></p>
                     </div>
                     <div class="col-auto align-self-center" style="text-align: end;">
                        <p><a href="{{url('pool-info/'.$upvalue->id)}}" class="btn btn-light"><i class="bi bi-arrow-right-circle"></i></a> </p>
                         <p class="small mb-1"><div class="countdown text-danger" style="font-weight: 600;" id="countdown1" data-start="{{\Carbon\Carbon::now()}}" data-end="{{$upvalue->end_time}}"></div></p>
                         <p class="small mb-1">Upcoming Pool</p>
                     </div>
                 </div>
             </div>
         </div>
      </div>
   @endforeach
</div>

<!-- Transactions -->
<div class="row mb-3 mt-5 px-3">
      <div class="col">
         <h6 class="title">Top Winners</h6>
      </div>
</div>
<div class="row mb-4 px-3">
      <div class="col-12">
         <div class="card">
            <div class="card-body p-0">
                  <ul class="list-group list-group-flush bg-none">
                     @foreach($poolReq as $pvalue)
                     @php
                        $profile_image = 'assets/img/user-1.svg';  
                        if($pvalue->users->gender == 'Female' ) {
                            $profile_image = 'assets/img/user-2.svg';
                        }
                     @endphp
                     <li class="list-group-item">
                        <div class="row">
                              <div class="col-auto">
                                 <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">
                                    <img src="{{asset('images/profile/'.$pvalue->users->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" class="rounded-15">
                                 </div>
                              </div>
                              <div class="col align-self-center ps-0">
                                 <p class="text-secondary size-10 mb-0">{{$pvalue->users->name}}</p>
                                 <p>{{$pvalue->users->reg_code}}</p>
                              </div>
                              <div class="col align-self-center text-end">
                                 <p class="size-10 mb-0 text-danger">{{config('app.coin_symbol')}} {{$pvalue->user_points}}</p>
                                 <p class="size-10 mb-0 text-success"><strong>Win {{config('app.currency_symbol')}} {{$pvalue->win_amount}}</strong></p>
                              </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
            </div>
         </div>
      </div>
</div>

<!-- People -->
<div class="row mb-2 px-3">
      <div class="col">
         <h6 class="title">Referrals ({{ $directTeamCount }})</h6>
      </div>
      <div class="col-auto">
         <a href="{{url('my-referrals')}}" class="small">View More</a>
      </div>
</div>
<div class="row mb-3 px-3">
      <div class="col-12">
         <div class="card">
            <div class="card-body p-0">
                  <ul class="list-group list-group-flush bg-none">
                     @foreach($directTeam as $teamValue)
                     @php
                         $profile_image = 'assets/img/user-1.svg';  
                         if($teamValue->gender == 'Female' ) {
                             $profile_image = 'assets/img/user-2.svg';
                         }
                     @endphp
                     <li class="list-group-item">
                        <div class="row">
                              <div class="col-auto">
                                 <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">
                                    <img src="{{asset('images/kyc/user_photo/'.$teamValue->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo" class="rounded-15">
                                 </div>
                              </div>
                              <div class="col align-self-center ps-0">
                                 <p class="text-secondary size-10 mb-0">{{$teamValue->reg_code}}</p>
                                 <p>{{$teamValue->name}}</p>
                              </div>
                              <div class="col align-self-center text-end">
                                 <p class="text-secondary text-muted size-10 mb-0">{{ $teamValue->created_at->format('d-m-Y | h:ia') }}</p>
                                 <p>{{$teamValue->email}}</p>
                              </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
            </div>
         </div>
      </div>
</div>


<!-- Transactions -->
<div class="row mb-3 mt-5 px-3">
      <div class="col">
         <h6 class="title">Top Purchasers</h6>
      </div>
</div>
<div class="row mb-4 px-3">
      <div class="col-12">
         <div class="card">
            <div class="card-body p-0">
                  <ul class="list-group list-group-flush bg-none">
                     @foreach($topPurchasers as $tpValue)
                     @php
                        $profile_image = 'assets/img/user-1.svg';  
                        if($tpValue->users->gender == 'Female' ) {
                            $profile_image = 'assets/img/user-2.svg';
                        }
                     @endphp
                     <li class="list-group-item">
                        <div class="row">
                              <div class="col-auto">
                                 <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">
                                    <img src="{{asset('images/profile/'.$tpValue->users->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" class="rounded-15">
                                 </div>
                              </div>
                              <div class="col align-self-center ps-0">
                                 <p class="text-secondary size-10 mb-0">{{$tpValue->users->name}}</p>
                                 <p>{{$tpValue->users->reg_code}}</p>
                              </div>
                              <div class="col align-self-center text-end">
                                 <p class="text-secondary text-muted size-10 mb-0">Points</p>
                                 <p class=" {{$tpValue->dmt_balance > 0?'text-success':'text-danger'}}"><strong>{{config('app.coin_symbol')}} {{number_format($tpValue->dmt_balance,2)}}</strong></p>
                              </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
            </div>
         </div>
      </div>
</div>


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">{{$banner->title, ''}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-0">
        <img src="{{asset('images/banner/'.$banner->image, '')}}" style="width: 100%;border-radius: 13px !important;">
      </div>
    </div>
  </div>
</div>

@if(isset($banner->image) && !empty($banner->image))<script>
document.addEventListener("DOMContentLoaded", function () {
    var myModal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
    myModal.show();
});
</script>
@endif

<script>
$(document).ready(function() {
    function startCountdown() {
        $('.countdown').each(function() {
            var start = new Date($(this).data('start')).getTime();
            var end = new Date($(this).data('end')).getTime();
            var now = new Date().getTime();
            
            // Calculate the remaining time
            var remainingTime = end - now;
            if (remainingTime < 0) {
                // If the countdown is over, show "Time's Up!"
                $(this).text("Time's up!");
                return;
            }

            // Get hours, minutes, and seconds
            var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            // Display countdown in h:m:s format
            $(this).text(hours + "h " + minutes + "m " + seconds + "s");

            // Update countdown every second
            setTimeout(startCountdown, 1000);
        });
    }

    // Initialize countdowns
    startCountdown();
});
</script>
@endsection