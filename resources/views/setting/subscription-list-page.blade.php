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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Subscription List</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('settings/subscription')}}" class="btn btn-sm btn-warning"><i class="fas fa-plus"></i>&ensp; Add Subscription</a></div>
                </div>
              </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sn.</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Tag</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Plan Active Days</th>
                    <th>Plan Active Daily Amount</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->subject}}</td>
                    <td>{{$value->tag}}</td>
                    <td>{{$value->image}}</td>
                    <td>{{$value->type}}</td>
                    <td>{{$value->plan_days}}</td>
                    <td>{{$value->plan_daily_amount}}</td>
                    <td>{{$value->description}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success bg-gradient btn-xs" href="{{url('settings/subscription/'.$value->id)}}">EDIT</a>
                        <a class="btn {{$value->status =='Active'? 'btn-success':'btn-danger'}} bg-gradient btn-xs" href="{{url('settings/subscription-status-change/'.$value->id)}}">{{$value->status}}</a>
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