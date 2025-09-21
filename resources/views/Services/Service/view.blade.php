@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between">
            <h5 class="card-title mb-0">Services</h5>

            <a href="{{route('add_service')}}"  class="btn add-button btn-primary"><span><span
                        class="d-flex align-items-center gap-2"><i class="icon-base ti tabler-plus icon-xs"></i> <span
                            class="d-none d-sm-inline-block">Add Service</span></span></span></a>
        </div>

        <div class="card-datatable">
            <table class="table" id="data-table">
                <thead class="border-top">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Price</th>
                        <th>Discount %</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="dynamicModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicModalLabel">Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dynamicModalBody">
                    <!-- Content will be inserted here -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            const Columns = [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'category.name', name: 'category.name' },
                { data: 'sub_category.name', name: 'sub_categoryname' },
                { data: 'price', name: 'price' },
                { data: 'discount', name: 'discount' },

                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ];

            const table1 = initializeDataTable("#data-table", "{{ route('services_list') }}", Columns, function (d) {
                d.name = $('#search-name').val();
                d.status = $('#status').val();
            });

            $('#search-name, #status').on('change keyup', function () {
                table1.draw();
            });
        });

        function deleteService(id) {
            Swal.fire({
                title: 'Are you sure to Delete Service?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('status_service', ':id') }}".replace(':id', id);

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            Swal.fire('Deleted!', 'Service Deleted.', 'success').then(() => {
                                location.reload(); // or remove row from table dynamically
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error', 'Failed to delete Service.', 'error');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        }


        function openModal(type, value) {
            var content = '';

            if (type === 'image') {
                content = `<img src="{{ asset('category_images') }}/${value}" alt="Image" class="img-fluid" style="width: 100%;">`;
            } else if (type === 'description') {
                content = `<p>${value}</p>`;
            } else {
                return;
            }

            $('#dynamicModalBody').html(content);
            $('#dynamicModal').modal('show');
        }

    </script>
@endpush
