@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Kyc List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">User</li>
              <li class="breadcrumb-item active">User Kyc List</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">User Kyc Detail</h3></div>
                </div>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sn.</th>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Pan_Card</th>
                      <th>Document_Type</th>
                      <th>Document_Number</th>
                      <th>Front_Img</th>
                      <th>Back_Img</th>
                      <th>Remarks</th>
                      <th>Status</th>
                      <th>Updated_At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->user_code}}</td>
                    <td>{{$value->user_name}}</td>
                    <td>{{$value->id_proof_no}}</td>
                    <td>{{$value->address_proof_type}}</td>
                    <td>{{$value->address_proof_no}}</td>
                    <td>
                         <img src="{{ asset('images/documents/' . $value->address_proof_front_img) }}"
                           height="25"
                           style="cursor: pointer;"
                           onclick="showImageModal('{{ asset('images/documents/' . $value->address_proof_front_img) }}')">
                    </td>
                    <td>
                         <img src="{{ asset('images/documents/' . $value->address_proof_back_img) }}"
                           height="25"
                           style="cursor: pointer;"
                           onclick="showImageModal('{{ asset('images/documents/' . $value->address_proof_back_img) }}')">
                    </td>
                    <td>{{$value->remarks}}</td>
                    <td>{{$value->status}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td>
                      @if($value->status != 'Verified' && $value->status != 'Reject')
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger btn-xs" onclick="openModal('{{ $value->id }}', '{{ $value->user_name }}', 'verify')">
                             Verify
                          </button>
                          <button type="button" class="btn btn-danger btn-xs" onclick="openModal('{{ $value->id }}', '{{ $value->user_name }}', 'reject')">
                             Reject
                          </button>
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
    <form action="{{ url('users/kyc-status-change') }}" method="POST">
      @csrf
      <input type="hidden" name="id" id="kycId">
      <input type="hidden" name="status" id="kycStatus">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">KYC <span id="kyc-statuss"></span> </h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
        </div>

        <div class="modal-body">
          <p>Enter remark for <span id="kyc-status"></span> <strong id="rejectUserName"></strong>:</p>
          <input name="remarks" class="form-control" required />
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
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
function openModal(userId, userName, status) {
  $('#kycId').val(userId);
  $('#kycStatus').val(status);
  $('#kyc-statuss').text(status);
  $('#kyc-status').text(status=='verify'?'verify':'rejecting');
  $('#rejectUserName').text(userName);
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