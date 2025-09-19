@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Tariff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Edit Tariff</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Edit Tariff</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('tariffs/list')}}" class="btn btn-sm btn-warning"><i class="fas fa-coins"></i> &ensp; Tariff List</a></div>
                </div>
              </div>
              <form method="post" action="{{ url('tariffs/update', $tariffData->id) }}" id="submit-form">
                  @csrf
                  <div class="card-body">
                      <div class="row">
      
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">Amount <code>*</code></label>
                                  <input type="number" name="amount" class="form-control form-control-sm @error('amount') is-invalid @enderror" placeholder="Enter Amount" value="{{ old('amount', $tariffData->amount) }}">
                                  @error('amount')
                                      <span class="error invalid-feedback">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>

                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">Points <code>*</code></label>
                                  <input type="number" name="points" class="form-control form-control-sm @error('points') is-invalid @enderror" placeholder="Points" value="{{ old('points', $tariffData->points) }}">
                                  @error('points')
                                      <span class="error invalid-feedback">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>

                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">Percentage <code>*</code></label>
                                  <input type="text" name="percentage" class="form-control form-control-sm @error('percentage') is-invalid @enderror" placeholder="Percentage" value="{{ old('percentage', $tariffData->percentage) }}">
                                  @error('percentage')
                                      <span class="error invalid-feedback">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>

                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">Description </label>
                                  <input type="text" name="description" class="form-control form-control-sm @error('description') is-invalid @enderror" placeholder="Enter Description" value="{{ old('description', $tariffData->description) }}">
                                  @error('description')
                                      <span class="error invalid-feedback">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>

                 
                      </div> <!-- end row -->
                  </div> <!-- end card-body -->

                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary bg-gradient"><i class="far fa-save"></i> Submit</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection