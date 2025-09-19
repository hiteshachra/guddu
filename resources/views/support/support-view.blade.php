@extends('layouts.app')
@section('content')
 <style>
.avatar {
    position: relative;
    display: inline-block;
    overflow: hidden;
    margin: 0;
    text-align: center;
    vertical-align: middle;
}
.btn-44 {
    /*height: 44px;*/
    /*line-height: 42px;*/
    width: 44px;
    padding: 0 !important;
}
 </style>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Support</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
            <li class="breadcrumb-item">Support</li>
            <li class="breadcrumb-item active">Reply</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      	<div class="row">
			<div class="col-md-12">
	            <div class="card card-primary card-outline direct-chat direct-chat-primary">
	              <div class="card-header">
	                <h3 class="card-title">{{$supportInfo->code}}</h3>

	                <div class="card-tools">
	                  <span title="3 New Messages" class="badge {{$supportInfo->status == 'Open'?'bg-danger':'bg-success'}}">{{$supportInfo->status}}</span>
	                </div>
	              </div>

	              <div class="card-body">
	                <div class="direct-chat-messages chat-list scroll-y mb-3" id="chat-list" style="height: 400px;">
                            @include('support._chat_list')
	                </div>
	              </div>
	              <!-- /.card-body -->
	              <div class="card-footer">
	              	@if($supportInfo->status == 'Open')
	                <form id="chat-form" enctype="multipart/form-data">
	                  <div class="input-group">
	                  	 @csrf
					    <!-- Hidden file input triggered by button -->
					    <input type="file" name="file" id="fileInput" style="display: none;" accept="image/*">
					    <button type="button" class="btn btn-outline-primary btn-44 avatar p-0" onclick="document.getElementById('fileInput').click();" style="border-radius: 15px;">
					        <i class="fa fa-upload"></i>
					    </button>
					    <!-- 👇 Preview goes here -->
					    <span id="preview"></span>
			
	                    <input type="text" name="message" placeholder="Type Message ..." class="form-control rounded" style="margin-left: 10px;margin-right: 10px;">
	                    <span class="input-group-append">
	                      <button type="submit" class="btn btn-primary rounded">Send</button>
	                    </span>
	                  </div>
	                </form>

					@endif
	              </div>
	              <!-- /.card-footer-->
	            </div>
          	</div>
      	</div>
    </div>
  </section>
</div>
<script>
    function downloadImage(url) {
        const link = document.createElement('a');
        link.href = url;
        link.download = url.substring(url.lastIndexOf('/') + 1); // filename
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    function scrollChatToBottom() {
        const chatList = document.getElementById('chat-list');
        chatList.scrollTop = chatList.scrollHeight;
    }

    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let url = "{{ url('support/reply/'.$supportInfo->id) }}"
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Replace chat list with new HTML
                document.getElementById('chat-list').innerHTML = data.html;

                // Clear input + file
                this.reset();
                const preview = document.getElementById('preview');
                preview.innerHTML = '';
                scrollChatToBottom();
            } else {
                alert('Failed to send');
            }
        })
        .catch(err => {
            // console.error(err);
            alert('Write your message');
        });
    });


  const fileInput = document.getElementById('fileInput');
  const preview = document.getElementById('preview');

  fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.innerHTML = `<img src="${e.target.result}" alt="Selected Image" class="img-fluid rounded" style="max-width: 42px;border-radius: 12px !important;">`;
      };
      reader.readAsDataURL(file);
    } else {
      preview.innerHTML = ''; // clear if no file
    }
  });

  document.addEventListener('DOMContentLoaded', function() {
    scrollChatToBottom();
  });
</script>
@endsection