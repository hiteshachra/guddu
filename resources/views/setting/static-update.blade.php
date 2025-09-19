@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Content</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Setting</li>
              <li class="breadcrumb-item active">Content</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
  


            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update {{ $content->sc_title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('settings/static-content/update',$content->id)}}" method="post">
                        @csrf
                        <div class="mb-6">
                            <!-- <label class="form-label" for="static-content" >Content</label> -->
                          <textarea id="content" name="content" class="form-control form-control-sm @error('content') is-invalid @enderror" placeholder="Enter Answer.">{!!$content->sc_desc!!}</textarea>
                          @error('content')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
   <script type="text/javascript">
    $(function () {
      $('#content').summernote();
    })
  </script>
@endsection