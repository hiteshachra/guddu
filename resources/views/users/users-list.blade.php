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
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">user</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Users</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('users/user')}}" class="btn btn-sm btn-warning"><i class="fas fa-list-ol"></i> &ensp; Add New User</a></div>
                </div>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sn.</th>
                    <th>Reg Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Is Login</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->reg_code}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone_number}}</td>
                    <td><span class="badge badge-rounded {{$value->roles->role_name == 'User'?'badge-danger':'badge-success'}}">{{$value->roles->role_name}}</span></td>
                    <td>{{$value->image}}</td>
                    <td>{{$value->id}}</td>
                    <td>
                        <!-- @ if($value->id != 1) -->
                        <div class="btn-group">
                          <a class="btn btn-success bg-gradient btn-xs" href="{{url('users/user/'.$value->id)}}">EDIT</a>
                          <a class="btn {{$value->status =='Active'? 'btn-success':'btn-danger'}} bg-gradient btn-xs" href="{{url('users/user-status-change/'.$value->id)}}">{{$value->status}}</a>
                        </div>
                        <!-- @ endif -->
                    </td>
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