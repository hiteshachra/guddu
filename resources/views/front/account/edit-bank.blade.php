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
<h6 class="mb-3">Bank Info</h6>
<form action="{{ url('update-bank') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row gx-3 mb-2">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="account_holder_name" id="account_holder_name" placeholder="Account Holder Name" value="{{old('account_holder_name', $bankData->user_name_at_bank)}}" class="form-control @error('account_holder_name') is-invalid @enderror"> 
                <label>Account Holder Name</label>
            </div>
            @error('account_holder_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="account_number" id="account_number" placeholder="Account Number" value="{{old('account_number',$bankData->account_number)}}" class="form-control @error('account_number') is-invalid @enderror"> 
                <label>Account Number</label>
            </div>
            @error('account_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="bank_name" id="bank_name" placeholder="Bank Name" value="{{old('bank_name',$bankData->name)}}" class="form-control @error('bank_name') is-invalid @enderror"> 
                <label>Bank Name</label>
            </div>
            @error('bank_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="branch" id="branch" placeholder="Branch" value="{{old('branch',$bankData->branch)}}" class="form-control @error('branch') is-invalid @enderror"> 
                <label>Branch</label>
            </div>
            @error('branch')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="ifsc_code" id="ifsc_code" placeholder="IFSC Code" value="{{old('ifsc_code',$bankData->ifscode)}}" class="form-control @error('ifsc_code') is-invalid @enderror"> 
                <label>IFSC Code</label>
            </div>
            @error('ifsc_code')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="upi_id" id="upi_id" placeholder="UPI Id" value="{{old('upi_id',$bankData->upi_id)}}" class="form-control @error('upi_id') is-invalid @enderror"> 
                <label>UPI Id</label>
            </div>
            @error('upi_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <h6 class="mt-5">Bank Proof Document</h6>
    <div class="row gx-3">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <span>Cancelled Cheque / Bank Passbook etc</span>
            <label class="upload-box">
                <input type="file" id="fileInput" name="bank_proof_document" accept="image/*" hidden />
                <div class="placeholder" id="placeholder">
                    <span class="plus-icon">+</span>
                    <p>Select Image</p>
                </div>
                <img id="previewImage" class="preview-image" style="display: none;" />
                @if($bankData->status != 'VERIFIED')
                <button type="button" id="removeBtn" class="remove-button" style="display: none;">✕ Remove</button>
                @endif
            </label>
            @error('bank_proof_document')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        @if($bankData->status == 'REJECT')
        <div class="col-12 mt-3 text-danger text-center">
           <b>Remark:</b> {{$bankData->remarks}}
        </div>
        @endif
    </div>
    @if($bankData->status != 'VERIFIED')
    <div class="row justify-content-center gx-3 mt-3 mb-3 mb-lg-4">
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

    setPreviewImage("{{asset('images/bank_doc/'.$bankData->cancele_chq)}}",'previewImage', 'placeholder', 'removeBtn', 'fileInput'); 
  });
</script>
@endsection