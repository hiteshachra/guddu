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
          <h1>Pools</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
            <li class="breadcrumb-item">Wallet</li>
            <li class="breadcrumb-item active">Pools</li>
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
                <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Pools</h3></div>
              </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn.</th>
                  <th>Name</th>
                  <th>Distribute Type</th>
                  <th>Percentage / Amount</th>
                  <th>Percentage Level</th>
                  <th>For</th>
                  <th>Play Users Count</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pools as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->distribution_type}}</td>
                  <td>{{$value->amount}}</td>
                  <td>{{$value->win_user_count}}</td>
                  <td><span class="badge badge-rounded {{$value->for == 'User'?'badge-danger':'badge-success'}}">{{$value->for}}</span></td>
                  <td>{{$value->requests->count()}}</td>
                  <td>{{$value->start_time}}</td>
                  <td>{{$value->end_time}}</td>
                  <td>
                    @php
                      $startTime = \Carbon\Carbon::parse($value->start_time);
                      $now = \Carbon\Carbon::now();
                      $signedDiff = $now->diffInSeconds($startTime, false);
                      $endTime = \Carbon\Carbon::parse($value->end_time);
                      $signedDiffEnd = $now->diffInSeconds($endTime, false);
                    @endphp
                    @if($signedDiff <= 0 && $signedDiffEnd >= 0)
                      <span class="live-indicator"></span>Live
                    @elseif($signedDiff <= 0 && $signedDiffEnd <= 0)
                      Closed
                    @else
                      {{$value->status}}
                    @endif
                  </td>
                  <td>
                      @if($signedDiffEnd <= 0)
                      @else
                      <div class="btn-group">
                        <a class="btn btn-success bg-gradient btn-xs" href="{{ url('/pools/'.$value->id.'/edit') }}">EDIT</a>
                        <a class="btn btn-success bg-gradient btn-xs" href="{{ url('/pools/chnage-status',$value->id) }}">Delete</a>
                      </div>
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