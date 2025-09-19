@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subscription</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Setting</li>
              <li class="breadcrumb-item active">Subscription</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Subscription Form</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('settings/subscription-list')}}" class="btn btn-sm btn-warning"><i class="fas fa-plus"></i>&ensp; Subscription List</a></div>
                </div>
              </div>
              @if($single_data)
              <form method="post" action="" id="update-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="subscription_tag">Subscription Tag</label>
                        <select class="form-control form-control-sm @error('subscription_tag') is-invalid @enderror" id="subscription_tag" name="subscription_tag" style="width: 100%;">
                          <option value="">Select Subscription Tag</option>
                          <option value="1" {{'New' == $single_data->tag? 'selected':''}}>New</option>
                          <option value="2" {{'Popular' == $single_data->tag? 'selected':''}}>Popular</option>
                          <option value="3" {{'Recommended' == $single_data->tag? 'selected':''}}>Recommended</option>
                        </select>
                        @error('subscription_tag')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Subscription Name</label>
                          <input type="text" id="subscription_name" name="subscription_name" class="form-control form-control-sm @error('subscription_name') is-invalid @enderror" placeholder="Enter Subscription Name." value="{{$single_data->name}}">
                          @error('subscription_name')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="subscription_subject">Subscription Subject</label>
                          <input type="text" id="subscription_subject" name="subscription_subject" class="form-control form-control-sm @error('subscription_subject') is-invalid @enderror" placeholder="Enter Subscription Subject." value="{{$single_data->subject}}">
                          @error('subscription_subject')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="subscription_type">Subscription Type</label>
                        <select class="form-control form-control-sm @error('subscription_type') is-invalid @enderror" id="subscription_type" name="subscription_type" style="width: 100%;">
                          <option value="">Select Subscription Type</option>
                          <option value="1" {{'Month' == $single_data->type? 'selected':''}}>Month</option>
                          <option value="2" {{'Year' == $single_data->type? 'selected':''}}>Year</option>
                        </select>
                        @error('subscription_type')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Plan Days</label>
                          <input type="number" id="plan_days" name="plan_days" class="form-control form-control-sm @error('plan_days') is-invalid @enderror" placeholder="Enter Plan Days. ex. Type Year 365 Month 31 or 30 or 29 or 28" value="{{$single_data->plan_days}}">
                          @error('plan_days')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="plan_daily_amount">Plan Daily Amount</label>
                          <input type="number" id="plan_daily_amount" name="plan_daily_amount" class="form-control form-control-sm @error('plan_daily_amount') is-invalid @enderror" placeholder="Enter Plan Daily Amount ex. 1 day rs. 2" value="{{$single_data->plan_daily_amount}}">
                          @error('plan_daily_amount')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Image</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input custom-file-input-sm @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="custom-file-label custom-file-label-sm" for="image">Choose Subscription Image</label>
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
                    <div class="col-md-12">
                      <div class="form-group">
                          <label class="control-labels-12">Description</label>
                          <textarea id="description" name="description" class="form-control form-control-sm @error('description') is-invalid @enderror" placeholder="Enter Description.">{{$single_data->description}}</textarea>
                          @error('description')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="control-labels-12">Old Image</label><br>
                      <img src="{{asset('images/subscription/'.$single_data->image)}}" alt="" height="50" width="50">
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-primary bg-gradient" id="form-update">Submit</button>
                  <a href="{{url('settings/subscription-list')}}" class="btn btn-warning bg-gradient">Back</a>
                </div>
              </form>
              @else
              <form method="post" action="" id="submit-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="subscription_tag">Subscription Tag</label>
                        <select class="form-control form-control-sm @error('subscription_tag') is-invalid @enderror" id="subscription_tag" name="subscription_tag" style="width: 100%;">
                          <option value="">Select Subscription Tag</option>
                          <option value="1" {{1 == old('subscription_tag')? 'selected':''}}>New</option>
                          <option value="2" {{2 == old('subscription_tag')? 'selected':''}}>Popular</option>
                          <option value="3" {{3 == old('subscription_tag')? 'selected':''}}>Recommended</option>
                        </select>
                        @error('subscription_tag')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Subscription Name</label>
                          <input type="text" id="subscription_name" name="subscription_name" class="form-control form-control-sm @error('subscription_name') is-invalid @enderror" placeholder="Enter Subscription Name." value="{{old('subscription_name')}}">
                          @error('subscription_name')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="subscription_subject">Subscription Subject</label>
                          <input type="text" id="subscription_subject" name="subscription_subject" class="form-control form-control-sm @error('subscription_subject') is-invalid @enderror" placeholder="Enter Subscription Subject." value="{{old('subscription_subject')}}">
                          @error('subscription_subject')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="subscription_type">Subscription Type</label>
                        <select class="form-control form-control-sm @error('subscription_type') is-invalid @enderror" id="subscription_type" name="subscription_type" style="width: 100%;">
                          <option value="">Select Subscription Type</option>
                          <option value="1" {{1 == old('subscription_type')? 'selected':''}}>Month</option>
                          <option value="2" {{2 == old('subscription_type')? 'selected':''}}>Year</option>
                        </select>
                        @error('subscription_type')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Plan Days</label>
                          <input type="number" id="plan_days" name="plan_days" class="form-control form-control-sm @error('plan_days') is-invalid @enderror" placeholder="Enter Plan Days. ex. Type Year 365 Month 31 or 30 or 29 or 28" value="{{old('plan_days')}}">
                          @error('plan_days')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="plan_daily_amount">Plan Daily Amount</label>
                          <input type="number" id="plan_daily_amount" name="plan_daily_amount" class="form-control form-control-sm @error('plan_daily_amount') is-invalid @enderror" placeholder="Enter Plan Daily Amount ex. 1 day rs. 2" value="{{old('plan_daily_amount')}}">
                          @error('plan_daily_amount')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Image</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input custom-file-input-sm @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="custom-file-label custom-file-label-sm" for="image">Choose Subscription Image</label>
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
<script type="text/javascript">

  $(function () {
    $('#description').summernote();
  })
</script>
@endsection