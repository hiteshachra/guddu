@foreach($data as $item)
<li class="list-group-item">
   <div class="row">
         <div class="col-auto">
            <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">
               <img src="{{asset('assets/img/rs-trans.png')}}" alt="" class="rounded-15">
            </div>
         </div>
         <div class="col align-self-center ps-0">
            <p class="text-secondary size-10 mb-0">Send TO : {{ $item->toUser->name ?? 'N/A' }} | {{ $item->toUser->phone_number ?? 'N/A' }}</p>
            <p>{{$item->trans_id}}</p>
            <p id="statusid_{{$item->id}}" class="{{$item->status == 'Approved'?'text-success':'text-danger'}}">{{$item->status}}</p>
         </div>
         <div class="col align-self-center text-end">
            <p class="text-secondary text-muted size-10 mb-0">{{ $item->created_at->format('d-m-Y | h:ia') }}</p>
            <p>{{config('app.currency_symbol')}} {{$item->amount}}</p>
            <p id="btnid_{{$item->id}}"> @if($item->points > 0) {{config('app.coin_symbol')}} {{$item->points}} @endif</p>
         </div>
   </div>
</li>
@endforeach