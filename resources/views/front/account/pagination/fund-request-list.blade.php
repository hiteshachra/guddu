@foreach($data as $value)
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
                <div class="avatar avatar-44 shadow-sm rounded-10">
                    <img src="{{asset('assets/img/coin_rupee.jpeg')}}">
                </div>
            </div>
            <div class="col align-self-center ps-0">
                <p class="small"> <span class="text-secondary">TXN:</span>{{$value->trans_id??'N/A'}}</p>
                <p class="small">Send: {{config('app.currency_symbol')}} {{ $value->amount }} 
                    <small class="text-secondary"> | {{ \Carbon\Carbon::parse($value->created_at)->format('j F Y h:i A') }}</small>
                </p>
                <p class="small {{$value->status == 'Approved'?'text-success':'text-danger'}}">
                    {{ $value->status }}
                </p>
            </div>
            <div class="col-auto align-self-center">
                <img src="{{asset('images/fund_requests/'.$value->utr_img)}}" style="width: 100px;height: 71px;border-radius: 12px;cursor: pointer;" onclick="showImageModal('{{ asset('images/fund_requests/' . $value->utr_img) }}')"> 
            </div>
        </div>
    </div>
</div>
@endforeach