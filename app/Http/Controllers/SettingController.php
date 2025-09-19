<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Coupon;
use App\Models\Banner;
use App\Models\StaticContent;
use App\Models\Configuration;
use DB;
use Image;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function banner_list(Banner $banner)
    {        
        $data = $banner->select('banners.*', DB::raw('banners.type+0 as type_id'))->orderBy('id','desc')->get();
        return view('setting.banner-list-page',compact('data'));
    }

    public function banners()
    {        
        $single_data = "";
        return view('setting.banner-page',compact('single_data'));
    }


    public function banners_create(Request $request, Banner $banner)
    {
        $request->validate([
            'banner_name' => 'required|unique:banners,name|max:191',
            'banner_title' => 'required',
            'banner_type' => 'required',
            'status' => 'required',
            'url' => 'required',
            'image' => 'required|max:5048|image|mimes:jpg,jpeg,bmp,png,gif',
        ]);

        $data = [
            "name"=> str_replace(" ","_",$request->banner_name),
            "title"=> $request->banner_title,
            "type"=> $request->banner_type,
            "url"=> $request->url,
            "desc"=> $request->description,
            "status"=> $request->status,
        ];


        $width = ''; $height = '';
        
        if($request->banner_type == 1) { $width = '1200'; $height = '650'; }
        if($request->banner_type == 2) { $width = '175'; $height = '155'; }
        if($request->banner_type == 3) { $width = '1200'; $height = '1200'; }
        if($request->banner_type == 4) { $width = '2880'; $height = '720'; }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name1 = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/banner/');

            if($width != '' && $height != '')
            {
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize($width, $height, function ($constraint) { 
                    $constraint->aspectRatio();
                })->save($destinationPath.$name1);
            } 
            else
            {
                $image->move($destinationPath, $name1);
            }

            $data["image"] = $name1;
        }


        $check = $banner->create($data);

        if($check) {

            return redirect('settings/banners')->with('success','Banner Create Successfully');

        } else {

            return redirect('settings/banners')->with('error','Banner Not Created.');
        }
    }



    public function banners_edit($id, Banner $banner)
    {
        $single_data = $banner->find($id);

        if(!$single_data) {
            return back()->with('error', 'Banner Not Found.');
        }
        return view('setting.banner-page',compact('single_data'));
    }


    public function banners_update($id, Request $request, Banner $banner)
    {

        $request->validate([
            'banner_title' => 'required',
            'banner_type' => 'required',
            'status' => 'required',
            'url' => 'required',
            'image' => 'nullable|max:5048|image|mimes:jpg,jpeg,png,gif',
        ]);

        $data = [
            "title"=> $request->banner_title,
            "type"=> $request->banner_type,
            "url"=> $request->url,
            "desc"=> $request->description,
            "status"=> $request->status
        ];


        $width = ''; $height = '';
        
        if($request->banner_type == 1) { $width = '1200'; $height = '650'; }
        if($request->banner_type == 2) { $width = '175'; $height = '155'; }
        if($request->banner_type == 3) { $width = '1200'; $height = '1200'; }
        if($request->banner_type == 4) { $width = '2880'; $height = '720'; }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name1 = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/banner/');

            if($width != '' && $height != '')
            {
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize($width, $height, function ($constraint) { 
                    $constraint->aspectRatio();
                })->save($destinationPath.$name1);
            } 
            else
            {
                $image->move($destinationPath, $name1);
            }

            $data["image"] = $name1;
        }


        $check = $banner->where('id' ,$id)->update($data);


        if($check) {

            return back()->with('success','Banner Update Successfully');
        } 
    
            return back()->with('error', 'Banner Not Update.');
        
    }

    public function banners_status_change($id, Banner $banner)
    {

        $single_data = $banner->find($id);

        if($single_data) 
        {

            $status_name = $single_data->status == "Active"? "Inactive":"Active" ;

            $check = $banner->where('id' ,$id)->update(['status' =>  $status_name]);

            if($check) {

                return back()->with('success','Banner Status Change Successfully');
            } 
        }
                return back()->with('error', 'Banner Status Not Change.');
        
    }





    public function subscription_list(Subscription $subscription)
    {        
        $data = $subscription->orderBy('id','desc')->get();
        return view('setting.subscription-list-page',compact('data'));
    }

    public function subscription()
    {   
        $single_data = '';     
        return view('setting.subscription-page',compact('single_data'));
    }


    public function subscription_create(Request $request, Subscription $subscription)
    {

        $request->validate([
            'subscription_tag' => 'required',
            'subscription_name' => 'required|unique:subscribeon_plans,name|max:191',
            'subscription_subject' => 'required',
            'subscription_type' => 'required',
            'plan_daily_amount' => 'required',
            'plan_days' => 'required',
            'status' => 'required',
            'image' => 'required|max:5048|image|mimes:jpg,jpeg,bmp,png,gif',
        ]);

        $data = [
            "name"=> $request->subscription_name,
            "subject"=> $request->subscription_subject,
            "tag"=> $request->subscription_tag,
            "type"=> $request->subscription_type,
            "plan_days"=> $request->plan_days,
            "plan_daily_amount"=> $request->plan_daily_amount,
            "description"=> $request->description,
            "status"=> $request->status,
        ];


        if($request->hasFile('image')){
            $image = $request->file('image');
            $name1 = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/subscription/');
            $image->move($destinationPath, $name1);
            $data["image"] = $name1;
        }


        $check = $subscription->create($data);

        if($check) {

            return redirect('settings/subscription')->with('success','Subscription Create Successfully');

        } else {

            return redirect('settings/subscription')->with('error','Subscription Not Created.');
        }
    }



    public function subscription_edit($id, Subscription $subscription)
    {
        $single_data = $subscription->find($id);

        if(!$single_data) {
            return back()->with('error', 'subscription Not Found.');
        }
        return view('setting.subscription-page',compact('single_data'));
    }


    public function subscription_update($id, Request $request, Subscription $subscription)
    {

        $request->validate([
            'subscription_tag' => 'required',
            'subscription_name' => 'required|max:191|unique:subscribeon_plans,name,'.$id,
            'subscription_subject' => 'required',
            'subscription_type' => 'required',
            'plan_daily_amount' => 'required',
            'plan_days' => 'required',
            'status' => 'required',
            'image' => 'nullable|max:5048|image|mimes:jpg,jpeg,bmp,png,gif',
        ]);


        $data = [
            "name"=> $request->subscription_name,
            "subject"=> $request->subscription_subject,
            "tag"=> $request->subscription_tag,
            "type"=> $request->subscription_type,
            "plan_days"=> $request->plan_days,
            "plan_daily_amount"=> $request->plan_daily_amount,
            "description"=> $request->description,
            "status"=> $request->status,
        ];


        if($request->hasFile('image')){
            $image = $request->file('image');
            $name1 = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/subscription/');
            $image->move($destinationPath, $name1);            

            $data["image"] = $name1;
        }


        $check = $subscription->where('id' ,$id)->update($data);


        if($check) {

            return back()->with('success','subscription Update Successfully');
        } 
    
            return back()->with('error', 'subscription Not Update.');
        
    }

    public function subscription_status_change($id, Subscription $subscription)
    {

        $single_data = $subscription->find($id);

        if($single_data) 
        {

            $status_name = $single_data->status == "Active"? "Inactive":"Active" ;

            $check = $subscription->where('id' ,$id)->update(['status' =>  $status_name]);

            if($check) {

                return back()->with('success','subscription Status Change Successfully');
            } 
        }
                return back()->with('error', 'subscription Status Not Change.');
        
    }








    public function coupon_list(Coupon $coupon)
    {        
        $data = $coupon->orderBy('id','desc')->get();
        return view('setting.coupon-list-page',compact('data'));
    }

    public function coupon(Coupon $coupon)
    {   
        $single_data = '';     
        return view('setting.coupon-page',compact('single_data'));
    }


    public function coupon_create(Request $request, Coupon $coupon)
    {

        $request->validate([
            'coupon_type' => 'required',
            'coupon_code' => 'required|unique:coupons,name|max:191',
            'coupon_name' => 'required',
            'price_type' => 'required',
            'discount' => 'required',
            'min_order_amt' => 'required',
            'coupon_qty' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'image' => 'required|max:5048|image|mimes:jpg,jpeg,bmp,png,gif',
        ]);

        $data = [
            "type"=> $request->coupon_type,
            "code"=> strtoupper(str_replace(" ","", $request->coupon_code)),
            "name"=> $request->coupon_name,
            "price_type"=> $request->price_type,
            "price"=> $request->discount,
            "min_order_amt"=> $request->min_order_amt,
            "unused"=> $request->coupon_qty,
            "qty"=> $request->coupon_qty,
            "start_date"=> $request->start_date,
            "end_date"=> $request->end_date,
            "status"=> $request->status,
        ];


        if($request->hasFile('image')){
            $image = $request->file('image');
            $name1 = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/coupon/');
            $image->move($destinationPath, $name1);
            $data["image"] = $name1;
        }


        $check = $coupon->create($data);

        if($check) {

            return redirect('settings/coupon')->with('success','Coupon Create Successfully');

        } else {

            return redirect('settings/coupon')->with('error','Coupon Not Created.');
        }
    }



    public function coupon_edit($id, Coupon $coupon)
    {
        $single_data = $coupon->find($id);

        if(!$single_data) {
            return back()->with('error', 'Coupon Not Found.');
        }
        return view('setting.coupon-page',compact('single_data'));
    }


    public function coupon_update($id, Request $request, Coupon $coupon)
    {


        $request->validate([
            'coupon_type' => 'required',
            'coupon_code' => 'required|max:191|unique:coupons,name,'.$id,
            'coupon_name' => 'required',
            'price_type' => 'required',
            'discount' => 'required',
            'min_order_amt' => 'required',
            'coupon_qty' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'image' => 'nullable|max:5048|image|mimes:jpg,jpeg,bmp,png,gif',
        ]);


        $data = [
            "type"=> $request->coupon_type,
            "code"=> strtoupper(str_replace(" ","", $request->coupon_code)),
            "name"=> $request->coupon_name,
            "price_type"=> $request->price_type,
            "price"=> $request->discount,
            "min_order_amt"=> $request->min_order_amt,
            "unused"=> $request->coupon_qty,
            "qty"=> $request->coupon_qty,
            "start_date"=> $request->start_date,
            "end_date"=> $request->end_date,
            "status"=> $request->status,
        ];


        if($request->hasFile('image')){
            $image = $request->file('image');
            $name1 = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/coupon/');
            $image->move($destinationPath, $name1);            

            $data["image"] = $name1;
        }


        $check = $coupon->where('id' ,$id)->update($data);


        if($check) {

            return back()->with('success','Coupon Update Successfully');
        } 
    
            return back()->with('error', 'Coupon Not Update.');
        
    }

    public function coupon_status_change($id, Coupon $coupon)
    {

        $single_data = $coupon->find($id);

        if($single_data) 
        {

            $status_name = $single_data->status == "Active"? "Inactive":"Active" ;

            $check = $coupon->where('id' ,$id)->update(['status' =>  $status_name]);

            if($check) {

                return back()->with('success','Coupon Status Change Successfully');
            } 
        }
                return back()->with('error', 'Coupon Status Not Change.');
    }



    public function coupon_publish_change($id, Coupon $coupon)
    {

        $single_data = $coupon->find($id);

        if($single_data) 
        {

            $status_name = $single_data->publish == "Yes"? "No":"Yes" ;

            $check = $coupon->where('id' ,$id)->update(['publish' =>  $status_name]);

            if($check) {

                return back()->with('success','Coupon Publish Status Change Successfully');
            } 
        }
                return back()->with('error', 'Coupon Publish Status Not Change.');
    }





    public function faq_list(Faq $faq)
    {   
        $data = $faq->orderBy('id','desc')->get();    
        return view('setting.faq-list-page',compact('data'));
    }

    public function faq(Faq $faq)
    {   
        $single_data = '';     
        return view('setting.faq-page',compact('single_data'));
    }


    public function faq_create(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|unique:faqs|max:255',
            'answer' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $data = [
            "question"=> $request->question,
            "answer"=> $request->answer,
            "category"=> $request->category,
            "status"=> $request->status,
        ];

        $check = $faq->create($data);

        if($check) {

            return redirect('settings/faq')->with('success','Faq Create Successfully');

        } else {

            return redirect('settings/faq')->with('error','Faq Not Created.');
        }
    }



    public function faq_edit($id, Faq $faq)
    {

        $single_data = $faq->find($id);

        if(!$single_data) {
            return back()->with('error', 'Faq Not Found.');
        }
        return view('setting.faq-page',compact('single_data'));
    }


    public function faq_update($id, Request $request, Faq $faq)
    {

        $request->validate([
            'question' => 'required|max:255|unique:faqs,question,'.$id,
            'answer' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $data = [
            "question"=> $request->question,
            "answer"=> $request->answer,
            "category"=> $request->category,
            "status"=> $request->status,
        ];


        $check = $faq->where('id' ,$id)->update($data);


        if($check) {

            return back()->with('success','Faq Update Successfully');
        } 
    
            return back()->with('error', 'Faq Not Update.');
        
    }

    public function faq_status_change($id, Faq $faq)
    {

        $single_data = $faq->find($id);

        if($single_data) 
        {

            $status_name = $single_data->status == "Active"? "Inactive":"Active" ;

            $check = $faq->where('id' ,$id)->update(['status' =>  $status_name]);

            if($check) {

                return back()->with('success','Faq Status Change Successfully');
            } 
        }
                return back()->with('error', 'Faq Status Not Change.');
        
    }





    public function static_list()
    {
        $contents = StaticContent::all();
        return view('setting.static-list', compact('contents'));
    }


    public function static_update($id, Request $request)
    {

        $content = StaticContent::find($id);
        if ($request->method() == 'POST') {

            $validator = Validator::make($request->all(), [
                'content' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $content->sc_desc = $request->content;
            $content->save();

            return back()->with(['type' => 'success', 'message' => 'Content updated successfully!']);
        }

        return view('setting/static-update', compact('content'));
    }


    
    public function config_list()
    {
        $data = Configuration::get();
        return view('setting/config-list', compact('data'));
    }

    public function config_update(Request $request)
    {

        $validated = $request->validate([
            'qr_code' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        Configuration::where('name','app.contact_us')->update(["value" => $request->contact_us]);
        Configuration::where('name','app.email_us')->update(["value" => $request->email_us]);
        Configuration::where('name','app.whatsapp')->update(["value" => $request->whatsapp]);
        Configuration::where('name','custom.facebook_page_id')->update(["value" => $request->facebook_page_id]);
        Configuration::where('name','custom.twitter_page_id')->update(["value" => $request->twitter_page_id]);
        Configuration::where('name','custom.instagram_page_id')->update(["value" => $request->instagram_page_id]);
        Configuration::where('name','custom.linkedin_page_id')->update(["value" => $request->linkedin_page_id]);
        Configuration::where('name','app.coin_in_inr')->update(["value" => $request->coin_in_inr]);
        Configuration::where('name','app.address')->update(["value" => $request->address]);
        Configuration::where('name','app.upi_id')->update(["value" => $request->upi_id]);


     // Prepare directory path
        $uploadPath = public_path('images/qr_code');

        // Make sure the folder exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Initialize file paths
        $frontPath = $backPath = $panPath = null;

        // Rename and move each file if it exists
        if ($request->hasFile('qr_code')) {
            $frontFile = $request->file('qr_code');
            $frontName = 'qr_' . time() . '.' . $frontFile->getClientOriginalExtension();
            $frontFile->move($uploadPath, $frontName);
            Configuration::where('name','app.qr_code')->update(["value" => $frontName]);
        }

        return back()->with(['type' => 'success', 'message' => 'Config updated successfully!']);
    }





}
