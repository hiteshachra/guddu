@extends('layouts.app')
@section('content')
<style>
.live-indicator {
    display: inline-block;
    width: 10px;
    height: 10px;
    background-color: green;
    border-radius: 50%;
    margin-right: 5px;
    animation: blink 1s infinite;
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.3; }
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pool Request List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
            <li class="breadcrumb-item">Wallet</li>
            <li class="breadcrumb-item active">Pool Request List</li>
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
                <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Pool Request List</h3></div>
              </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn.</th>
                  <th>Pool Name</th>
                  <th>Win User Name</th>
                  <th>Win User Code</th>
                  <th>Win User Role</th>
                  <th>Level</th>
                  <th>User Points</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{ $value->pools?->name }}</td>
                  <td>{{ $value->users?->name }}</td>
                  <td>{{ $value->users?->reg_code }}</td>
                  <td><span class="badge badge-rounded {{$value->users?->roles?->role_name == 'User'?'badge-danger':'badge-success'}}">{{ $value->users?->roles?->role_name }}</span></td>
                  <td>{{ $value->win_level }}</td>
                  <td>{{ $value->user_points }}</td>
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