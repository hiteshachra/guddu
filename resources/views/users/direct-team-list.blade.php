@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Direct Team List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Direct Team List</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Direct Team</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"></div>
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
                    <th>Role</th>
                    <th>Referral</th>
                    <th>Join Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone_number}}</td>
                    <td><span class="badge badge-rounded {{$value->roles->role_name == 'User'?'badge-danger':'badge-success'}}">{{$value->roles->role_name}}</span></td>
                    <td>{{$value->parent->name??''}} [{{$value->parent->reg_code??''}}]</td>
                    <td>{{$value->created_at}}</td>
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