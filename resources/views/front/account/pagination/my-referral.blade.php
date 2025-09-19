@foreach($data as $value)
@php
    $profile_image = 'assets/img/user-1.svg';  
    if($value->gender == 'Female' ) {
        $profile_image = 'assets/img/user-2.svg';
    }
@endphp
<li class="list-group-item border-0">
    <div class="row">
        <div class="col-auto">
            <div class="card">
                <div class="card-body p-1">
                    <figure class="avatar avatar-44 rounded-15">
                        <img src="{{asset('images/kyc/user_photo/'.$value->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo">
                    </figure>
                </div>
            </div>
        </div>
        <div class="col">
            <p>{{$value->name}}<br><small class="text-secondary">{{$value->reg_code}}</small></p>
        </div>
        <div class="col-auto text-end">
            <p>{{$value->status}}<br><small class="text-secondary">{{$value->created_at}} </small></p>
        </div>
    </div>
</li>
@endforeach