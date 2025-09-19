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
                <p class="small mb-1"> <span class="text-secondary">TXN:</span><a href="profile.html" class="fw-medium">{{$value->trans_id??'N/A'}}</a></p>
                <p>Send: {{config('app.currency_symbol')}} {{ $value->amount }} | <small class="text-secondary"> {{ $value->created_at }}</small>
                </p>
            </div>
            <div class="col-auto align-self-center">
                <div class="tag tag-small {{$value->status == 'Approved'?'bg-success':'bg-danger'}} border-success text-white px-2">
                    {{ $value->status }}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach