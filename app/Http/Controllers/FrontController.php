<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\User;
use App\Models\Banner;
use App\Models\UserWallet;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;
use DB;

class FrontController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $user_agent;

    public function __construct()
    {    
        $this->user_agent = request()->header('User-Agent');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
         // return redirect('login');

        // $banners = $banner->where('type', 'Home Slider')->where('status', 'Active')->get();
        // $offerBanners = $banner->where('type', 'Offer Brand Image')->where('status', 'Active')->get();
        // $offersZoneBanners = $banner->where('type', 'Home Offer Zone Banner')->where('status', 'Active')->get();

       // if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
       //      return redirect('login');
       //  } else {
       //  }
        
            return view('welcome');
    }

}
