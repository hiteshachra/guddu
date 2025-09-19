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
          <h1>Pool Cashback List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
            <li class="breadcrumb-item">Wallet</li>
            <li class="breadcrumb-item active">Pool Cashback List</li>
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
                <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Pool Cashback List</h3></div>
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
                    <th>Points</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($ledgerData as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->users->name}}</td>
                    <td>{{$value->users->email}}</td>
                    <td>{{$value->users->phone_number}}</td>
                    <td>{{$value->users->roles->role_name}}</td>
                    <td>
                      @if($value->cramount > 0)
                      <span class="text-success">+{{$value->cramount}}</span>
                      @else
                      <span class="text-danger">={{$value->dramount}}</span>
                      @endif
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