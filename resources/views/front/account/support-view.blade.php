@extends('front.layouts.app')
@section('content')
 <div class="row gx-2 align-items-center">
    

    <div class="col-auto">
        <a class="btn btn-square btn-link" href="{{url('support-list')}}">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div class="avatar avatar-50 rounded-15 p-1 shadow-sm bg-white">
            <img  src="{{asset('logo-icon.png')}}" alt="User Photo" class="rounded-12">
        </div>
    </div>
    <div class="col">
        <p class="small text-truncated mb-0 maxwidth-120">Administrator</p>
        <p class="fs-12 text-secondary mb-0">Support</p>
    </div>
</div>

<div class="row mb-5">
    <div id="chat-list" class="col-12 chat-list scroll-y mb-3">
    	@include('front.account.partials._chat_list')
    </div>
</div> 
@if($supportInfo->status == 'Open')
<div class="position-fixed bottom-0 start-0 chat-post" style="z-index: 10;">
	<form id="chat-form" enctype="multipart/form-data">
	    @csrf
	    <div class="row gx-3">
	        <div class="col-auto">
			    <!-- Hidden file input triggered by button -->
			    <input type="file" name="file" id="fileInput" style="display: none;" accept="image/*">
			    <button type="button" class="btn btn-outline-primary btn-44 avatar p-0" onclick="document.getElementById('fileInput').click();">
			        <i class="bi bi-plus"></i>
			    </button>
			    <!-- 👇 Preview goes here -->
			    <span id="preview"></span>
			</div>
	        <div class="col">
	            <div class="input-group">
	                <input type="text" name="message" class="form-control" placeholder="Write your message">
	                <button type="submit" class="btn btn-44 btn-outline-primary">
	                    <i class="bi bi-cursor"></i>
	                </button>
	            </div>
	        </div>
	    </div>
	</form>
</div>
@endif
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
        let url = "{{ url('support-reply/'.$supportInfo->id) }}"
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
            console.error(err);
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