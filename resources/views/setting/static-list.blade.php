@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Setting</li>
              <li class="breadcrumb-item active">Banner</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Banner List</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('settings/banners')}}" class="btn btn-sm btn-warning"><i class="fas fa-plus"></i>&ensp; Add Banner</a></div>
                </div>
              </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sn.</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Updated At</th>
                    <th>Action</th>                  
                     </tr>
                  </thead>
                  <tbody>
	                @foreach ($contents as $key => $data)
	                    <tr>
	                        <td>{{ $key + 1 }}</td>
	                        <td>{{ $data->sc_name }}</td>
	                        <td>{{ $data->sc_title }}</td>
	                        <td>{{ $data->updated_at }}</td>
	                        <td>
	                            <div class="d-flex align-items-center">
	                                <a class="btn btn-sm btn-primary" href="{{url('settings/static-content/update', $data->id)}}"><i class="ti ti-eye-edit ti-sm"></i>&nbsp;
	                                    Edit</a>
	                            </div>
	                        </td>
	                    </tr>
	                @endforeach               
                  </tbody>
                </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection