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
<h6 class="mb-3">KYC Info</h6>
<form action="{{ url('update-kyc') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row gx-3 mb-2">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <select class="form-select form-control @error('document_type') is-invalid @enderror" id="document_type" name="document_type">
                    <option value="" selected>Select Document Type</option>
                    <option {{$kycData->address_proof_type == 'Adhaar Card'?'selected':''}}>Adhaar Card</option>
                    <option {{$kycData->address_proof_type == 'Election Commission Id Card'?'selected':''}}>Election Commission Id Card</option>
                    <option {{$kycData->address_proof_type == 'Drivers License'?'selected':''}}>Drivers License</option>
                    <option {{$kycData->address_proof_type == 'Passport Card'?'selected':''}}>Passport Card</option>
                    <option {{$kycData->address_proof_type == 'Other'?'selected':''}}>Other</option>
                </select>
                <label for="document_type">Document Type</label>
            </div>
            @error('document_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="document_no" id="document_no" placeholder="Name" value="{{$kycData->address_proof_no}}" class="form-control @error('document_no') is-invalid @enderror"> 
                <label>Document No</label>
            </div>
            @error('document_no')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- address-->
    <h6 class="mb-3">Document File</h6>
    <div class="row gx-3">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <span>Document Front-Side</span>
            <label class="upload-box">
                <input type="file" id="fileInput" name="document_front_side" accept="image/*" hidden />
                <div class="placeholder" id="placeholder">
                    <span class="plus-icon">+</span>
                    <p>Select Image</p>
                </div>
                <img id="previewImage" class="preview-image" style="display: none;" />
                @if($kycData->status != 'Verified')
                <button type="button" id="removeBtn" class="remove-button" style="display: none;">✕ Remove</button>
                @endif
            </label>
            @error('document_front_side')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <span>Document Back-Side</span>
            <label class="upload-box">
                <input type="file" id="fileInput1" name="document_back_side" accept="image/*" hidden />
                <div class="placeholder" id="placeholder1">
                    <span class="plus-icon">+</span>
                    <p>Select Image</p>
                </div>
                <img id="previewImage1" class="preview-image" style="display: none;" />
                @if($kycData->status != 'Verified')
                <button type="button" id="removeBtn1" class="remove-button" style="display: none;">✕ Remove</button>
                @endif
            </label>
            @error('document_back_side')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
      
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <span>Pan Card</span>
            <label class="upload-box">
                <input type="file" id="fileInput2" name="pan_card" accept="image/*" hidden />
                <div class="placeholder" id="placeholder2">
                    <span class="plus-icon">+</span>
                    <p>Select Image</p>
                </div>
                <img id="previewImage2" class="preview-image" style="display: none;" />
                @if($kycData->status != 'Verified')
                <button type="button" id="removeBtn2" class="remove-button" style="display: none;">✕ Remove</button>
                @endif
            </label>
            @error('pan_card')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        @if($kycData->status == 'Reject')
        <div class="col-12 mt-3 text-danger text-center">
           <b>Remark:</b> {{$kycData->remarks}}
        </div>
        @endif
    </div>
    @if($kycData->status != 'Verified')
    <div class="row justify-content-center gx-3 mt-5 mb-3 mb-lg-4">
        <div class="col">
            <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">Save</button>
        </div>
        <div class="col">
            <a href="{{url('profile')}}" class="btn btn-danger btn-lg style-none w-100">Back</a>
        </div>
    </div>
    @endif
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


    $('#fileInput1').on('change', function (e) {
      const file = e.target.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (event) {
          $('#previewImage1').attr('src', event.target.result).show();
          $('#placeholder1').hide();
          $('#removeBtn1').show();
        };
        reader.readAsDataURL(file);
      }
    });
    $('#removeBtn1').on('click', function (e) {
      e.preventDefault();
      $('#fileInput1').val('');
      $('#previewImage1').hide().attr('src', '');
      $('#placeholder1').show();
      $('#removeBtn1').hide();
    });




    $('#fileInput2').on('change', function (e) {
      const file = e.target.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (event) {
          $('#previewImage2').attr('src', event.target.result).show();
          $('#placeholder2').hide();
          $('#removeBtn2').show();
        };
        reader.readAsDataURL(file);
      }
    });
    $('#removeBtn2').on('click', function (e) {
      e.preventDefault();
      $('#fileInput2').val('');
      $('#previewImage2').hide().attr('src', '');
      $('#placeholder2').show();
      $('#removeBtn2').hide();
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

    setPreviewImage("{{asset('images/documents/'.$kycData->address_proof_front_img)}}",'previewImage', 'placeholder', 'removeBtn', 'fileInput'); 
    setPreviewImage("{{asset('images/documents/'.$kycData->address_proof_back_img)}}",'previewImage1', 'placeholder1', 'removeBtn1', 'fileInput1'); 
    setPreviewImage("{{asset('images/documents/'.$kycData->id_proof_img)}}",'previewImage2', 'placeholder2', 'removeBtn2', 'fileInput2'); 
  });
</script>
@endsection