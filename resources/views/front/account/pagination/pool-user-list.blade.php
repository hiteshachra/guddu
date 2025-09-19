@foreach($data as $key => $value)
@php
    $profile_image = 'assets/img/user-1.svg';  
    if($value->users->gender == 'Female' ) {
        $profile_image = 'assets/img/user-2.svg';
    }

    $level = $key+1;
@endphp
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
                <div class="avatar avatar-44 shadow-sm rounded-10">
                    <img src="{{asset('images/kyc/user_photo/'.$value->users->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo">
                </div>
            </div>
            @if($poolData->status == 'Open')
            <div class="col align-self-center ps-0">
                <p class="small mb-1"> <span class="text-secondary">Name:</span> {{$value->users->name}}</p>
                @if(isset($poolcomm[$key]))
                <p><span class="tag {{ $poolcomm[$key]->distribute > 0?'bg-success':'bg-danger'}} border-white text-white">Rank: {{ $level }}</span></p>
                @else
                <p><span class="tag bg-danger border-white text-white">Rank: {{ $level }}</span></p>
                @endif
            </div>
            <div class="col-auto align-self-center">
                @if(isset($poolcomm[$key]))
                <p class="small mb-1"> <span class="text-secondary">Win Prize:</span> {{$poolcomm[$key]->distribute}}</p>
                @else
                <p class="small mb-1"> <span class="text-secondary">Win Prize:</span> 0</p>
                @endif
                @if($poolData->for == 'Vendor')
                <p class="small mb-1"> <span class="text-secondary">Points:</span> {{$value->aeps_balance}}</p>
                @else
                <p class="small mb-1"> <span class="text-secondary">Points:</span> {{$value->dmt_balance}}</p>
                @endif
            </div>
            @else
            <div class="col align-self-center ps-0">
                <p class="small mb-1"> <span class="text-secondary">Name:</span> {{$value->users->name}}</p>
                <p><span class="tag {{ $value->win_level > 0?'bg-success':'bg-danger'}} border-white text-white">Rank: {{ $value->win_level }}</span></p>
            </div>
            <div class="col-auto align-self-center">
                <p class="small mb-1"> <span class="text-secondary">Win Prize:</span> {{$value->win_amount}}</p>
                <p class="small mb-1"> <span class="text-secondary">Points:</span> {{$value->user_points}}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endforeach