@foreach($ledger_report as $item)
<li class="list-group-item">
   <div class="row">
       <div class="col-auto">
           <div class="avatar avatar-50 shadow rounded-10 ">
               <img src="{{$item->bal_type == 'DMT'? asset('assets/img/coin_prizoo.jpeg') :  asset('assets/img/coin_rupee.jpeg')}}" alt="">
           </div>
       </div>
       <div class="col align-self-center ps-0">
           <p class="text-color-theme mb-0">{{$item->trans_id}}</p>
           <p class="text-muted size-12">{{$item->ledger_type}}</p>
       </div>
       <div class="col align-self-center text-end">
           @if($item->cramount > 0)
               <p class="mb-0 text-success">+{{number_format($item->cramount, 2)}}</p>
           @else
               <p class="mb-0 text-danger">-{{number_format($item->dramount, 2)}}</p>
           @endif
           <p class="text-muted size-12">Date: {{$item->created_at}}</p>
       </div>
   </div>
</li>
@endforeach