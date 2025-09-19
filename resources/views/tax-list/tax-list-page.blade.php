@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tax</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Product Master</li>
              <li class="breadcrumb-item active">Tax List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tax Form</h3>
              </div>
              @if($single_data)
              <form method="post" action="" id="update-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                      <label class="control-label">Tax Name</label>
                      <input type="text" id="tax_name" name="tax_name" class="form-control form-control-sm @error('tax_name') is-invalid @enderror" placeholder="Enter Tax Name." value="{{$single_data->name}}">
                      @error('tax_name')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label class="control-label">Tax</label>
                      <input type="number" id="tax" name="tax" class="form-control form-control-sm @error('tax') is-invalid @enderror" placeholder="Enter Tax." value="{{$single_data->value}}">
                      @error('tax')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                 <div class="form-group">
                      <label for="status">Status</label>
                      <select class="form-control form-control-sm @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="">Select Status</option>
                        <option value="1" {{$single_data->status == 'ACTIVE'? 'selected':''}}>Active</option>
                        <option value="2" {{$single_data->status == 'INACTIVE'? 'selected':''}}>Inactive</option>
                      </select>
                      @error('status')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary bg-gradient" id="form-update">Submit</button>
                </div>
              </form>
              @else
              <form method="post" action="" id="submit-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                      <label class="control-label">Tax Name</label>
                      <input type="text" id="tax_name" name="tax_name" class="form-control form-control-sm @error('tax_name') is-invalid @enderror" placeholder="Enter Tax Name." value="{{old('tax_name')}}">
                      @error('tax_name')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label class="control-label">Tax</label>
                      <input type="text" id="tax" name="tax" class="form-control form-control-sm @error('tax') is-invalid @enderror" placeholder="Enter Tax." value="{{old('tax')}}">
                      @error('tax')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                 <div class="form-group">
                      <label for="status">Status</label>
                      <select class="form-control form-control-sm @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="">Select Status</option>
                        <option value="1" {{old('status') == 1? 'selected':''}}>Active</option>
                        <option value="2" {{old('status') == 2? 'selected':''}}>Inactive</option>
                      </select>
                      @error('status')
                          <span  class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary bg-gradient" id="form-submit">Submit</button>
                </div>
              </form>
              @endif
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tax List</h3>
              </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sn.</th>
                    <th>Tax Name</th>
                    <th>Tax</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->value}}</td>
                    <td>
                        <div class="btn-group">
                          <a class="btn btn-success bg-gradient btn-xs" href="{{url('tax-list/'.$value->id)}}">EDIT</a>
                          <a class="btn {{$value->status =='ACTIVE'? 'btn-success':'btn-danger'}} bg-gradient btn-xs" href="{{url('tax-list-status-change/'.$value->id)}}">{{$value->status}}</a>
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