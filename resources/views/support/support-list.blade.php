@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Support List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
            <li class="breadcrumb-item">Support</li>
            <li class="breadcrumb-item active">Support List</li>
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
                <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Support</h3></div>
              </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn.</th>
                  <th>User Name</th>
                  <th>User Code</th>
                  <th>User Role</th>
                  <th>Request No</th>
                  <th>For</th>
                  <th>Subject</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->user->reg_code}}</td>
                  <td>{{$value->user->roles->role_name}}</td>
                  <td>{{$value->code}}</td>
                  <td>{{$value->for}}</td>
                  <td>{{$value->subject}}</td>
                  <td><span class="badge badge-rounded {{$value->status == 'Open'?'badge-danger':'badge-success'}}">{{$value->status}}</span></td>
                  <td>{{$value->created_at}}</td>
                  <td>
                    @if($value->status == 'Open')
                      @php
                        $url = url('/support/close',$value->code);
                      @endphp
                      <div class="btn-group">
                        <a class="btn btn-success bg-gradient btn-xs" href="{{ url('/support/reply/'.base64_encode($value->code)) }}">Reply</a>
                        <button type="button" class="btn btn-danger bg-gradient btn-xs" onclick="openModal('{{ $url }}', '{{ $value->user->name }}', 'Close')">Close</button>
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
<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="idForm" action="" method="GET">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Support Ticket <span id="kyc-statuss"></span> </h5>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" onclick="closeImageModals()" class="btn btn-danger">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
function openModal(url, userName, status) {
  $('#kyc-statuss').text(status);
  $('#kyc-status').text(status=='verify'?'Verify':'Rejecting');
  $('#rejectUserName').text(userName);
  $('#idForm').attr('action', url); 
  $('#rejectModal').modal('show');
}
function closeImageModals() {
  $('#rejectModal').modal('hide');
}
function showImageModal(imageUrl) {
  // Set image source
  $('#modalImage').attr('src', imageUrl);

  // Show modal using jQuery and Bootstrap
  $('#imageModal').modal('show');
}

function closeImageModal() {
  $('#imageModal').modal('hide');
}
</script>

@endsection