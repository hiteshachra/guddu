<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between">
            <h5 class="card-title mb-0">Loans</h5>

            <a href="<?php echo e(route('add_loan')); ?>" class="btn add-new btn-primary"><span><span
                        class="d-flex align-items-center gap-2"><i class="icon-base ti tabler-plus icon-xs"></i> <span
                            class="d-none d-sm-inline-block">Add Loan</span></span></span></a>
        </div>

        <div class="card-datatable">
            <table class="table" id="data-table">
                <thead class="border-top">
                    <tr>
                        <th>S.No</th>
                        <th>User</th>
                        <th>Assigned To</th>
                        <th>Amount</th>
                        <th>Commission Amount</th>
                        <th>Transaction No.</th>
                        <th>Transaction Image</th>
                        <th>Added By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>

        <!-- assign Modal -->
        <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="assignModalLabel">Assign Modal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="assignModalBody">
                        <form action="<?php echo e(route('assign_employee_loan')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="loan_id" id="loan_id">
                            <div class="mb-6">
                                <label for="employee" class="form-label">Employee</label>
                                <select class="form-select" id="employee" name="employee" aria-label="Select Employee"
                                    required>
                                    <option value="">Select Employee</option>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <!-- status Modal -->
        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusLabel">Change Loan Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="statusBody">
                        <form action="<?php echo e(route('change_loan_status')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="loan_id_status" id="loan_id_status">
                            <div class="mb-6">
                                <label for="status_modal" class="form-label">Status</label>
                                <select class="form-select" id="status_modal" name="status_modal" aria-label="Select Status"
                                    required onchange="showTrans(this.value)">
                                    <option value="">Select Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Sanctioned">Sanctioned</option>
                                </select>
                            </div>


                                <div class="mb-6 show_on_sanctioned" style="display:none">
                                    <label class="form-label" for="trans_number">Transaction Number</label>
                                    <div class="input-group input-group-merge">
                                        <span id="trans_number2" class="input-group-text"><i
                                                class="icon-base ti tabler-currency-rupee"></i></span>
                                        <input type="text" class="form-control" id="trans_number" name="trans_number"
                                            placeholder="Transaction Number" aria-label="Transaction Number"
                                            value="<?php echo e(old('trans_number')); ?>" aria-describedby="trans_number2" />
                                    </div>
                                    <?php $__errorArgs = ['trans_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-6 show_on_sanctioned" style="display:none">
                                    <label for="image" class="form-label">Transaction Image</label>
                                    <input class="form-control" type="file" id="image" name="image"
                                        accept="image/*" />
                                </div>
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



                            <button type="submit" class="btn btn-sm btn-secondary">Update</button>
                        </form>

                    </div>
                </div>
            </div>

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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {

            const datatable = document.querySelector('#data-table');
            let table;

            if (datatable) {

                table = new DataTable(datatable, {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '<?php echo e(route('loans')); ?>',
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'user.name',
                            name: 'user.name'
                        },
                        {
                            data: 'employee.name',
                            name: 'employee.name'
                        },
                        {
                            data: 'amount',
                            name: 'amount'
                        },
                        {
                            data: 'commission_amount',
                            name: 'commission_amount'
                        },
                        {
                            data: 'trans_number',
                            name: 'trans_number'
                        },
                        {
                            data: 'trans_image',
                            name: 'trans_image'
                        },
                        {
                            data: 'added_by.name',
                            name: 'added_by.name'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    layout: {
                        topStart: {
                            rowClass: 'row m-3 my-0 justify-content-between',
                            features: [{
                                pageLength: {
                                    menu: [10, 25, 50, 100],
                                    text: '_MENU_'
                                }
                            }]
                        },
                        topEnd: {
                            features: [{
                                    search: {
                                        placeholder: 'Search here',
                                        text: '_INPUT_'
                                    }
                                },
                                {
                                    buttons: [{
                                        extend: 'collection',
                                        className: 'btn btn-label-secondary dropdown-toggle',
                                        text: '<span class="d-flex align-items-center gap-2"><i class="icon-base ti tabler-upload icon-xs"></i> <span class="d-none d-sm-inline-block">Export</span></span>',
                                        buttons: [{
                                                extend: 'print',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-printer me-1"></i>Print</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

                                                },

                                            },
                                            {
                                                extend: 'csv',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-text me-1"></i>Csv</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

                                                }
                                            },
                                            {
                                                extend: 'excel',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-spreadsheet me-1"></i>Excel</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

                                                }
                                            },
                                            {
                                                extend: 'pdf',
                                                text: `<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-description me-1"></i>Pdf</span>`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

                                                }
                                            },
                                            {
                                                extend: 'copy',
                                                text: `<i class="icon-base ti tabler-copy me-1"></i>Copy`,
                                                className: 'dropdown-item',
                                                exportOptions: {
                                                    columns: [0, 1, 2, 5],

                                                }
                                            }
                                        ]
                                    }, ]
                                }
                            ]
                        },
                        bottomStart: {
                            rowClass: 'row mx-3 justify-content-between',
                            features: ['info']
                        },
                        bottomEnd: 'paging'
                    },
                    language: {
                        paginate: {
                            next: '<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
                            previous: '<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',
                            first: '<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',
                            last: '<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'
                        }
                    },

                });


            }

        });


        function showTrans(val){
            if(val == 'Sanctioned'){
                $('.show_on_sanctioned').show();
            }else{
                $('.show_on_sanctioned').hide();
            }
        }

        function assignEmployee(id,assigned_to){
            $('#loan_id').val(id);
            $('#employee').val(assigned_to).trigger('change');
            $('#assignModal').modal('show');
        }

        function statusLoan(id,status) {
            $('#loan_id_status').val(id);
            $('#status_modal').val(status).trigger('change');
            $('#statusModal').modal('show');
        }

        function openModal(type, value) {
            var content = '';

            if (type === 'image') {
                content = `<img src="<?php echo e(asset('loans')); ?>/${value}" alt="Image" class="img-fluid">`;
            }else {
                return;
            }

            $('#dynamicModalBody').html(content);
            $('#dynamicModal').modal('show');
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/loans/view.blade.php ENDPATH**/ ?>