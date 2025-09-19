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
<!-- Basic profile -->
<h6 class="mb-3">Shop Info</h6>
<form action="{{ url('update-shop') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row gx-3 mb-2">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="shop_name" id="shop_name" placeholder="Shop Name" value="{{old('shop_name', $marketData->name)}}" class="form-control @error('shop_name') is-invalid @enderror"> 
                <label>Shop Name</label>
            </div>
            @error('shop_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="shop_address" id="shop_address" placeholder="Shop Address" value="{{old('shop_address', $marketData->address)}}" class="form-control @error('shop_address') is-invalid @enderror"> 
                <label>Shop Address</label>
            </div>
            @error('shop_address')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- address-->
    <h6 class="mt-5">Shop Logo</h6>
    <div class="row gx-3">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3 mt-2">
            <!-- <span>Cancelled Cheque / Bank Passbook etc</span> -->
            <label class="upload-box">
                <input type="file" id="fileInput" name="shop_logo" accept="image/*" hidden />
                <div class="placeholder" id="placeholder">
                    <span class="plus-icon">+</span>
                    <p>Select Image</p>
                </div>
                <img id="previewImage" class="preview-image" style="display: none;" />
                @if($marketData->status != 'VERIFIED')
                <button type="button" id="removeBtn" class="remove-button" style="display: none;">✕ Remove</button>
                @endif
            </label>
            @error('shop_logo')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        @if($marketData->status == 'REJECT')
        <div class="col-12 mt-3 text-danger text-center">
           <b>Remark:</b> {{$marketData->remarks}}
        </div>
        @endif
    </div>

    <div class="row justify-content-center gx-3 mt-3 mb-3 mb-lg-4">
        <div class="col">
            <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">Save</button>
        </div>
        <div class="col">
            <a href="{{url('profile')}}" class="btn btn-danger btn-lg style-none w-100">Back</a>
        </div>
    </div>
</form> 
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

    setPreviewImage("{{asset('images/shop_doc/'.$marketData->logo)}}",'previewImage', 'placeholder', 'removeBtn', 'fileInput'); 
  });
</script>
@endsection