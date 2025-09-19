@foreach($data as $item)
<li class="list-group-item">
   <div class="row">
         <div class="col-auto">
            <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">
               <img src="{{asset('assets/img/rs-trans.png')}}" alt="" class="rounded-15">
            </div>
         </div>
         <div class="col align-self-center ps-0">
            <p class="text-secondary size-10 mb-0">Received TO : {{ $item->fromUser->name ?? 'N/A' }} | {{ $item->fromUser->phone_number ?? 'N/A' }}</p>
            <p>{{$item->trans_id}}</p>
            <p id="statusid_{{$item->id}}" class="{{$item->status == 'Approved'?'text-success':'text-danger'}}">{{$item->status}}</p>
         </div>
         <div class="col align-self-center text-end">
            <p class="text-secondary text-muted size-10 mb-0">{{ $item->created_at->format('d-m-Y | h:ia') }}</p>
            <p>{{config('app.currency_symbol')}} {{$item->amount}}</p>            
            <p id="btnid_{{$item->id}}">
               @if($item->status == 'Pending')
               <button class="btn btn-sm btn-success" onclick="confirmSubmit('{{$item->id}}','{{$item->status}}')">Verify</button>
               @else
               {{config('app.coin_symbol')}} {{$item->points}}
               @endif
            </p>
         </div>
   </div>
</li>
@endforeach