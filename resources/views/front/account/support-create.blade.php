@extends('front.layouts.app')
@section('content')
<style>
.upload-box {
    width: 100%;
    height: 200px;
    border: 1px dashed #ccc;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: #f9f9f9;
    overflow: hidden;
    position: relative;
    flex-direction: column;
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
    -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.placeholder {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #aaa;
}

.plus-icon {
  font-size: 40px;
  margin-bottom: 5px;
}

.preview-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  border-radius: 5px;
}

.remove-button {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 12px;
    cursor: pointer !important;
}
</style>
<div class="row mb-3">
    <div class="col">
        <h6 class="title">Support Requests</h6>
    </div>
    <div class="col-auto align-self-center">
        <a href="{{url('support-list')}}" class="small">Request List</a>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6 col-lg-4 mx-auto">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-body">
                <form class="" action="" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <select class="form-select form-control" id="support_for" name="support_for">
                            <option disabled selected>Select Support For</option>
                            <option value="Account Related" {{old('support_for') == 'Account Related'?'selected':''}}>Account Related</option>
                            <option value="Transaction Related" {{old('support_for') == 'Transaction Related'?'selected':''}}>Transaction Related</option>
                            <option value="Document Related" {{old('support_for') == 'Document Related'?'selected':''}}>Document Related</option>
                            <option value="User Role Related" {{old('support_for') == 'User Role Related'?'selected':''}}>User Role Related</option>
                            <option value="Pool Related" {{old('support_for') == 'Pool Related'?'selected':''}}>Pool Related</option>
                            <option value="Other" {{old('support_for') == 'Other'?'selected':''}}></option>
                        </select>
                        <label for="support_for">Support For</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Issue title." value="{{old('title')}}">
                        <label for="title">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea rows="6" class="form-control" id="description" name="description" placeholder="Describe your issue.">{{old('description')}}</textarea>
                        <label for="description">Description</label>
                    </div>
                    <h6 class="mt-1 mb-1">Image</h6>
                    <label class="upload-box">
                        <input type="file" id="fileInput" name="file" accept="image/*" hidden />
                        <div class="placeholder" id="placeholder">
                            <span class="plus-icon">+</span>
                            <p>Select Image</p>
                        </div>
                        <img id="previewImage" class="preview-image" style="display: none;" />
                        <button type="button" id="removeBtn" class="remove-button" style="display: none;">✕ Remove</button>
                    </label>
                    @error('file')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-lg btn-default shadow-sm">Send Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
        <div class="col-12 col-md-6 col-lg-4 mx-auto text-center">
            <p>Follow this link to join Group</p>
        <a href="https://chat.whatsapp.com/KK0TUA5f6RZ8TIqIIwUWM7?mode=r_t" target="_blank">        
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 1219.547 1225.016" id="whatsapp">
              <path fill="#E0E0E0" d="M1041.858 178.02C927.206 63.289 774.753.07 612.325 0 277.617 0 5.232 272.298 5.098 606.991c-.039 106.986 27.915 211.42 81.048 303.476L0 1225.016l321.898-84.406c88.689 48.368 188.547 73.855 290.166 73.896h.258.003c334.654 0 607.08-272.346 607.222-607.023.056-162.208-63.052-314.724-177.689-429.463zm-429.533 933.963h-.197c-90.578-.048-179.402-24.366-256.878-70.339l-18.438-10.93-191.021 50.083 51-186.176-12.013-19.087c-50.525-80.336-77.198-173.175-77.16-268.504.111-278.186 226.507-504.503 504.898-504.503 134.812.056 261.519 52.604 356.814 147.965 95.289 95.36 147.728 222.128 147.688 356.948-.118 278.195-226.522 504.543-504.693 504.543z"></path>
              <linearGradient id="a" x1="609.77" x2="609.77" y1="1190.114" y2="21.084" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#20b038"></stop>
                <stop offset="1" stop-color="#60d66a"></stop>
              </linearGradient>
              <path fill="url(#a)" d="M27.875 1190.114l82.211-300.18c-50.719-87.852-77.391-187.523-77.359-289.602.133-319.398 260.078-579.25 579.469-579.25 155.016.07 300.508 60.398 409.898 169.891 109.414 109.492 169.633 255.031 169.57 409.812-.133 319.406-260.094 579.281-579.445 579.281-.023 0 .016 0 0 0h-.258c-96.977-.031-192.266-24.375-276.898-70.5l-307.188 80.548z"></path>
              <path fill="#FFF" fill-rule="evenodd" d="M462.273 349.294c-11.234-24.977-23.062-25.477-33.75-25.914-8.742-.375-18.75-.352-28.742-.352-10 0-26.25 3.758-39.992 18.766-13.75 15.008-52.5 51.289-52.5 125.078 0 73.797 53.75 145.102 61.242 155.117 7.5 10 103.758 166.266 256.203 226.383 126.695 49.961 152.477 40.023 179.977 37.523s88.734-36.273 101.234-71.297c12.5-35.016 12.5-65.031 8.75-71.305-3.75-6.25-13.75-10-28.75-17.5s-88.734-43.789-102.484-48.789-23.75-7.5-33.75 7.516c-10 15-38.727 48.773-47.477 58.773-8.75 10.023-17.5 11.273-32.5 3.773-15-7.523-63.305-23.344-120.609-74.438-44.586-39.75-74.688-88.844-83.438-103.859-8.75-15-.938-23.125 6.586-30.602 6.734-6.719 15-17.508 22.5-26.266 7.484-8.758 9.984-15.008 14.984-25.008 5-10.016 2.5-18.773-1.25-26.273s-32.898-81.67-46.234-111.326z" clip-rule="evenodd"></path>
              <path fill="#FFF" d="M1036.898 176.091C923.562 62.677 772.859.185 612.297.114 281.43.114 12.172 269.286 12.039 600.137 12 705.896 39.633 809.13 92.156 900.13L7 1211.067l318.203-83.438c87.672 47.812 186.383 73.008 286.836 73.047h.255.003c330.812 0 600.109-269.219 600.25-600.055.055-160.343-62.328-311.108-175.649-424.53zm-424.601 923.242h-.195c-89.539-.047-177.344-24.086-253.93-69.531l-18.227-10.805-188.828 49.508 50.414-184.039-11.875-18.867c-49.945-79.414-76.312-171.188-76.273-265.422.109-274.992 223.906-498.711 499.102-498.711 133.266.055 258.516 52 352.719 146.266 94.195 94.266 146.031 219.578 145.992 352.852-.118 274.999-223.923 498.749-498.899 498.749z"></path>
            </svg>

        </a>
        <a href="https://t.me/+vy0b9pyQYC4yNzI9" target="_blank">            
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48" id="telegram">
              <rect width="48" height="48" fill="#419FD9" rx="24"></rect>
              <rect width="48" height="48" fill="url(#paint0_linear)" rx="24"></rect>
              <path fill="#fff" d="M10.7874 23.4709C17.7667 20.3663 22.4206 18.3195 24.7493 17.3305C31.3979 14.507 32.7795 14.0165 33.68 14.0002C33.878 13.9968 34.3208 14.0469 34.6077 14.2845C34.8499 14.4852 34.9165 14.7563 34.9484 14.9465C34.9803 15.1368 35.02 15.5702 34.9884 15.9088C34.6281 19.774 33.0692 29.1539 32.276 33.483C31.9404 35.3148 31.2796 35.929 30.6399 35.9891C29.2496 36.1197 28.1938 35.051 26.8473 34.1497C24.7401 32.7395 23.5498 31.8615 21.5044 30.4854C19.1407 28.895 20.673 28.0209 22.0201 26.5923C22.3726 26.2185 28.4983 20.5295 28.6169 20.0135C28.6317 19.9489 28.6455 19.7083 28.5055 19.5813C28.3655 19.4543 28.1589 19.4977 28.0098 19.5322C27.7985 19.5812 24.4323 21.8529 17.9113 26.3473C16.9558 27.0172 16.0904 27.3435 15.315 27.3264C14.4602 27.3076 12.8159 26.833 11.5935 26.4273C10.0942 25.9296 8.90254 25.6666 9.0063 24.8215C9.06035 24.3813 9.65403 23.9311 10.7874 23.4709Z"></path>
              <defs>
                <linearGradient id="paint0_linear" x1="24" x2="24" y2="47.644" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#2AABEE"></stop>
                  <stop offset="1" stop-color="#229ED9"></stop>
                </linearGradient>
              </defs>
            </svg>

        </a>
    </div>
</div>
<script>
$(document).ready(function () {
    $('#fileInput').on('change', function (e) {
      const file = e.target.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (event) {
          $('#previewImage').attr('src', event.target.result).show();
          $('#placeholder').hide();
          $('#removeBtn').show();
        };
        reader.readAsDataURL(file);
      }
    });
    $('#removeBtn').on('click', function (e) {
      e.preventDefault();
      $('#fileInput').val('');
      $('#previewImage').hide().attr('src', '');
      $('#placeholder').show();
      $('#removeBtn').hide();
    });
});
</script>
@endsection