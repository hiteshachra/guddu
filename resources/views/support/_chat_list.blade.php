@foreach($supportreplyInfo as $value)
  <div class="direct-chat-msg {{$value->type == 'Admin'?'right':''}}">
    <div class="direct-chat-infos clearfix">
      <span class="direct-chat-name {{$value->type == 'Admin'?'float-right':'float-left'}}">{{$value->type == 'Admin'?'Me':$supportInfo->user->name}}</span>
      <span class="direct-chat-timestamp {{$value->type == 'Admin'?'float-left':'float-right'}}">{{$value->created_at->format('d-m-Y h:m A')}}</span>
    </div>
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
    	@if($value->file)
        <div class="mw-100 position-relative mb-2 figure" >
            <div class="position-absolute end-0 top-0">
                <button type="button" class="avatar avatar-36 rounded-circle p-0.5 btn btn-danger text-white shadow-sm m-2" onclick="downloadImage('{{ asset('images/support_file/' . $value->file) }}')">
                    <i class="fa fa-download"></i>
                </button>
            </div>
            <img src="{{asset('images/support_file/'.$value->file)}}" alt="File" style="width: 200px;">
        </div>
        <br>
        @endif
		{{$value->description}}
    </div>
    <!-- /.direct-chat-text -->
  </div>
@endforeach