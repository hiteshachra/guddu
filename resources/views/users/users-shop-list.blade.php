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
                      <th>Shop Name</th>
                      <th>Shop Address</th>
                      <th>logo</th>
                      <th>Status</th>
                      <th>Updated_At</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->user_code}}</td>
                    <td>{{$value->user_name}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->address}}</td>
                    <td>  
                       <img src="{{ asset('images/shop_doc/' . $value->logo) }}"
                           height="25"
                           style="cursor: pointer;"
                           onclick="showImageModal('{{ asset('images/shop_doc/' . $value->logo) }}')">
                    </td>
                    <td>{{$value->status}}</td>
                    <td>{{$value->updated_at}}</td>
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