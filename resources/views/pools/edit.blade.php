@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Pool</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Edit Pool</li>
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
                  <div class="col-sm-12 col-md-6 mt-1"><h3 class="card-title">Pool Information</h3></div>
                  <div class="col-sm-12 col-md-6 text-right"><a href="{{url('pools')}}" class="btn btn-sm btn-warning"><i class="fas fa-tags"></i> &ensp; Pool List</a></div>
                </div>
              </div>
              <form method="post" action="{{ url('pools',$pool->id) }}" id="submit-form">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                      <div class="row">
                          <!-- Pool Name -->
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">Pool Name <code>*</code></label>
                                  <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Enter Pool Name" value="{{ old('name', $pool->name) }}">
                                  @error('name')
                                      <span class="error invalid-feedback">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>

                          @if($signedDiff > 0)
                          <!-- For -->
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">For <code>*</code></label>
                                  <select name="for" class="form-control form-control-sm @error('for') is-invalid @enderror">
                                      <option value="">Select For</option>
                                      <option value="User" {{ old('for', $pool->for) == 'User' ? 'selected' : '' }}>User</option>
                                      <option value="Vendor" {{ old('for', $pool->for) == 'Vendor' ? 'selected' : '' }}>Vendor</option>
                                      <option value="Both" {{ old('for', $pool->for) == 'Both' ? 'selected' : '' }}>Both</option>
                                  </select>
                                  @error('for')
                                      <span class="error invalid-feedback">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>
                          <!-- Start Time -->
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">Start Time <code>*</code></label>
                                  <input type="datetime-local" name="start_time" class="form-control form-control-sm @error('start_time') is-invalid @enderror" value="{{ old('start_time', $pool->start_time) }}">
                                  @error('start_time')
                                      <span class="error invalid-feedback">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>

                          <!-- End Time -->
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label class="control-label">End Time <code>*</code></label>
                                  <input type="datetime-local" name="end_time" class="form-control form-control-sm @error('end_time') is-invalid @enderror" value="{{ old('end_time', $pool->end_time) }}">
                                  @error('end_time')
                                      <span class="error invalid-feedback">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>

                          @endif


                        <!-- Min Points -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Win User Count <code>*</code></label>
                                <input type="number" id="winUserCount" name="win_user_count" class="form-control form-control-sm @error('win_user_count') is-invalid @enderror" placeholder="Enter Win User Count" value="{{ old('win_user_count', $pool->win_user_count) }}">
                                @error('win_user_count')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Max Points -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Distribution Type <code>*</code></label>
                                <select name="distribution_type" id="distributionType" class="form-control form-control-sm @error('distribution_type') is-invalid @enderror">
                                    <option value="Percentage" {{ old('distribution_type', $pool->distribution_type) == 'Percentage' ? 'selected' : '' }}>Percentage</option>
                                    <option value="Fix Amount" {{ old('distribution_type', $pool->distribution_type) == 'Fix Amount' ? 'selected' : '' }}>Fix Amount</option>
                                </select>
                                @error('distribution_type')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <!-- Total Distribute Amount -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Total Distribute Amount <code>*</code></label>
                                <input type="number" name="amount" class="form-control form-control-sm @error('amount') is-invalid @enderror" placeholder="Total Distribute Amount" value="{{ old('amount', $pool->amount) }}">
                                @error('amount')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


    
                        @if($signedDiff > 0)
                        <!-- Status -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Status <code>*</code></label>
                                <select name="status" class="form-control form-control-sm @error('status') is-invalid @enderror">
                                    <option value="">Select Status</option>
                                    <option value="Open" {{ old('status', $pool->status) == 'Open' ? 'selected' : '' }}>Open</option>
                                    <option value="Closed" {{ old('status', $pool->status) == 'Closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                                @error('status')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @endif
                      </div> <!-- end row -->
                      <div class="row">
                        <div class="col-12">
                            <h5>Distribution</h5>
                        </div>
                      </div>
                      <div id="distributionFields" class="row">
                        @php
                            $distValues = $pool->commissions ?? [];
                        @endphp
                        @foreach($distValues as $index => $value)
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label amount-label">{{ $pool->distribution_type }} {{ $index + 1 }} <code>*</code></label>
                                    <input type="number" name="amount_or_percentage[]" class="form-control form-control-sm @error('amount_or_percentage.' . $index) is-invalid @enderror" value="{{ $value->distribute }}">
                                    @error('amount_or_percentage.' . $index)<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        @endforeach
                      </div>
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

<script>
$(document).ready(function () {
    let hasOldInputs = {!! json_encode(old('amount_or_percentage')) !!};
    if (!hasOldInputs) {
        $('#winUserCount').on('input', function () {
            let count = parseInt($(this).val());
            const container = $('#distributionFields');
            container.empty();

            let type = $('select[name="distribution_type"]').val();
            let labelText = type === 'Fix Amount' ? 'Amount' : 'Percentage';

            if (count >= 1 && count <= 200) {
                for (let i = 0; i < count; i++) {
                    container.append(`
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label amount-label">${labelText} ${i + 1} <code>*</code></label>
                                <input type="number" name="amount_or_percentage[]" class="form-control form-control-sm" placeholder="Enter ${labelText}">
                            </div>
                        </div>
                    `);
                }
            }
        });
    }

    // Update labels on page load and on change
    updateAmountLabels();
    $('#distributionType').on('change', updateAmountLabels);

    function updateAmountLabels() {
        let type = $('select[name="distribution_type"]').val();
        let labelText = type === 'Fix Amount' ? 'Amount' : 'Percentage';
        $('.amount-label').each(function (index) {
            $(this).text(`${labelText} ${index + 1} *`);
        });
    }
});
</script>
@endsection