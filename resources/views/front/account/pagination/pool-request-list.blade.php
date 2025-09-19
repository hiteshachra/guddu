@foreach($data as $value)
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
                <div class="avatar avatar-44 shadow-sm rounded-10">
                    <img src="{{asset('assets/img/coin_prizoo.jpeg')}}">
                </div>
            </div>
            <div class="col align-self-center ps-0">
                <p class="small mb-1"> <span class="text-secondary">Pool Name:</span> {{$value->pools->name}}</p>
                <p>Winning Position: {{ $value->win_level }} | <small class="text-secondary"> {{ $value->updated_at }}</small>
                </p>
            </div>
            <div class="col-auto align-self-center">
                <p class="small mb-1"> <span class="text-secondary">Winning Amount:</span> {{$value->win_amount}}</p>
                <p class="small mb-1"> <span class="text-secondary">Achieved Points:</span> {{$value->user_points}}</p>
            </div>
        </div>
    </div>
</div>
@endforeach