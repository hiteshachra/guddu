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
          <h1>Tariffs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
            <li class="breadcrumb-item">Wallet</li>
            <li class="breadcrumb-item active">Tariffs</li>
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
                <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Tariffs</h3></div>
              </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn.</th>
                  <th>Amount</th>
                  <th>Points</th>
                  <th>Discount %</th>
                  <th>Desc</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tariffs as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->amount}}</td>
                  <td>{{$value->points}}</td>
                  <td>{{$value->percentage}}</td>
                  <td>{{$value->desc}}</td>
                  <td>
                      <div class="btn-group">
                        <a class="btn btn-success bg-gradient btn-xs" href="{{ url('/tariffs/edit',$value->id) }}">EDIT</a>
                        <a class="btn btn-success bg-gradient btn-xs" href="{{ url('/tariffs/delete',$value->id) }}">Delete</a>
                      </div>
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