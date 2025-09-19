@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Available Balance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Wallet</li>
              <li class="breadcrumb-item active">Available Balance</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Available Balance</h3></div>
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
                    <th>Main Balance</th>
                    <th>Points</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($walletData as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->users->name}}</td>
                    <td>{{$value->users->email}}</td>
                    <td>{{$value->users->phone_number}}</td>
                    <td><span class="badge badge-rounded {{$value->users->roles->role_name == 'User'?'badge-danger':'badge-success'}}">{{$value->users->roles->role_name}}</span></td>
                    <td>{{$value->main_balance}}</td>
                    <td>{{$value->dmt_balance}}</td>
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