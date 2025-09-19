@foreach($data as $value)
@php
    $profile_image = 'assets/img/user-1.svg';  
    if($value->user->gender == 'Female' ) {
        $profile_image = 'assets/img/user-2.svg';
    }
@endphp
<a href="{{url('support-view/'.base64_encode($value->code))}}" class="list-group-item">
    <div class="row">
        <div class="col-auto">
            <div class="avatar avatar-50 rounded-15 p-1 shadow-sm bg-white">
                <img  src="{{asset('images/kyc/user_photo/'.$value->user->profile_pic)}}" onerror="this.onerror=null;this.src='{{ asset($profile_image) }}';" alt="User Photo" class="rounded-12">
            </div>
        </div>
        <div class="col align-self-center">
            <p class="mb-0">{{$value->code}} <span class="float-end size-12 {{$value->status == 'Open'?'text-danger':'text-success'}}"><strong>{{$value->status}}</strong></span></p>
            <p class="text-secondary">{{$value->subject}}  <span class="float-end size-12 text-secondary">{{$value->created_at->format('d-m-Y h:m A')}}</span></p>
        </div>
    </div>
</a>
@endforeach