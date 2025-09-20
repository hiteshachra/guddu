<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;


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
                    return '<img src="'.asset("category_images/".$row->image).'" alt="Image" class="img-fluid rounded-1" style="width: 30px;" onclick="openImageModal(\'' .asset("category_images/".$row->image). '\')">';
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
                ->rawColumns(['action', 'status','image'])
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
                    return '<img src="'.asset("sub_category_images/".$row->image).'" alt="Image" class="img-fluid rounded-1" style="width: 30px;" onclick="openImageModal(\'' .asset("sub_category_images/".$row->image). '\')">';
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
                ->rawColumns(['action', 'status'])
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
                'service_category_id' => 'required'
            ], [
                'name.required' => 'Category Name Required',
                'name.unique' => 'Category Name already taken',
                'service_category_id.required' => 'Service Category Required'
            ]);


            $data = [
                'name' => $request->name
            ];

            $insert = ServiceSubCategory::insert($data);


            return to_route('category_list')->with(['status' => 'success', 'message' => 'Category Added Successfully']);
        }
        return view('Services.SubCategories.add', compact('categories'));
    }

    public function editSubCategory($id, Request $request)
    {


        $category = ServiceCategory::find($id);


        if ($request->method() == 'POST') {

            $request->validate([
                'name' => 'required|unique:service_categories,name,' . $id
            ], [
                'name.required' => 'Category Name Required',
                'name.unique' => 'Category Name already taken',
            ]);

            $category->name = $request->name;
            $category->save();




            return to_route('category_list')->with(['status' => 'success', 'message' => 'Category Updated Successfully']);
        }

        return view('Services.SubCategories.edit', compact('category'));
    }

    public function statusSubCategory($id)
    {
        $category = ServiceCategory::find($id);
        $category->status = $category->status === 'Active' ? 'Inactive' : 'Active';
        $category->save();
    }
}
