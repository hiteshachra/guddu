@extends('layouts.app')
@section('content')
    <!-- Content -->
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.upload-box {
    width: 200px;
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
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Setting</li>
              <li class="breadcrumb-item active">Banner</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

        <div class="card">

            <div class="card-header d-flex justify-content-between mb-0">
                <!-- <div class="head-label"> -->
                <h5 class="card-title">Config Setting</h5>
                <!-- </div> -->
            </div>

            <hr class="my-0">

            <div class="card-body">
                <form action="{{url('settings/config/config-update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
              
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="contact_us">Contact Us</label>
                            <input type="number" id="contact_us" name="contact_us" 
                                class="form-control @error('contact_us') is-invalid @enderror"
                                placeholder="Enter Contact Us" value="{{ old('contact_us',config('app.contact_us'))}}" />
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="email_us">Email Us</label>
                            <input type="text" id="email_us" name="email_us" 
                                class="form-control @error('email_us') is-invalid @enderror"
                                placeholder="Enter Email Us" value="{{ old('email_us',config('app.email_us'))}}" />
                        </div>                        
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="whatsapp">Whatsapp</label>
                            <input type="number" id="whatsapp" name="whatsapp" 
                                class="form-control @error('whatsapp') is-invalid @enderror"
                                placeholder="Enter Whatsapp" value="{{ old('whatsapp',config('app.whatsapp'))}}" />
                        </div>
                                               
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="facebook_page_id">Facebook Page URL</label>
                            <input type="text" id="facebook_page_id" name="facebook_page_id" 
                                class="form-control @error('facebook_page_id') is-invalid @enderror"
                                placeholder="Enter Facebook Page URL" value="{{ old('facebook_page_id',config('custom.facebook_page_id'))}}" />
                        </div>                       
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="twitter_page_id">Twitter Page URL</label>
                            <input type="text" id="twitter_page_id" name="twitter_page_id" 
                                class="form-control @error('twitter_page_id') is-invalid @enderror"
                                placeholder="Enter Twitter Page URL" value="{{ old('twitter_page_id',config('custom.twitter_page_id'))}}" />
                        </div>                       
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="instagram_page_id">Instagram Page URL</label>
                            <input type="text" id="instagram_page_id" name="instagram_page_id" 
                                class="form-control @error('instagram_page_id') is-invalid @enderror"
                                placeholder="Enter Instagram Page URL" value="{{ old('instagram_page_id',config('custom.instagram_page_id'))}}" />
                        </div>                       
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="linkedin_page_id">Linkedin Page URL</label>
                            <input type="text" id="linkedin_page_id" name="linkedin_page_id" 
                                class="form-control @error('linkedin_page_id') is-invalid @enderror"
                                placeholder="Enter Linkedin Page URL" value="{{ old('linkedin_page_id',config('custom.linkedin_page_id'))}}" />
                        </div>                    
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="coin_in_inr">Inr TO Points</label>
                            <input type="number" id="coin_in_inr" name="coin_in_inr" 
                                class="form-control @error('coin_in_inr') is-invalid @enderror"
                                placeholder="Enter Linkedin Page URL" value="{{ old('coin_in_inr',config('app.coin_in_inr'))}}" />
                        </div>
                                              
                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="address">Address</label>
                            <textarea type="number" id="address" name="address" 
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Enter Address">{{ old('address',config('app.address'))}}</textarea>
                        </div>

                        <div class="col-sm-3 mb-3">
                            <label class="form-label">QR Code Image</label>
                            <label class="upload-box">
                                <input type="file" id="fileInput" name="qr_code" accept="image/*" hidden />
                                <div class="placeholder" id="placeholder">
                                    <span class="plus-icon">+</span>
                                    <p>Select Image</p>
                                </div>
                                <img id="previewImage" class="preview-image" style="display: none;" />
                                <button type="button" id="removeBtn" class="remove-button" style="display: none;">✕ Remove</button>
                            </label>
                            @error('qr_code')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="upi_id">UPI ID</label>
                            <input type="text" id="upi_id" name="upi_id" 
                                class="form-control @error('upi_id') is-invalid @enderror"
                                placeholder="Enter UPI Id" value="{{ old('upi_id',config('app.upi_id'))}}" />
                        </div>

                        <div class="col-sm-12 mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
          </div>
        </div>
      </div>
    </section>
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


    function setPreviewImage(url, id, pl, btn, file) {
        const $img = $('#' + id);
        const $placeholder = $('#' + pl);
        const $removeBtn = $('#' + btn);
        const $fileInput = $('#' + file);

        // Clear and hide if URL is empty
        if (!url) {
            $img.hide().attr('src', '');
            $placeholder.show();
            $removeBtn.hide();
            return;
        }

        // Create a temporary image to test loading first
        const testImage = new Image();
        testImage.onload = function () {
            // Valid image, show it
            $img.attr('src', url).show();
            $placeholder.hide();
            $removeBtn.show();
        };
        testImage.onerror = function () {
            // Failed to load image
            $img.hide().attr('src', '');
            $placeholder.show();
            $removeBtn.hide();
            $fileInput.val('');
        };

        // Start loading test
        testImage.src = url;
    }

    setPreviewImage("{{asset('images/qr_code/'.config('app.qr_code'))}}",'previewImage', 'placeholder', 'removeBtn', 'fileInput'); 
</script>
@endsection