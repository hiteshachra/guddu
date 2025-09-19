@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Setting</li>
              <li class="breadcrumb-item active">Coupon</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Coupon Form</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('settings/coupon-list')}}" class="btn btn-sm btn-warning"><i class="fas fa-plus"></i>&ensp; Coupon List</a></div>
                </div>
              </div>
              @if($single_data)
              <form method="post" action="" id="update-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="coupon_type">Coupon Type</label>
                        <select class="form-control form-control-sm @error('coupon_type') is-invalid @enderror" id="coupon_type" name="coupon_type" style="width: 100%;">
                          <option value="">Select Coupon Type</option>
                          <option value="1" {{'New Joining' == $single_data->type? 'selected':''}}>New Joining</option>
                          <option value="2" {{'First Order' == $single_data->type? 'selected':''}}>First Order</option>
                          <option value="3" {{'Promotional' == $single_data->type? 'selected':''}}>Promotional</option>
                        </select>
                        @error('coupon_type')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Coupon Code</label>
                          <input type="text" id="coupon_code" name="coupon_code" class="form-control form-control-sm @error('coupon_code') is-invalid @enderror" placeholder="Enter Coupon Code." value="{{$single_data->code}}">
                          @error('coupon_code')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Coupon Name</label>
                          <input type="text" id="coupon_name" name="coupon_name" class="form-control form-control-sm @error('coupon_name') is-invalid @enderror" placeholder="Enter Coupon Name." value="{{$single_data->name}}">
                          @error('coupon_name')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="price_type">Price Type</label>
                        <select class="form-control form-control-sm @error('price_type') is-invalid @enderror" id="price_type" name="price_type" style="width: 100%;">
                          <option value="">Select Coupon Tag</option>
                          <option value="1" {{'Fixed Price' == $single_data->price_type? 'selected':''}}>Fixed Price</option>
                          <option value="2" {{'Percentage' == $single_data->price_type? 'selected':''}}>Percentage</option>
                        </select>
                        @error('price_type')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="discount">Discount</label>
                          <input type="number" id="discount" name="discount" class="form-control form-control-sm @error('discount') is-invalid @enderror" placeholder="Enter Discount." value="{{$single_data->price}}">
                          @error('discount')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="min_order_amt">Min Order Amount</label>
                          <input type="number" id="min_order_amt" name="min_order_amt" class="form-control form-control-sm @error('min_order_amt') is-invalid @enderror" placeholder="Enter Min Order Amount." value="{{$single_data->min_order_amt}}">
                          @error('min_order_amt')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Coupon Qty</label>
                          <input type="number" id="coupon_qty" name="coupon_qty" class="form-control form-control-sm @error('coupon_qty') is-invalid @enderror" placeholder="Enter Coupon Qty." value="{{$single_data->qty}}">
                          @error('coupon_qty')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="start_date">Start Date</label>
                          <input type="date" id="start_date" name="start_date" class="form-control form-control-sm @error('start_date') is-invalid @enderror" placeholder="Enter Start Date." value="{{$single_data->start_date}}">
                          @error('start_date')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="end_date">End Date</label>
                          <input type="date" id="end_date" name="end_date" class="form-control form-control-sm @error('end_date') is-invalid @enderror" placeholder="Enter End Date." value="{{$single_data->end_date}}">
                          @error('end_date')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Image <small class="text-danger text-bold"> :- wright: 200px; height:200px;</small></label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input custom-file-input-sm @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="custom-file-label custom-file-label-sm" for="image">Choose Coupon Image </label>
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
                      <label class="control-labels-12">Old Image</label><br>
                      <img src="{{asset('images/coupon/'.$single_data->image)}}" alt="" height="50" width="50">
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-primary bg-gradient" id="form-update">Submit</button>
                  <a href="{{url('settings/coupon-list')}}" class="btn btn-warning bg-gradient">Back</a>
                </div>
              </form>
              @else
              <form method="post" action="" id="submit-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="coupon_type">Coupon Type</label>
                        <select class="form-control form-control-sm @error('coupon_type') is-invalid @enderror" id="coupon_type" name="coupon_type" style="width: 100%;">
                          <option value="">Select Coupon Type</option>
                          <option value="1" {{1 == old('coupon_type')? 'selected':''}}>New Joining</option>
                          <option value="2" {{2 == old('coupon_type')? 'selected':''}}>First Order</option>
                          <option value="3" {{3 == old('coupon_type')? 'selected':''}}>Promotional</option>
                        </select>
                        @error('coupon_type')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Coupon Code</label>
                          <input type="text" id="coupon_code" name="coupon_code" class="form-control form-control-sm @error('coupon_code') is-invalid @enderror" placeholder="Enter Coupon Code." value="{{old('coupon_code')}}">
                          @error('coupon_code')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Coupon Name</label>
                          <input type="text" id="coupon_name" name="coupon_name" class="form-control form-control-sm @error('coupon_name') is-invalid @enderror" placeholder="Enter Coupon Name." value="{{old('coupon_name')}}">
                          @error('coupon_name')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="price_type">Price Type</label>
                        <select class="form-control form-control-sm @error('price_type') is-invalid @enderror" id="price_type" name="price_type" style="width: 100%;">
                          <option value="">Select Coupon Tag</option>
                          <option value="1" {{1 == old('price_type')? 'selected':''}}>Fixed Price</option>
                          <option value="2" {{2 == old('price_type')? 'selected':''}}>Percentage</option>
                        </select>
                        @error('price_type')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="discount">Discount</label>
                          <input type="number" id="discount" name="discount" class="form-control form-control-sm @error('discount') is-invalid @enderror" placeholder="Enter Discount." value="{{old('discount')}}">
                          @error('discount')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="min_order_amt">Min Order Amount</label>
                          <input type="number" id="min_order_amt" name="min_order_amt" class="form-control form-control-sm @error('min_order_amt') is-invalid @enderror" placeholder="Enter Min Order Amount." value="{{old('min_order_amt')}}">
                          @error('min_order_amt')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label">Coupon Qty</label>
                          <input type="number" id="coupon_qty" name="coupon_qty" class="form-control form-control-sm @error('coupon_qty') is-invalid @enderror" placeholder="Enter Coupon Qty." value="{{old('coupon_qty')}}">
                          @error('coupon_qty')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="start_date">Start Date</label>
                          <input type="date" id="start_date" name="start_date" class="form-control form-control-sm @error('start_date') is-invalid @enderror" placeholder="Enter Start Date." value="{{old('start_date')}}">
                          @error('start_date')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label" for="end_date">End Date</label>
                          <input type="date" id="end_date" name="end_date" class="form-control form-control-sm @error('end_date') is-invalid @enderror" placeholder="Enter End Date." value="{{old('end_date')}}">
                          @error('end_date')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Image <small class="text-danger text-bold"> :- wright: 200px; height:200px;</small> </label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input custom-file-input-sm @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="custom-file-label custom-file-label-sm" for="image">Choose Coupon Image </label>
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