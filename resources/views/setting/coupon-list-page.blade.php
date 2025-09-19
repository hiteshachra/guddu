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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Coupon List</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('settings/coupon')}}" class="btn btn-sm btn-warning"><i class="fas fa-plus"></i>&ensp; Add Coupon</a></div>
                </div>
              </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sn.</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Coupon type</th>
                    <th>qty</th>
                    <th>Image</th>
                    <th>Price Type</th>
                    <th>Discount</th>
                    <th>Min Order Amount</th>
                    <th>Used Coupon</th>
                    <th>Unused Coupon</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Publish</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->code}}</td>
                    <td>{{$value->type}}</td>
                    <td>{{$value->qty}}</td>
                    <td>{{$value->image}}</td>
                    <td>{{$value->price_type}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->min_order_amt}}</td>
                    <td>{{$value->used}}</td>
                    <td>{{$value->unused}}</td>
                    <td>{{$value->start_date}}</td>
                    <td>{{$value->end_date}}</td>
                    <td><a class="btn {{$value->publish =='Yes'? 'btn-success':'btn-danger'}} bg-gradient btn-xs" href="{{url('settings/coupon-publish-change/'.$value->id)}}">{{$value->publish}}</a></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success bg-gradient btn-xs" href="{{url('settings/coupon/'.$value->id)}}">EDIT</a>
                        <a class="btn {{$value->status =='Active'? 'btn-success':'btn-danger'}} bg-gradient btn-xs" href="{{url('settings/coupon-status-change/'.$value->id)}}">{{$value->status}}</a>
                      </div>
                    </td>
                  </tr>
                  @endforeach                  
                  </tbody>
                </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection