@foreach($supportreplyInfo as $value)
<div class="row no-margin {{$value->user_id == auth()->user()->id?'right-chat':'left-chat'}}">
    <div class="col-12">
        <div class="chat-block">
            <div class="row">
                <div class="col">
                	@if($value->file)
                    <div class="mw-100 position-relative mb-2 figure" >
                        <div class="position-absolute end-0 top-0">
                            <button type="button" class="avatar avatar-36 rounded-circle p-0 btn btn-info text-white shadow-sm m-2" onclick="downloadImage('{{ asset('images/support_file/' . $value->file) }}')">
                                <i class="bi bi-download"></i>
                            </button>
                        </div>
                        <img src="{{asset('images/support_file/'.$value->file)}}" alt="File" class="mw-100">
                    </div>
                    @endif
                    {{$value->description}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-12  {{$value->user_id == auth()->user()->id?'text-end':''}}">
        <p class="text-secondary small time">{{$value->created_at->format('d-m-Y h:m A')}}
        </p>
    </div>
</div>
@endforeach