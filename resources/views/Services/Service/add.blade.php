@extends('layouts.app')
@section('content')
    <!-- Basic Layout -->
    <div class="row mb-6 gy-6">

        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Service Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('add_service') }}" method="POST" id="service-form" enctype="multipart/form-data">

                        @csrf
                        <div class="row">

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="category_id" class="form-label">Category<span
                                            class="text-danger">*</span></label>
                                    <select class="selectpicker w-100" data-style="btn-default" id="category_id"
                                        name="category_id" aria-label="Select Category" required onchange="getServiceSubCat(this.value)">
                                        <option value="">Select Category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                                {{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label for="sub_cat_id" class="form-label">Sub Category<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select select2" id="sub_cat_id" name="sub_cat_id" required
                                        onchange="getCities(this.value)" aria-label="Select Sub Category">
                                        <option value="">Select Sub Category</option>

                                    </select>
                                    @error('sub_cat_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="name2" class="input-group-text"><i
                                                class="icon-base ti tabler-label"></i></span>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" aria-label="Name" required value="{{ old('name') }}"
                                            aria-describedby="name2" />
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="price">Price <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="price2" class="input-group-text"><i
                                                class="icon-base ti tabler-label"></i></span>
                                        <input type="number" class="form-control" id="price" name="price"
                                            placeholder="Price" aria-label="Price" required value="{{ old('price') }}"
                                            aria-describedby="price2" />
                                    </div>
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="mb-6">
                                    <label class="form-label" for="discount">Discount % <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span id="discount2" class="input-group-text"><i
                                                class="icon-base ti tabler-label"></i></span>
                                        <input type="number" class="form-control" id="discount" name="discount"
                                            placeholder="discount" aria-label="discount" required
                                            value="{{ old('discount') }}" aria-describedby="discount2" />
                                    </div>
                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <textarea name="description" id="description" style="display: none;"></textarea>
                            <div class="mb-6">
                                <label class="form-label" for="description">Description<span
                                        class="text-danger">*</span></label>
                                <div id="description_div"> {!! old('description') !!} </div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Gallery</h5>
                            </div>

                            <div class="col-sm-2">
                                <div class="mb-6">
                                    <label for="image1" class="form-label">Image 1<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="image1" name="image1"
                                        accept="image/*" required />
                                </div>
                                @error('image1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-2">
                                <div class="mb-6">
                                    <label for="image2" class="form-label">Image 2</label>
                                    <input class="form-control" type="file" id="image2" name="image2"
                                        accept="image/*" />
                                </div>
                                @error('image2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-2">
                                <div class="mb-6">
                                    <label for="image3" class="form-label">Image 3</label>
                                    <input class="form-control" type="file" id="image3" name="image3"
                                        accept="image/*" />
                                </div>
                                @error('image3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-2">
                                <div class="mb-6">
                                    <label for="image4" class="form-label">Image 4</label>
                                    <input class="form-control" type="file" id="image4" name="image4"
                                        accept="image/*" />
                                </div>
                                @error('image4')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-2">
                                <div class="mb-6">
                                    <label for="image5" class="form-label">Image 5</label>
                                    <input class="form-control" type="file" id="image5" name="image5"
                                        accept="image/*" />
                                </div>
                                @error('image5')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-2">
                                <div class="mb-6">
                                    <label for="video" class="form-label">Video<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="video" name="video"
                                        accept="video/*" required />
                                </div>
                                @error('video')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Add On Services</h5>
                                <button type="button" class="btn add-button btn-primary" id="add-service"><span><span
                                            class="d-flex align-items-center gap-2"><i
                                                class="icon-base ti tabler-plus icon-xs"></i> <span
                                                class="d-none d-sm-inline-block">Add </span></span></span></button>
                            </div>

                            <div id="services-container">
                                <div class="row services-div">
                                    <div class="col-sm-2">
                                        <div class="mb-6">
                                            <label for="service_image" class="form-label">Service Image</label>
                                            <input class="form-control" type="file" name="service_image[]"
                                                accept="image/*" />
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="mb-6">
                                            <label class="form-label" for="service_name">Service Name </label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="text" class="form-control" name="service_name[]"
                                                    placeholder="Service Name" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="mb-6">
                                            <label class="form-label" for="amount">Amount</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="number" class="form-control" name="amount[]"
                                                    placeholder="Amount" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="mb-6">
                                            <label class="form-label" for="service_description">Description</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="text" class="form-control" name="service_description[]"
                                                    placeholder="Service Description" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1 d-flex align-items-center">
                                        <button type="button" class="btn btn-danger remove-service">Remove</button>
                                    </div>
                                </div>
                            </div>


                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Inclusions</h5>
                                <button type="button" class="btn add-button btn-primary" id="add-inclusion"><span><span
                                            class="d-flex align-items-center gap-2"><i
                                                class="icon-base ti tabler-plus icon-xs"></i> <span
                                                class="d-none d-sm-inline-block">Add </span></span></span></button>
                            </div>

                            <div id="inclusion-container">
                                <div class="row inclusion-div">

                                    <div class="col-sm-6">
                                        <div class="mb-6">
                                            <label class="form-label" for="inclusion_name"> Name</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="text" class="form-control" name="inclusion_name[]"
                                                    placeholder="Inclusion Name" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-1 d-flex align-items-center">
                                        <button type="button" class="btn btn-danger remove-inclusion">Remove</button>
                                    </div>
                                </div>
                            </div>



                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">FAQ's</h5>
                                <button type="button" class="btn add-button btn-primary" id="add-faq"><span><span
                                            class="d-flex align-items-center gap-2"><i
                                                class="icon-base ti tabler-plus icon-xs"></i> <span
                                                class="d-none d-sm-inline-block">Add </span></span></span></button>
                            </div>

                            <div id="faq-container">
                                <div class="row faq-div">

                                    <div class="col-sm-5">
                                        <div class="mb-6">
                                            <label class="form-label" for="faq_ques"> Question</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="text" class="form-control" name="faq_ques[]"
                                                    placeholder="Question" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="mb-6">
                                            <label class="form-label" for="faq_ans"> Answer</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="text" class="form-control" name="faq_ans[]"
                                                    placeholder="Answer" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-2 d-flex align-items-center">
                                        <button type="button" class="btn btn-danger remove-faq">Remove</button>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            // Add new row
            $("#add-service").click(function() {
                let newRow = `
        <div class="row services-div mt-2">
            <div class="col-sm-2">
                <div class="mb-6">
                    <label class="form-label">Service Image</label>
                    <input class="form-control" type="file" name="service_image[]" accept="image/*" required />
                </div>
            </div>

            <div class="col-sm-2">
                <div class="mb-6">
                    <label class="form-label">Service Name <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base ti tabler-label"></i></span>
                        <input type="text" class="form-control" name="service_name[]" placeholder="Service Name" required />
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="mb-6">
                    <label class="form-label">Amount <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base ti tabler-label"></i></span>
                        <input type="number" class="form-control" name="amount[]" placeholder="Amount" required />
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="mb-6">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base ti tabler-label"></i></span>
                        <input type="text" class="form-control" name="service_description[]" placeholder="Service Description" required />
                    </div>
                </div>
            </div>

            <div class="col-sm-2 d-flex align-items-center">
                <button type="button" class="btn btn-danger remove-service">Remove</button>
            </div>
        </div>
        `;
                $("#services-container").append(newRow);
            });

            // Remove row service
            $(document).on("click", ".remove-service", function() {
                $(this).closest(".services-div").remove();
            });



            $("#add-inclusion").click(function() {
                let newRow = `
        <div class="row inclusion-div mt-2">
            <div class="col-sm-6">
                                        <div class="mb-6">
                                            <label class="form-label" for="inclusion_name"> Name <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="text" class="form-control" name="inclusion_name[]"
                                                    placeholder="Inclusion Name" />
                                            </div>
                                        </div>
                                    </div>



            <div class="col-sm-2 d-flex align-items-center">
                <button type="button" class="btn btn-danger remove-inclusion">Remove</button>
            </div>
        </div>
        `;
                $("#inclusion-container").append(newRow);
            });


            // Remove row inclusion
            $(document).on("click", ".remove-inclusion", function() {
                $(this).closest(".inclusion-div").remove();
            });




            $("#add-faq").click(function() {
                let newRow = `
        <div class="row faq-div mt-2">

            <div class="col-sm-5">
                                        <div class="mb-6">
                                            <label class="form-label" for="faq_ques"> Question</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="text" class="form-control" name="faq_ques[]"
                                                    placeholder="Question" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="mb-6">
                                            <label class="form-label" for="faq_ans"> Answer</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        class="icon-base ti tabler-label"></i></span>
                                                <input type="text" class="form-control" name="faq_ans[]"
                                                    placeholder="Answer" />
                                            </div>
                                        </div>
                                    </div>

            <div class="col-sm-2 d-flex align-items-center">
                <button type="button" class="btn btn-danger remove-faq">Remove</button>
            </div>
        </div>
        `;
                $("#faq-container").append(newRow);
            });


            // Remove row faq
            $(document).on("click", ".remove-faq", function() {
                $(this).closest(".faq-div").remove();
            });
        });
    </script>

    <script>
        // reusable function to initialize Quill editors
        function initQuill(selector, placeholder) {
            return new Quill(selector, {
                bounds: selector,
                placeholder: placeholder,
                modules: {
                    syntax: true,
                    toolbar: fullToolbar
                },
                theme: 'snow'
            });
        }

        // initialize editors
        var description = initQuill('#description_div', 'Type Service Description...');


         $('#service-form').on('submit', function() {
                $('#description').val(description.root.innerHTML);
            });
    </script>


@endpush
