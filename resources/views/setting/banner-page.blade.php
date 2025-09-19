@extends('layouts.app')
@section('content')
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
            <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Banner Form</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('settings/banner-list')}}" class="btn btn-sm btn-warning"><i class="fas fa-plus"></i>&ensp; Banner List</a></div>
                </div>
              </div>
              @if($single_data)
              <form method="post" action="" id="update-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="banner_type">Banner Type</label>
                        <select class="form-control form-control-sm" id="banner_type" name="banner_type" style="width: 100%;">
                          <option value="">Select Banner Type.</option>
                          <option value="1" {{$single_data->type == 'Home Slider'? 'selected':''}}>Home Slider (1200 X 650)</option>
                          <option value="2" {{$single_data->type == 'Offer Brand Image'? 'selected':''}}>Offer Brand Image (200 X 200)</option>
                          <option value="3" {{$single_data->type == 'Home Offer Banner'? 'selected':''}}>Home Offer Banner (1200 X 300)</option>
                          <option value="4" {{$single_data->type == 'Home Offer Zone Banner'? 'selected':''}}>Home Offer Zone Banner (2880 X 720)</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Banner Name</label>
                          <input type="text" id="banner_name" name="banner_name" class="form-control form-control-sm @error('banner_name') is-invalid @enderror" placeholder="Enter Banner Name." value="{{$single_data->name}}" readonly>
                          @error('banner_name')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Banner Title</label>
                          <input type="text" id="banner_title" name="banner_title" class="form-control form-control-sm @error('banner_title') is-invalid @enderror" placeholder="Enter Banner Title Name." value="{{$single_data->title}}">
                          @error('banner_title')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">URL</label>
                          <input type="text" id="url" name="url" class="form-control form-control-sm @error('url') is-invalid @enderror" placeholder="Enter url." value="{{$single_data->url}}">
                          @error('url')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="image">Image</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input custom-file-input-sm @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="custom-file-label custom-file-label-sm" for="image">Choose Category Image</label>
                            @error('image')
                                <span  class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                          </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                     <div class="form-group">
                          <label for="status">Status</label>
                          <select class="form-control form-control-sm @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="1" {{$single_data->status == 'Active'? 'selected':''}}>Active</option>
                            <option value="2" {{$single_data->status == 'Inactive'? 'selected':''}}>Inactive</option>
                          </select>
                          @error('status')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-labels-12">Description</label>
                          <textarea id="description" name="description" class="form-control form-control-sm @error('description') is-invalid @enderror" placeholder="Enter Description.">{{$single_data->desc}}</textarea>
                          @error('description')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="control-labels-12">Old Image</label><br>
                      <img src="{{asset('images/banner/'.$single_data->image)}}" alt="" height="50" width="50">
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-primary bg-gradient" id="form-update">Submit</button>
                  <a href="{{url('settings/banner-list')}}" class="btn btn-warning bg-gradient">Back</a>
                </div>
              </form>
              @else
              <form method="post" action="" id="submit-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="banner_type">Banner Type</label>
                        <select class="form-control form-control-sm" id="banner_type" name="banner_type" style="width: 100%;">
                          <option value="">Select Banner Type</option>
                          <option value="1" {{1 == old('banner_type')? 'selected':''}}>Home Slider (1200 X 650)</option>
                          <option value="2" {{2 == old('banner_type')? 'selected':''}}>Offer Brand Image (200 X 200)</option>
                          <option value="3" {{3 == old('banner_type')? 'selected':''}}>Home Offer Banner (1200 X 300)</option>
                          <option value="4" {{4 == old('banner_type')? 'selected':''}}>Home Offer Zone Banner (2880 X 720)</option>
                        </select>
                        @error('banner_type')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Banner Name</label>
                          <input type="text" id="banner_name" name="banner_name" class="form-control form-control-sm @error('banner_name') is-invalid @enderror" placeholder="Enter Category Name." value="{{old('banner_name')}}">
                          @error('banner_name')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Banner Title</label>
                          <input type="text" id="banner_title" name="banner_title" class="form-control form-control-sm @error('banner_title') is-invalid @enderror" placeholder="Enter Category Name." value="{{old('banner_title')}}">
                          @error('banner_title')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">URL</label>
                          <input type="url" id="url" name="url" class="form-control form-control-sm @error('url') is-invalid @enderror" placeholder="Enter Category Name." value="{{old('url')}}">
                          @error('url')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Image</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input custom-file-input-sm @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="custom-file-label custom-file-label-sm" for="image">Choose Banner Image</label>
                            @error('image')
                                <span  class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                          </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="status">Status</label>
                          <select class="form-control form-control-sm @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="1" {{old('status') == 1? 'selected':''}}>Active</option>
                            <option value="2" {{old('status') == 2? 'selected':''}}>Inactive</option>
                          </select>
                          @error('status')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label class="control-labels-12">Description</label>
                          <textarea id="description" name="description" class="form-control form-control-sm @error('description') is-invalid @enderror" placeholder="Enter Description.">{{old('description')}}</textarea>
                          @error('description')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-primary bg-gradient" id="form-submit">Submit</button>
                </div>
              </form>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection