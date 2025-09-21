<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Services;
use App\Models\ServiceSubCategory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ServiceController extends Controller
{


    public function categoriesList(Request $request)
    {
        if ($request->ajax()) {
            $query = ServiceCategory::query();

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Active') {
                        return '<span class="badge bg-success">Active</span>';
                    } elseif ($row->status == 'Inactive') {
                        return '<span class="badge bg-danger">Inactive</span>';
                    } else {
                        return '<span class="badge bg-secondary">' . $row->status . '</span>';
                    }
                })
                ->addColumn('image', function ($row) {
                    return '<img src="' . asset("category_images/" . $row->image) . '" alt="Image" class="img-fluid rounded-1" style="width: 30px;" onclick="openImageModal(\'' . asset("category_images/" . $row->image) . '\')">';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="icon-base ti tabler-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="' . route('edit_category', [$row->id]) . '"><i class="icon-base ti tabler-pencil me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);" onclick="deleteCategory(' . $row->id . ')"
                                ><i class="icon-base ti tabler-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>';
                })
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }

        return view('Services.Categories.view');
    }

    public function addCategory(Request $request)
    {

        if ($request->method() == 'POST') {

            $request->validate([
                'name' => 'required|string|max:255|unique:service_categories,name',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ], [
                'name.required' => 'The category name is required.',
                'name.string'   => 'The category name must be a valid text.',
                'name.max'      => 'The category name may not be greater than 255 characters.',
                'name.unique'   => 'This category name already exists. Please choose another one.',

                'image.required' => 'An image is required for the category.',
                'image.image'    => 'The file must be a valid image.',
                'image.mimes'    => 'Only JPEG, PNG, and JPG formats are allowed.',
                'image.max'      => 'The image size must not exceed 2MB.',
            ]);


            $data = [
                'name' => $request->name
            ];

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $cat_image = time() . '_' . $image->getClientOriginalName();
                $data['image'] = $cat_image;
                $image->move(public_path('category_images'), $cat_image);
            }

            $insert = ServiceCategory::insert($data);


            return to_route('category_list')->with(['status' => 'success', 'message' => 'Category Added Successfully']);
        }
        return view('Services.Categories.add');
    }

    public function editCategory($id, Request $request)
    {

        $category = ServiceCategory::find($id);

        if ($request->method() == 'POST') {

            $request->validate([
                'name' => 'required|string|max:255|unique:service_categories,name',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ], [
                'name.required' => 'The category name is required.',
                'name.string'   => 'The category name must be a valid text.',
                'name.max'      => 'The category name may not be greater than 255 characters.',
                'name.unique'   => 'This category name already exists. Please choose another one.',

                'image.required' => 'An image is required for the category.',
                'image.image'    => 'The file must be a valid image.',
                'image.mimes'    => 'Only JPEG, PNG, and JPG formats are allowed.',
                'image.max'      => 'The image size must not exceed 2MB.',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $cat_image = time() . '_' . $image->getClientOriginalName();
                $category->image = $cat_image;
                $image->move(public_path('category_images'), $cat_image);
            }

            $category->name = $request->name;
            $category->save();

            return to_route('category_list')->with(['status' => 'success', 'message' => 'Category Updated Successfully']);
        }

        return view('Services.Categories.edit', compact('category'));
    }

    public function statusCategory($id)
    {
        $category = ServiceCategory::find($id);
        $category->status = $category->status === 'Active' ? 'Inactive' : 'Active';
        $category->save();
    }



    public function subCategoriesList(Request $request)
    {
        if ($request->ajax()) {
            $query = ServiceSubCategory::with(['category']);

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Active') {
                        return '<span class="badge bg-success">Active</span>';
                    } elseif ($row->status == 'Inactive') {
                        return '<span class="badge bg-danger">Inactive</span>';
                    } else {
                        return '<span class="badge bg-secondary">' . $row->status . '</span>';
                    }
                })
                ->addColumn('image', function ($row) {
                    return '<img src="' . asset("sub_category_images/" . $row->image) . '" alt="Image" class="img-fluid rounded-1" style="width: 30px;" onclick="openImageModal(\'' . asset("sub_category_images/" . $row->image) . '\')">';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="icon-base ti tabler-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="' . route('edit_sub_category', [$row->id]) . '"><i class="icon-base ti tabler-pencil me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);" onclick="deleteCategory(' . $row->id . ')"
                                ><i class="icon-base ti tabler-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>';
                })
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }

        return view('Services.SubCategories.view');
    }

    public function addSubCategory(Request $request)
    {

        $categories = ServiceCategory::where(['status' => 'Active'])->get();

        if ($request->method() == 'POST') {

            $request->validate([
                'name' => 'required|unique:service_categories,name',
                'category_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            ], [
                'name.required' => 'Category Name Required',
                'name.unique' => 'Category Name already taken',
                'category_id.required' => 'Service Category Required',
                'image.required' => 'An image is required for the category.',
                'image.image'    => 'The file must be a valid image.',
                'image.mimes'    => 'Only JPEG, PNG, and JPG formats are allowed.',
                'image.max'      => 'The image size must not exceed 2MB.',
            ]);


            $data = [
                'name' => $request->name,
                'service_category_id' =>  $request->category_id,
            ];

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $cat_image = time() . '_' . $image->getClientOriginalName();
                $data['image'] = $cat_image;
                $image->move(public_path('sub_category_images'), $cat_image);
            }


            $insert = ServiceSubCategory::insert($data);


            return to_route('sub_category_list')->with(['status' => 'success', 'message' => 'Sub Category Added Successfully']);
        }
        return view('Services.SubCategories.add', compact('categories'));
    }

    public function editSubCategory($id, Request $request)
    {


        $subCategory = ServiceSubCategory::find($id);
        $categories = ServiceCategory::where(['status' => 'Active'])->get();


        if ($request->method() == 'POST') {

            $request->validate([
                'name' => 'required|unique:service_categories,name',
                'category_id' => 'required',
                'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',

            ], [
                'name.required' => 'Category Name Required',
                'name.unique' => 'Category Name already taken',
                'category_id.required' => 'Service Category Required',
                'image.image'    => 'The file must be a valid image.',
                'image.mimes'    => 'Only JPEG, PNG, and JPG formats are allowed.',
                'image.max'      => 'The image size must not exceed 2MB.',
            ]);


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $cat_image = time() . '_' . $image->getClientOriginalName();
                $subCategory->image = $cat_image;
                $image->move(public_path('sub_category_images'), $cat_image);
            }

            $subCategory->name = $request->name;
            $subCategory->service_category_id = $request->category_id;
            $subCategory->save();




            return to_route('sub_category_list')->with(['status' => 'success', 'message' => 'Sub Category Updated Successfully']);
        }

        return view('Services.SubCategories.edit', compact('subCategory', 'categories'));
    }

    public function statusSubCategory($id)
    {
        $category = ServiceSubCategory::find($id);
        $category->status = $category->status === 'Active' ? 'Inactive' : 'Active';
        $category->save();
    }



    public function servicesList(Request $request)
    {
        if ($request->ajax()) {
            $query = Services::with(['category','subCategory']);

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Active') {
                        return '<span class="badge bg-success">Active</span>';
                    } elseif ($row->status == 'Inactive') {
                        return '<span class="badge bg-danger">Inactive</span>';
                    } else {
                        return '<span class="badge bg-secondary">' . $row->status . '</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="icon-base ti tabler-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="' . route('edit_service', [$row->id]) . '"><i class="icon-base ti tabler-pencil me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);" onclick="deleteService(' . $row->id . ')"
                                ><i class="icon-base ti tabler-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('Services.Service.view');
    }


    public function addService(Request $request)
    {

        $categories = ServiceCategory::where(['status' => 'Active'])->get();

        if ($request->method() == 'POST') {


            $request->validate([
                // Required IDs
                'category_id' => 'required|exists:service_categories,id',
                'sub_cat_id'  => 'required|exists:service_sub_categories,id',

                // Basic details
                'name'     => 'required|string|max:255',
                'price'    => 'required|numeric|min:0',
                'discount' => 'nullable|numeric|min:0|max:100',
                'description' => 'required',

                // Services (arrays)
                'service_name.*'        => 'nullable|string|max:255',
                'amount.*'              => 'nullable|numeric|min:0',
                'service_description.*' => 'nullable|string|max:1000',

                // Inclusions
                'inclusion_name.*'      => 'required|string|max:255',

                // FAQ
                'faq_ques.*' => 'required|string|max:255',
                'faq_ans.*'  => 'required|string|max:1000',

                // Main Images
                'image1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'image4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'image5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

                // Video
                'video' => 'required|mimes:mp4,mov,avi,flv,wmv|max:10240', // max 10MB

                // Additional service images
                'service_image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ], [
                // Custom Messages
                'category_id.required' => 'Please select a category.',
                'category_id.exists'   => 'The selected category is invalid.',

                'sub_cat_id.required' => 'Please select a sub category.',
                'sub_cat_id.exists'   => 'The selected sub category is invalid.',

                'name.required' => 'Service name is required.',
                'price.required' => 'Price is required.',
                'price.numeric'  => 'Price must be a valid number.',

                'discount.numeric' => 'Discount must be a number.',
                'discount.max'     => 'Discount cannot exceed 100%.',

                'service_name.*.required' => 'Each service must have a name.',
                'amount.*.required'       => 'Each service must have an amount.',
                'amount.*.numeric'        => 'Service amount must be numeric.',

                'service_description.*.required' => 'Each service must have a description.',
                'inclusion_name.*.required'      => 'Each inclusion must have a name.',

                'faq_ques.*.required' => 'Each FAQ must have a question.',
                'faq_ans.*.required'  => 'Each FAQ must have an answer.',

                'image1.required' => 'Main image 1 is required.',
                'image1.image'    => 'Main image 1 must be a valid image file.',

                'service_image.*.required' => 'Each service must have an image.',
            ]);

            // 2. Store main images
            $mainImages = [];
            foreach (['image1', 'image2', 'image3', 'image4'] as $key) {
                if ($request->hasFile($key)) {
                    $image = $request->file($key);
                    $service_image = time() . '_' .$key.$image->getClientOriginalName();
                    $mainImages[$key] = $service_image;
                    $image->move(public_path('services/images'), $service_image);
                }
            }


            // 3. Store video (if uploaded)
            $videoPath = null;
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $service_video = time() . '_' . $video->getClientOriginalName();
                $videoPath = $service_video;
                $video->move(public_path('services/videos'), $service_video);
            }

            // 4. Build services array
            $services = [];
            foreach ($request->service_name as $index => $serviceName) {
                $serviceImageName = null;

                // dd($request->all(),$request->service_image[$index]);
                if(isset($request->service_image[$index])){
                    $serviceImage = $request->service_image[$index];
                    $serviceImageName = time() . '_' . $index . '_' . $serviceImage->getClientOriginalName();
                    $serviceImage->move(public_path('services/service'), $serviceImageName);
                }

                $services[] = [
                    'name'        => $serviceName,
                    'amount'      => $request->amount[$index] ?? null,
                    'description' => $request->service_description[$index] ?? null,
                    'image'       => $serviceImageName,
                ];
            }




            // 5. Build inclusions
            $inclusions = $request->inclusion_name ?? [];

            // 6. Build FAQs
            $faqs = [];
            if ($request->faq_ques && $request->faq_ans) {
                foreach ($request->faq_ques as $i => $question) {
                    $faqs[] = [
                        'question' => $question,
                        'answer'   => $request->faq_ans[$i] ?? null,
                    ];
                }
            }

            // 7. Save to DB
            $service = new Services(); // your model
            $service->service_category_id   = $request->category_id;
            $service->service_sub_category_id    = $request->sub_cat_id;
            $service->title          = $request->name;
            $service->slug          = Str::slug($request->name);
            $service->price         = $request->price;
            $service->discount      = $request->discount ?? 0;
            $service->description      = $request->description;
            $service->services      = json_encode($services);      // services JSON
            $service->inclusions    = json_encode($inclusions);    // inclusions JSON
            $service->faqs          = json_encode($faqs);          // faqs JSON
            $service->images        = json_encode($mainImages);    // main images JSON
            $service->video         = $videoPath;                  // video path
            $service->save();


            return to_route('services_list')->with(['status' => 'success', 'message' => 'Services Added Successfully']);
        }
        return view('Services.Service.add', compact('categories'));
    }


     public function statusService($id)
    {
        $category = Services::find($id);
        $category->status = $category->status === 'Active' ? 'Inactive' : 'Active';
        $category->save();
    }
}
