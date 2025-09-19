@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Products</li>
              <li class="breadcrumb-item active">Product</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Product Information</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('products/product-list')}}" class="btn btn-sm btn-warning"><i class="fas fa-list-ol"></i> &ensp; Product List</a></div>
                </div>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sn.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Type</th>
                    <th>Address Mobile Number</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Zip</th>
 <!--                    <th>Default</th>
                    <th>Lon</th>
                    <th>Lat</th>
                    <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->user_name}}</td>
                    <td>{{$value->user_email}}</td>
                    <td>{{$value->user_phone_number}}</td>
                    <td>{{$value->type}}</td>
                    <td>{{$value->mobile_number}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->city_name}}</td>
                    <td>{{$value->state_name}}</td>
                    <td>{{$value->country_name}}</td>
                    <td>{{$value->zip}}</td>
         <!--            <td>{{$value->default}}</td>
                    <td>{{$value->longitude}}</td>
                    <td>{{$value->latitude}}</td>
                    <td>
                        <div class="btn-group">
                          <a class="btn {{$value->status =='Active'? 'btn-success':'btn-danger'}} bg-gradient btn-xs" href="{{url('users/address-status-change/'.$value->id)}}">{{$value->status}}</a>
                        </div>
                    </td> -->
                  </tr>
                  @endforeach                  
                  </tbody>
                </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection