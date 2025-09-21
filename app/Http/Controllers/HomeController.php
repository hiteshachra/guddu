<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaticContent;
use App\Models\Video;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Models\Services;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::with('category')->where(function ($query) {
                                        $query->where('status', 'publish')->orWhere(function ($q) {
                                            $q->where('status', 'schedule')->where('publish_datetime', '<=', now());
                                        });
                                    })->latest()->limit(6)->get();
        
        $categories = ServiceCategory::withCount('services')->where('status', 'Active')->take(12)->get();

        $featuredServices = Services::with('category')
            ->where('featured', 'Yes')
            ->where('status', 'Active')
            ->latest()
            ->get();

        $popularServices = Services::with('category')
            ->where('popular', 'Yes')
            ->where('status', 'Active')
            ->latest()
            ->get();

        return view('home',compact('blogs','categories','featuredServices','popularServices'));
    }

    public function services_list(Request $request)
    {
        $categories = ServiceCategory::where('status', 'Active')->get();

        $selectedSubcat = ServiceSubCategory::whereIn('service_category_id', $request->categories??["-1"])->where('status', 'Active')->get();

        $query = Services::with('category','subCategory');

        // Keyword search
        if ($request->filled('title')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
            $query->where('description', 'like', '%' . $request->keyword . '%');
        }

        // Categories filter
        if ($request->filled('categories')) {
            $query->whereIn('service_category_id', $request->categories);
        }

        // Subcategory filter
        if ($request->filled('sub_category')) {
            $query->where('service_sub_category_id', $request->sub_category);
        }

        // Location filter
        // if ($request->filled('location')) {
        //     $query->where('location', 'like', '%' . $request->location . '%');
        // }

        $services = $query->paginate(12);
        $servicesCount = $query->count();

        return view('service-list',compact('categories','selectedSubcat','servicesCount','services'));
    }

    
    public function categories()
    {
        $data = ServiceCategory::where('status', 'Active')->get();

        return view('category-list',compact('data'));
    }

       
    public function service_details($slug)
    {
        $serviceInfo = Services::with('category')
            ->where('featured', 'Yes')
            ->where('status', 'Active')
            ->latest()
            ->get();

        $popularServices = Services::with('category')
            ->where('popular', 'Yes')
            ->where('status', 'Active')
            ->latest()
            ->get();

        return view('service-details',compact('serviceInfo','popularServices'));
    }
    
    public function static_content()
    {
        $routeName = \Route::currentRouteName();

        $data = StaticContent::where('sc_type', $routeName)->first();
        if(!$data) {
            return back();
        } else {
            return view('static_content', compact('data'));
        }
    }

    public function blogs(Request $request)
    {
        $data = Blog::with('category')
                ->where(function ($query) {
                    $query->where('status', 'publish')
                        ->orWhere(function ($q) {
                            $q->where('status', 'schedule')
                            ->where('publish_datetime', '<=', now());
                        });
                })
                ->latest()
                ->paginate(6);

        if ($request->ajax()) {
            return view('blog-items', compact('data'))->render();
        }
        return view('blog-list', compact('data'));
    } 

    
    public function blogDetails($slug)
    {
        $blog = Blog::with('category')
                ->where(function ($query) {
                    $query->where('status', 'publish')
                        ->orWhere(function ($q) {
                            $q->where('status', 'schedule')
                            ->where('publish_datetime', '<=', now());
                        });
                })->where('slug', $slug)->first();

        $data = Blog::with('category')
                ->where(function ($query) {
                    $query->where('status', 'publish')
                        ->orWhere(function ($q) {
                            $q->where('status', 'schedule')
                            ->where('publish_datetime', '<=', now());
                        });
                })->where('category_id', $blog->category_id)
                ->latest()
                ->paginate(6);

        return view('blog-details',compact('blog','data'));
    } 

    public function contact_us()
    {
        return view('contact-us');
    } 
   
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:100',
            'phone'         => ['required', 'regex:/^[6-9]\d{9}$/'],
            'email'         => 'required|email',
            'subject'       => 'required|string|max:150',
            'message'       => 'required|string|max:1000',
            'accept_terms'  => 'accepted'
        ]);

        ContactUs::create([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been submitted successfully!');
    }
}
