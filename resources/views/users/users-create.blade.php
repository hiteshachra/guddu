@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Add New User</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">User Information</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('users/user-list')}}" class="btn btn-sm btn-warning"><i class="fas fa-list-ol"></i> &ensp; User List</a></div>
                </div>
              </div>
              <form method="post" action="" id="submit-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">  
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label">Referral Code</label>
                        <input type="text" id="referral_code" name="referral_code" class="form-control form-control-sm @error('referral_code') is-invalid @enderror" placeholder="Enter Referral Code." value="{{old('referral_code', auth()->user()->reg_code)}}">
                        @error('referral_code')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>     
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label"> Name <code>*</code></label>
                        <input type="text" id="name" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Enter Name." value="{{old('name')}}">
                        @error('name')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label">Email <code>*</code></label>
                        <input type="text" id="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Enter Email." value="{{old('email')}}">
                        @error('email')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label" for="phone_number">Phone <code>*</code></label>
                        <input type="number" id="phone_number" name="phone_number" class="form-control form-control-sm @error('phone_number') is-invalid @enderror" placeholder="Enter Phone." value="{{old('phone_number')}}">
                        @error('phone_number')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                       <div class="form-group">
                            <label for="role">Role <code>*</code></label>
                            <select class="form-control select2 @error('role') is-invalid @enderror" name="role" id="role">
                              <option value="">Select Status</option>
                              @if(Auth()->user()->role == 1)
                              <option value="4" {{old('role') == 4? 'selected':''}}>Employee</option>
                              @endif
                              <option value="2" {{old('role') == 2? 'selected':''}}>Vendor</option>
                              <option value="3" {{old('role') == 3? 'selected':''}}>Users</option>
                            </select>
                            @error('role')
                                <span  class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label" for="password">Password <code>*</code></label>
                        <input type="password" id="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Enter Password." value="{{old('password')}}">
                        @error('password')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="control-label" for="password_confirmation">Password Confirmation <code>*</code></label>
                        <input type="text" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror" placeholder="Enter Password Confirmation." value="{{old('password_confirmation')}}">
                        @error('password_confirmation')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>                
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary bg-gradient"><i class="far fa-save"></i> Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection