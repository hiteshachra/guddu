@extends('front.layouts.app')
@section('content')
<style>
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
<!-- Basic profile -->
<h6 class="mb-3">Profile Settings</h6>
<form action="{{ url('update-profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row gx-3 mb-2">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="form-floating">
                <input type="text" name="name" id="name" placeholder="Name" value="{{old('name', $userInfo->name)}}" class="form-control @error('name') is-invalid @enderror"> 
                <label>Name</label>
            </div>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <input type="email" name="email" id="email" placeholder="Email Address" value="{{old('email', $userInfo->email)}}" disabled class="form-control @error('email') is-invalid @enderror"> 
                <label>Email Address</label>
            </div>
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <input type="number" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{old('phone_number', $userInfo->phone_number)}}" disabled class="form-control @error('phone_number') is-invalid @enderror"> 
                <label>Phone Number</label>
            </div>
            @error('phone_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <select class="form-select form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                    <option value="" selected>Select Gender</option>
                    <option {{old('gender', $userInfo->gender) == 'Male'?'selected':''}}>Male</option>
                    <option {{old('gender', $userInfo->gender) == 'Female'?'selected':''}}>Female</option>
                    <option {{old('gender', $userInfo->gender) == 'Other'?'selected':''}}>Other</option>
                </select>
                <label for="gender">Gender</label>
            </div>
            @error('gender')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <input type="date" name="dob" id="dob" placeholder="Birth Date" value="{{old('dob', $userInfo->dob)}}" class="form-control datepicker @error('dob') is-invalid @enderror"> 
                <label>Birth date</label>
            </div>
            @error('dob')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- address-->
    <h6 class="mb-3">Address</h6>
    <div class="row gx-3">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <input name="address" id="address" placeholder="Address" value="{{old('address', $address->address)}}" class="form-control @error('address') is-invalid @enderror"> 
                <label>Address</label>
            </div>
            @error('address')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <input name="street" id="street" placeholder="Street" value="{{old('street', $address->street)}}" class="form-control @error('street') is-invalid @enderror"> 
                <label>Street</label>
            </div>
            @error('street')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <select class="form-select form-control @error('country') is-invalid @enderror" id="country" name="country" onchange="get_state(this.value, 'state')">
                    <option value="">Select Country</option>
                    @foreach($countryList as $conValue)
                    <option value="{{$conValue->id}}" {{$address->country == $conValue->id?'selected':''}}>{{$conValue->name}}</option>
                    @endforeach
                </select>
                <label for="country">Country</label>
            </div>
            @error('country')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <select class="form-select form-control @error('state') is-invalid @enderror" id="state" name="state" onchange="get_city(this.value, 'city')">
                    <option value="">Select State</option>
                    @foreach($stateList as $sValue)
                    <option value="{{$sValue->id}}" {{$address->state == $sValue->id?'selected':''}}>{{$sValue->name}}</option>
                    @endforeach
                </select>
                <label for="state">State</label>
            </div>
            @error('state')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <select class="form-select form-control @error('city') is-invalid @enderror" id="city" name="city">
                    <option value="">Select City</option>
                    @foreach($citieList as $ciValue)
                    <option value="{{$ciValue->id}}" {{$address->city == $ciValue->id?'selected':''}}>{{$ciValue->name}}</option>
                    @endforeach
                </select>
                <label for="city">City</label>
            </div>
            @error('city')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="form-floating">
                <input name="pincode" id="pincode" placeholder="Pincode" value="{{old('pincode', $address->zip)}}" class="form-control @error('pincode') is-invalid @enderror"> 
                <label>Pincode</label>
            </div>
            @error('pincode')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <h6 class="mt-5">Profile Image <code>(100 X 100)</code></h6>
    <div class="row gx-3">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3 mt-2">
            <label class="upload-box">
                <input type="file" id="fileInput" name="profile_image" accept="image/*" hidden />
                <div class="placeholder" id="placeholder">
                    <span class="plus-icon">+</span>
                    <p>Select Image</p>
                </div>
                <img id="previewImage" class="preview-image" style="display: none;" />
                <button type="button" id="removeBtn" class="remove-button" style="display: none;">✕ Remove</button>
            </label>
            @error('shop_logo')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
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

    setPreviewImage("{{asset('images/profile/'.$userInfo->profile_pic)}}",'previewImage', 'placeholder', 'removeBtn', 'fileInput'); 
  });
</script>
@endsection