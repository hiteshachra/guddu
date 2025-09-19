@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Withdraw Request List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Withdraw</li>
              <li class="breadcrumb-item active">Withdraw Request List</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Withdraw Request List</h3></div>
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
                    <th>Txn.</th>
                    <th>Amount</th>
                    <th>User Remark</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->users->name}}</td>
                    <td>{{$value->users->email}}</td>
                    <td>{{$value->users->phone_number}}</td>
                    <td>{{$value->trans_id}}</td>
                    <td>{{$value->amount}}</td>
                    <td>{{$value->desc}}</td>
                    <td>{{$value->remark}}</td>
                    <td>{{$value->status}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
                      @if($value->status == 'Pending')
                      @php
                        $urlv = url('withdraw/request-update/verify/'.$value->id);
                        $urlr = url('withdraw/request-update/reject/'.$value->id);
                      @endphp
                        <div class="btn-group">
                          <button type="button" class="btn btn-success bg-gradient btn-xs" onclick="openModal('{{ $urlv }}', '{{ $value->users->name }}', 'verify')">Verify</button>
                          <button type="button" class="btn btn-danger bg-gradient btn-xs" onclick="openModal('{{ $urlr }}', '{{ $value->users->name }}', 'reject')">Reject</button>
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
          <h5 class="modal-title">Withdraw Request <span id="kyc-statuss"></span> </h5>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label>UTR/TXN No</label>
            <input name="utr_no" placeholder="Enter UTR/TXN No" class="form-control" />
          </div>
          <div class="form-group">
            <label>Enter remark</label>
            <input name="remarks" placeholder="Enter Remark" class="form-control" />
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" onclick="closeImageModals()" class="btn btn-danger">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content position-relative">
      <div class="modal-body text-center p-0">
        <!-- Close Button on the right side -->
        <span onclick="closeImageModal()" type="button" class="position-absolute top-50 end-0 me-3" style="right: 0; margin-right: -16px; margin-top: -20px; font-size: 30px; color: #b40404;"><i class="fas fa-window-close"></i></span>
        <!-- Image -->
        <img id="modalImage" src="" style="max-width: 100%; max-height: 80vh;">
      </div>

    </div>
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