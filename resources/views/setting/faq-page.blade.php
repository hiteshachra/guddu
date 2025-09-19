@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>FAQ's</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Setting</li>
              <li class="breadcrumb-item active">FAQ's</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Faq Form</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('settings/faq-list')}}" class="btn btn-sm btn-warning"><i class="fas fa-plus"></i>&ensp; Faq List</a></div>
                </div>
              </div>
              @if($single_data)
              <form method="post" action="" id="update-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">
                   <div class="col-md-12">
                      <div class="form-group">
                          <label class="control-label">Question</label>
                          <input type="text" id="question" name="question" class="form-control form-control-sm @error('question') is-invalid @enderror" placeholder="Enter Question." value="{{$single_data->question}}">
                          @error('question')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                       <div class="form-group">
                          <label class="control-labels-12">Answer <code>*</code></label>
                          <textarea id="answer" name="answer" class="form-control form-control-sm @error('answer') is-invalid @enderror" placeholder="Enter Answer.">{{$single_data->answer}}</textarea>
                          @error('answer')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                     <div class="form-group">
                          <label for="status">Status</label>
                          <select class="form-control form-control-sm @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="1" {{$single_data->status == 'Active'? 'selected':''}}>Active</option>
                            <option value="2" {{$single_data->status == 'Inactive'? 'selected':''}}>Inactive</option>
                          </select>
                          @error('status')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="category">Category</label>
                          <select class="form-control form-control-sm @error('category') is-invalid @enderror" name="category" id="category">
                            <option value="">Select Category</option>
                            <option value="1" {{$single_data->category == 'Faq'? 'selected':''}}>Faq</option>
                            <option value="2" {{$single_data->category == 'Help & Support'? 'selected':''}}>Help & Support</option>
                            <option value="3" {{$single_data->category == 'How Do I Order'? 'selected':''}}>How Do I Order</option>
                          </select>
                          @error('category')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-primary bg-gradient" id="form-update">Submit</button>
                  <a href="{{url('settings/faq-list')}}" class="btn btn-warning bg-gradient">Back</a>
                </div>
              </form>
              @else
              <form method="post" action="" id="submit-form" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label class="control-label">Question</label>
                          <input type="text" id="question" name="question" class="form-control form-control-sm @error('question') is-invalid @enderror" placeholder="Enter Question." value="{{old('question')}}">
                          @error('question')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                       <div class="form-group">
                          <label class="control-labels-12">Answer <code>*</code></label>
                          <textarea id="answer" name="answer" class="form-control form-control-sm @error('answer') is-invalid @enderror" placeholder="Enter Answer.">{{old('answer')}}</textarea>
                          @error('answer')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="category">Category</label>
                          <select class="form-control form-control-sm @error('category') is-invalid @enderror" name="category" id="category">
                            <option value="">Select Category</option>
                            <option value="1" {{old('category') == 1? 'selected':''}}>Faq</option>
                            <option value="2" {{old('category') == 2? 'selected':''}}>Help & Support</option>
                            <option value="3" {{old('category') == 3? 'selected':''}}>How Do I Order</option>
                          </select>
                          @error('category')
                              <span  class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="button" class="btn btn-primary bg-gradient" id="form-submit">Submit</button>
                </div>
              </form>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    $(function () {
      $('#answer').summernote();
    })
  </script>
@endsection