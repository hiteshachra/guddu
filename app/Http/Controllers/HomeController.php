<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Town;
use App\Models\User;
use App\Models\Pool;
use App\Models\Brand;
use App\Models\Citie;
use App\Models\State;
use App\Models\Tariff;
use App\Models\Ledger;
use App\Models\Coupon;
use App\Models\Market;
use App\Models\Banner;
use App\Models\UserKyc;
use App\Models\Support;
use App\Models\Countrie;
use App\Models\UserWallet;
use App\Models\FundRequest;
use App\Models\UserAddress;
use App\Models\PoolRequest;
use App\Models\SupportReply;
use App\Models\OnlinePayment;
use App\Models\StaticContent;
use App\Models\UserBankDetail;
use App\Models\PoolCommission;
use App\Models\WithdrawRequest;
use DB;
use PDF;
use Auth;
use Hash;
use Helper;
use Cookie;
use Razorpay;
use Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $country_id;
    private $user_agent;

    public function __construct()
    {   
        $this->country_id = 101;
        if(Auth::guard()->check()){
            $this->middleware(['auth','verified']);
        }
        
        $this->user_agent = request()->header('User-Agent');
    }






    public function home(Request $request, User $user, UserWallet $userwallet, Ledger $ledger, PoolRequest $poolrequest)
    {   

        $id = Auth()->user()->id;
        $roleName  = Auth()->user()->role == 2?'Vendor':'User';

        $currentPool = Pool::where('status', 'Open')
                   ->where('for', $roleName)
                   ->where('start_time', '<=', Carbon::now())
                   ->where('end_time', '>=', Carbon::now())
                   ->orderBy('start_time', 'desc')
                   ->first();

        $previousPool = Pool::where('status', 'Closed')
            ->where('for', $roleName)
            ->where('end_time', '<=', Carbon::now())
            ->orderBy('end_time', 'desc')
            ->first();


       $upcomingPool = Pool::where('status', 'Open')
            ->where('start_time', '>', Carbon::now())
            ->where('id', '!=', optional($currentPool)->id)
            ->orderBy('start_time', 'asc')
            ->get();     

        $userInfo = $user->where('id', $id)->first();
        $directTeam = $user->where('referral_id', $id)->latest()->limit(10)->get();
        $directTeamCount = $user->where('referral_id', $id)->count();
        $walletData = $userwallet->where('user_id', $id)->first();
        $ledgerData = $ledger->selectRaw('SUM(cramount) AS cr, SUM(dramount) AS dr')->where('bal_type', 'DMT')->where('user_id', $id)->first();
    
        $topPurchasers = $userwallet->with('users')->whereHas('users', function($query) use ($roleName) {
                                                        $query->where('role', Auth()->user()->role);
                                                    })->orderBy('dmt_balance', 'desc')->take(10)->get();


        $poolReq = $poolrequest->where('win_amount', '>', '0')->orderBy('win_amount','desc')->paginate(5);
        $banner = Banner::where('type', 'Home Offer Banner')->where('status', 'Active')->first();
        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            return view('front.index',compact('userInfo','directTeam','directTeamCount','walletData','ledgerData','currentPool','previousPool','upcomingPool','topPurchasers','poolReq','banner'));
        } else {
            return view('front.index',compact('userInfo','directTeam','directTeamCount','walletData','ledgerData','currentPool','previousPool','upcomingPool','topPurchasers','poolReq','banner'));
        }
    }
    
    

    public function scanner(Request $request, User $user)
    {
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            return view('front.account.scanner',compact('userInfo'));
        } else {
            return view('front.account.scanner',compact('userInfo'));
        }
    }



    public function my_account(Request $request, User $user, UserAddress $useraddress, UserWallet $userwallet, UserKyc $userkyc, UserBankDetail $userbankdetail, Market $market)
    {
        $kycInfo = $userkyc->where('user_id', Auth()->user()->id)->first();
        $bankdetail = $userbankdetail->where('user_id', Auth()->user()->id)->first();
        $marketInfo = $market->where('user_id', Auth()->user()->id)->first();

        $address = $useraddress->findByUserId(Auth()->user()->id);
        $wallet_data = $userwallet->where('user_id', Auth()->user()->id)->first();
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        $team = $user->where('referral_id', Auth()->user()->id)->latest()->paginate(10);
  
        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            return view('front.account.profile',compact('userInfo', 'address', 'wallet_data', 'team', 'kycInfo', 'bankdetail', 'marketInfo'));
        } else {
            return view('front.account.profile',compact('userInfo', 'address', 'wallet_data', 'team', 'kycInfo', 'bankdetail', 'marketInfo'));
        }
    }


    public function edit_account(Request $request, User $user, UserAddress $useraddress, Countrie $countrie, State $state, Citie $citie)
    {
        $address = $useraddress->findByUserId(Auth()->user()->id);
        $countryList = $countrie->where('status','Active')->get();
        $stateList = [];
        $citieList = [];
        if($address->country) {
            $stateList = $state->where(['country_id' => $address->country, 'status' => 'Active'])->get(); 
            if($address->state) {
                $citieList = $citie->where(['country_id' => $address->country, 'state_id' => $address->state, 'status' => 'Active'])->get();
            }
        }

        $userInfo = $user->where('id', Auth()->user()->id)->first();

        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            return view('front.account.edit-profile',compact('userInfo','address','countryList','stateList','citieList'));
        } else {
            return view('front.account.edit-profile',compact('userInfo','address','countryList','stateList','citieList'));
        }
    }


    public function update_accounts(Request $request, User $user, UserAddress $useraddress)
    {
        $user = Auth::user(); 
        $address = $useraddress->findByUserId(Auth()->user()->id);

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'gender' => 'nullable|in:Male,Female,Other',
            'dob' => 'nullable|date',
            'address' => 'required|string|max:191',
            'street' => 'nullable|string|max:191',
            'country' => 'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'pincode' => 'required|numeric|digits_between:4,10',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Prepare directory path
        $uploadPath = public_path('images/profile');

        // Make sure the folder exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Initialize file paths
        $frontPath = $backPath = $panPath = null;

        // Rename and move each file if it exists
        if ($request->hasFile('profile_image')) {
            $frontFile = $request->file('profile_image');
            $frontName = 'profile_' . time() . '.' . $frontFile->getClientOriginalExtension();
            $frontFile->move($uploadPath, $frontName);
            User::where('id', $user->id)->update([
                'profile_pic' => $frontName
            ]);
        }

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'dob' => $request->dob
        ]);

       // ✅ Update Address table
        if ($address) {
            $useraddress->where('user_id', $user->id)->update([
                'mobile_number' => $user->phone_number,
                'address' => $request->address,
                'street' => $request->street,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip' => $request->pincode,
                'default' => 'Yes'
            ]);
        } else {
            $useraddress->create([
                'user_id' => $user->id,
                'mobile_number' => $user->phone_number,
                'address' => $request->address,
                'street' => $request->street,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip' => $request->pincode,
                'default' => 'Yes'
            ]);
        }

        return back()->with('success','Profile update Successfully.');
    }



    public function edit_kyc(Request $request, User $user, UserKyc $userkyc)
    {
        $kycData = $userkyc->where('user_id', Auth()->user()->id)->first();
        $userInfo = $user->where('id', Auth()->user()->id)->first();

        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            return view('front.account.edit-kyc',compact('userInfo','kycData'));
        } else {
            return view('front.account.edit-kyc',compact('userInfo','kycData'));
        }
    }

    
    public function update_kyc(Request $request, User $user, UserKyc $userkyc)
    {   
        $request->validate([    
            'document_type' => 'required|string|max:191',
            'document_no' => 'required|string|max:191',
            'document_front_side' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'document_back_side'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'pan_card'            => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Prepare directory path
        $uploadPath = public_path('images/documents');

        // Make sure the folder exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Initialize file paths
        $frontPath = $backPath = $panPath = null;

        // Rename and move each file if it exists
        if ($request->hasFile('document_front_side')) {
            $frontFile = $request->file('document_front_side');
            $frontName = 'doc_front_' . time() . '.' . $frontFile->getClientOriginalExtension();
            $frontFile->move($uploadPath, $frontName);
        }

        if ($request->hasFile('document_back_side')) {
            $backFile = $request->file('document_back_side');
            $backName = 'doc_back_' . time() . '.' . $backFile->getClientOriginalExtension();
            $backFile->move($uploadPath, $backName);
        }

        if ($request->hasFile('pan_card')) {
            $panFile = $request->file('pan_card');
            $panName = 'pan_' . time() . '.' . $panFile->getClientOriginalExtension();
            $panFile->move($uploadPath, $panName);
        }

        $userkyc->where('user_id', Auth()->user()->id)->update([
            'id_proof_type' => 'Permanent Account Number (PAN)',
            'id_proof_img' => $panName,
            'address_proof_type' => $request->document_type,
            'address_proof_no' => $request->document_no,
            'address_proof_front_img' => $frontName,
            'address_proof_back_img' => $backName,
            'status' => 'Submitted'
        ]);

       
        return back()->with('success','Kyc update Successfully.');
    }


    public function edit_bank(Request $request, User $user, UserBankDetail $userbankdetail)
    {
        $bankData = $userbankdetail->where('user_id', Auth()->user()->id)->first();
        $userInfo = $user->where('id', Auth()->user()->id)->first();

        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            return view('front.account.edit-bank',compact('userInfo','bankData'));
        } else {
            return view('front.account.edit-bank',compact('userInfo','bankData'));
        }
    }


    public function update_bank(Request $request, User $user, UserBankDetail $userbankdetail)
    {
        $request->validate([    
            'account_holder_name' => 'required|string|max:191',
            'account_number' => 'required|string|max:191',
            'bank_name' => 'required|string|max:191',
            'branch' => 'required|string|max:191',
            'ifsc_code' => 'required|string|max:191',
            'upi_id' => 'required|string|max:191',
            'bank_proof_document' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Prepare directory path
        $uploadPath = public_path('images/bank_doc');

        // Make sure the folder exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Initialize file paths
        $frontPath = $backPath = $panPath = null;

        // Rename and move each file if it exists
        if ($request->hasFile('bank_proof_document')) {
            $frontFile = $request->file('bank_proof_document');
            $frontName = 'doc_front_' . time() . '.' . $frontFile->getClientOriginalExtension();
            $frontFile->move($uploadPath, $frontName);
        }

        $userbankdetail->where('user_id', Auth()->user()->id)->update([
            'user_name_at_bank' => $request->account_holder_name,
            'account_number' => $request->account_number,
            'name' => $request->bank_name,
            'branch' => $request->branch,
            'ifscode' => $request->ifsc_code,
            'upi_id' => $request->upi_id,
            'cancele_chq' => $frontName,
            'status' => 'SUBMITED'
        ]);

        return back()->with('success','Bank details update successfully.');
    }


    public function edit_shop(Request $request, User $user, Market $market)
    {
        $marketData = $market->where('user_id', Auth()->user()->id)->first();
        $userInfo = $user->where('id', Auth()->user()->id)->first();

        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            return view('front.account.edit-shop',compact('userInfo','marketData'));
        } else {
            return view('front.account.edit-shop',compact('userInfo','marketData'));
        }
    }


    public function update_shop(Request $request, User $user, Market $market)
    {
        $request->validate([    
            'shop_name' => 'required|string|max:191',
            'shop_address' => 'required|string|max:191',
            'shop_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Prepare directory path
        $uploadPath = public_path('images/shop_doc');

        // Make sure the folder exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Initialize file paths
        $frontPath = $backPath = $panPath = null;

        // Rename and move each file if it exists
        if ($request->hasFile('shop_logo')) {
            $frontFile = $request->file('shop_logo');
            $frontName = 'doc_front_' . time() . '.' . $frontFile->getClientOriginalExtension();
            $frontFile->move($uploadPath, $frontName);
        }

        $market->where('user_id', Auth()->user()->id)->update([
            'name' => $request->shop_name,
            'address' => $request->shop_address,
            'logo' => $frontName
        ]);

        return back()->with('success','Shop details update successfully.');
    }



    public function change_password()
    {
        return view('front.account.change-password');
    }


    public function change_passwords(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->old_password, Auth()->user()->password)) 
        {
            return back()->with('error', 'does not match the old password')->withInput();
        } 
        else 
        {
            $check = $user->where('id', Auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            if($check) {

                return back()->with('success','Password Changed Successfully.');
            } 
        }
    
        return back()->with('error', 'Password not dhange.');
    }


    public function help_support(Faq $faq)
    {
        $all_faq = $faq->where('category','Help & Support')->where('status','ACTIVE')->get();

        return view('front.account.help-support',compact('all_faq'));
    }



    public function terms_condition()
    {
        return view('front.account.terms-conditions');
    }



    public function help_ticket()
    {
        return view('front.account.help-ticket');
    }



    public function my_address(UserAddress $useraddress, State $state)
    {
        $address = $useraddress->getByUserId(Auth()->user()->id);
        $state = $state->findByActiveCountry($this->country_id);

        return view('front.account.my-address',compact('state','address'));
    }



    public function delete_address(Request $request, UserAddress $useraddress)
    {
        $validation = Validator::make($request->all(), [
            'address_id' => 'required',
        ]);
       
        return $useraddress->where('user_id',Auth()->user()->id)->where('id',$request->address_id)->update(['status' => 'Inactive']);
    }


    public function set_user_default_address(Request $request, UserAddress $useraddress)
    {
        $validation = Validator::make($request->all(), [
            'address_id' => 'required',
        ]);
               $useraddress->where('user_id',Auth()->user()->id)->update(['default' => 'No']);
        return $useraddress->where('user_id',Auth()->user()->id)->where('id',$request->address_id)->update(['default' => 'Yes']);
    }

 

    public function add_address(Request $request, UserAddress $useraddress)
    {
        $validation = Validator::make($request->all(), [
            'complete_address' => 'required',
            'mobile_number' => 'required',
            'mobile_number' => 'required|regex:/^[6-9]\d{9}$/',
            'landmark' => 'required',
            'type' => 'required|integer|between:1,3',
            'pin' => 'required|digits:6',
            'state' => 'required',
            'city' => 'required',
        ]);

        if($validation->fails()) { 
            $errors = $validation->messages()->toArray();
            //$errors=$validation->errors();
            foreach ($errors as $key => $value) {
                if(isset($value[0])) {
                    return [
                        'status' => 'error',
                        'msg' => $value[0]
                    ];
                } else {
                    return [
                        'status' => 'error',
                        'msg' => 'invalid credentials.'
                    ];
                }
            }
        } else {
            
            if($request->address_id) {

                $check = $useraddress->where('user_id',Auth()->user()->id)->where('id',$request->address_id)->update([
                    'mobile_number' => $request->mobile_number,
                    'type'          => $request->type,
                    'address'       => $request->complete_address,
                    'street'        => $request->landmark,
                    'city'          => $request->city,
                    'state'         => $request->state,
                    'zip'           => $request->pin,
                    'country'       => 101,
                ]);
                
                if($check) {

                    return [
                        'status' => 'success',
                        'msg' => 'Address Update Successfully.'
                    ];

                } else {
                    return [
                        'status' => 'error',
                        'msg' => 'address not update.'
                    ];
                }
 
            } else {

                $useraddress->where('user_id',Auth()->user()->id)->update(['default' => 'No']);

                $check = $useraddress->create([
                    'user_id'       => Auth()->user()->id,
                    'mobile_number' => $request->mobile_number,
                    'type'          => $request->type,
                    'address'       => $request->complete_address,
                    'street'        => $request->landmark,
                    'default'       => 'Yes',
                    'city'          => $request->city,
                    'state'         => $request->state,
                    'zip'           => $request->pin,
                    'country'       => 101
                ]);
                
                if($check) {
                    return [
                        'status' => 'success',
                        'msg' => 'Add Address Successfully.'
                    ];

                } else {
                    return [
                        'status' => 'error',
                        'msg' => 'address not update.'
                    ];
                } 
            }
               
        }

        return [
            'status' => 'error',
            'msg' => 'invalid credentials.'
        ];
    }

 



    public function my_wallet(Request $request, UserWallet $userwallet, Ledger $ledger)
    {
        $ledger_type = $request->type ?? 'point';
        $start = '';
        $end = '';
        $type = 'DMT';
        if($ledger_type == 'main') {
            $type = 'MAIN';
        }
        
        $wallet_data = $userwallet->where('user_id', Auth()->user()->id)->first();
        $ledger_report = $ledger->where('user_id', Auth()->user()->id)->where('bal_type', $type)->latest()->paginate(10);

        if ($request->ajax()) {
            return view('front.account.pagination.transactions',compact('ledger_report'));
        }

        return view('front.account.my-wallet',compact('ledger_report','start','end','ledger_type','wallet_data'));
    }



    public function my_referrals(Request $request, User $user)
    {
        $data = $user->where('referral_id', Auth()->user()->id)->latest()->paginate(10);
        if ($request->ajax()) {
            return view('front.account.pagination.my-referral', compact('data'));
        }
        return view('front.account.my-referral',compact('data'));
    }



    public function add_money_in_wallet(Request $request)
    {
        $data = $request->all();
        $user = Auth()->user();
        //Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = Razorpay::paymentVerify($data, $user);

        if($signatureStatus['status'] == 'success') {
            if($signatureStatus['message'] =='success')
            {
                $response = Helper::creadit_ledger([
                            "user_id" => $user->id,
                            "amount" => $signatureStatus['amount'],
                            "trans_id" => $signatureStatus['payment_id'],
                            "cgst" => 0,
                            "sgst" => 0,
                            "ledger_type" => 12,
                            "wallet_type" => 1,
                            "trans_from" => $signatureStatus['payment_method'],
                            "description" => '₹'.$signatureStatus['amount'].' Online payment Successfully via '.$signatureStatus['payment_method'].'.'
                        ]);

                if($response['status'] == 'success') {
                    OnlinePayment::where('payment_id', $signatureStatus['payment_id'])->where('user_id', $user->id)->update([
                            "ledger_id" => $response['insertGetId']
                    ]);

                    return ['status' => 'success','msg' => 'Amount Add Successfully.'];
                }
    
            } 
           
            return ['status' => 'success','msg' => 'Amount not add in wallet payment is pending.'];
            
        } 
             
        return ['status' => 'error','msg' => 'Amount not add in wallet payment failed.'];
    }






    public function contact_us(Faq $faq)
    {
        $all_faq = $faq->where('category','Faq')->where('status','ACTIVE')->get();

        return view('front.contact-us',compact('all_faq'));
    }




    public function coupons(Coupon $coupon)
    {
        $data = $coupon->where('status', 'Active')->where('publish', 'Yes')->orderBy('id','desc')->limit(30)->get();
        return view('front.account.promos',compact('data'));
    }




    public function faq(Faq $faq)
    {
        $all_faq = $faq->where('category','Faq')->where('status','ACTIVE')->get();

        return view('front.faq-page',compact('all_faq'));
    }




    public function partners()
    {

        return view('front.partner-page');
    }



    public function coin_transaction(Request $request, User $user, FundRequest $fundrequest)
    {
        
        $query = $fundrequest->where('request_for', 'User');

        if(auth()->user()->role == 2) {
            $query->where('to_user_id', auth()->user()->id);
        } else {
            $query->where('from_user_id', auth()->user()->id);
        }

        $data = $query->latest()->paginate(10);

        if ($request->ajax()) {
            if(auth()->user()->role == 2) {
                return view('front.account.partials.coin-trans-received', compact('data'))->render();
            }
            if(auth()->user()->role == 3) {
                return view('front.account.partials.coin-trans-send', compact('data'))->render();
            }
        }

        return view('front.account.coin-transaction',compact('data'));
    }

    public function coin_transaction_verify(Request $request, User $user, FundRequest $fundrequest, UserWallet $userwallet)
    {
        $request->validate([
            'id' => 'required|exists:fund_requests,id',
            'status' => 'required|in:Pending,Approved,Rejected',
            'amount' => 'required'
        ],[
            'amount.required' => 'Please enter the point.'
        ]);

        $wallet_data = $userwallet->where('user_id', Auth()->user()->id)->first();
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        $data = FundRequest::where('id', $request->id)->first();

        if((float)$wallet_data->dmt_balance < (float)$request->amount) {
            return ['status' => 'error', 'message' => 'Point is please add points.'];
        }

        if($data) {
            if($data->status == 'Pending') {
        
                $trans_id = Helper::getTransId(3);

                $check = Helper::debit_ledger([
                            "user_id" => $data->to_user_id,
                            "refrence_id" => $data->from_user_id,
                            "amount" => (float)$request->amount,
                            "trans_id" => $trans_id,
                            "cgst" => 0,
                            "sgst" => 0,
                            "ledger_type" => 5,
                            "wallet_type" => 2,
                            "trans_from" => 'Wallet',
                            "description" => $data->amount.' Points Transfer From '.$data->fromUser->name??''
                        ]); 

                if($check["status"] ==  "success") {

                    $check2 = Helper::creadit_ledger([
                        "user_id" => $data->from_user_id,
                        "refrence_id" => $data->to_user_id,
                        "amount" => (float)$request->amount,
                        "trans_id" => $trans_id,
                        "cgst" => 0,
                        "sgst" => 0,
                        "ledger_type" => 5,
                        "wallet_type" => 2,
                        "trans_from" => 'Wallet',
                        "description" => $data->amount.' Points Transfer From '.$data->fromUser->name??''
                    ]); 

                    Helper::creadit_ledger([
                        "user_id" => $data->to_user_id,
                        "refrence_id" => $data->from_user_id,
                        "amount" => (float)$request->amount,
                        "trans_id" => $trans_id,
                        "cgst" => 0,
                        "sgst" => 0,
                        "ledger_type" => 5,
                        "wallet_type" => 3,
                        "trans_from" => 'Wallet',
                        "description" => $data->amount.' Points Transfer From '.$data->fromUser->name??''
                    ]); 

                    if($check2["status"] ==  "success") {

                        // Helper::sendPushNotification(Auth()->user()->fcm_token, 'test', 'msg');
                        FundRequest::where('id', $request->id)->update(["status" => "Approved", "points" => (float)$data->amount]);
                        return ['status' => 'success', 'message' => 'Transaction '.$request->status.' successfully.', 'data' => ['id' => $data->id, 'status' => $data->status]];
                    } else {
                        return ['status' => 'error', 'message' => 'Transaction failed.'];
                    }
                } else {
                    return ['status' => 'error', 'message' => 'Transaction failed.'];
                }

                return ['status' => 'error', 'message' => 'Transaction failed.'];
               
            } else {
                return ['status' => 'error', 'message' => 'Transaction failed.'];
            }
        } else {
            return ['status' => 'error', 'message' => 'invalid transaction.'];
        }
    }

    
    public function send_money(Request $request, User $user)
    {
        $userInfo = $user->where('id', Auth()->user()->id)->first();

        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            $device = 'android';
            return view('front.account.send-money',compact('userInfo','device'));
        } else {
            $device = 'pc';
            return view('front.account.send-money',compact('userInfo','device'));
        }
    }


    public function validate_send_money(Request $request, User $user)
    {
        $userInfo = $user->where('id', Auth()->user()->id)->first();

        $data = json_decode($request->qr_data);
        $vendorData = $user->where('phone_number', $data->phone_number)->first();

        if($vendorData){
            return [
                "status" => "success",
                "data" => ["name" => $vendorData->name, "phone_number" => $vendorData->phone_number],
             ];
        } else {
            return [
                "status" => "error",
                "data" => [],
             ];
        }
    }


    public function send_moneys(Request $request, User $user, FundRequest $fundrequest)
    {
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        $vendorInfo = $user->where('phone_number', $request->phone_number)->first();

        if($userInfo && $vendorInfo) {

            $response = $fundrequest->create([
                            'from_user_id' => $userInfo->id,
                            'to_user_id' => $vendorInfo->id,
                            'bank_id' => '0',
                            'wallet_type' => 'DMT',
                            'mode' => 'QR',
                            'trans_id' => Helper::getTransId(2),
                            'amount' => (float)$request->amount,
                            'status' => 'Pending',
                        ]);

            if($response) {
                return ['status' => 'success', 'msg' => 'Pay Successfully.', 'data'=>  $response->id];
            } 
        } 

        return ['status' => 'error', 'msg' => 'Pay Failed.', 'data'=> ''];
    }


    public function send_money_status(Request $request, User $user, FundRequest $fundrequest)
    {
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        $data = $fundrequest->where('id', $request->id)->first();
        return view('front.account.send-money-status',compact('userInfo','data'));
    }


    public function receive_money(Request $request, User $user)
    {
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        return view('front.account.receive-money',compact('userInfo'));
    }

    public function amount_to_point(Request $request, User $user, Userwallet $userwallet, Tariff $tariff)
    {
        $walletData = $userwallet->where('user_id', Auth()->user()->id)->first();
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        $tariffData = $tariff->orderBy('amount', 'asc')->get();
        return view('front.account.amount-to-point',compact('userInfo','walletData','tariffData'));
    }


    public function amount_to_points(Request $request, FundRequest $fundrequest, Tariff $tariff)
    {
        $request->validate([
            'amount'       => 'required|numeric|min:10',
            'point'       => 'nullable|numeric|min:0'
        ]);

        $tariffData = $tariff->where('amount', (float)$request->amount)->first();
        
        if($request->point <= 0 && !$tariffData) {
            $request->point = $request->amount*config('app.coin_in_inr', 1);
        }

        if($request->point <= 0 && $tariffData){
            $request->point = $tariffData->points;
        }

        $trans_id = Helper::getTransId(3);

        $check = Helper::debit_ledger([
                            "user_id" => Auth()->user()->id,
                            "refrence_id" => Auth()->user()->id,
                            "amount" => (float)$request->amount,
                            "trans_id" => $trans_id,
                            "cgst" => 0,
                            "sgst" => 0,
                            "ledger_type" => 20,
                            "wallet_type" => 1,
                            "trans_from" => 'Wallet',
                            "description" => 'Purchase Point.'
                        ]); 


        if($check["status"] ==  "success") {

            $check2 = Helper::creadit_ledger([
                "user_id" => Auth()->user()->id,
                "refrence_id" => Auth()->user()->id,
                "amount" => (float)$request->point,
                "trans_id" => $trans_id,
                "cgst" => 0,
                "sgst" => 0,
                "ledger_type" => 5,
                "wallet_type" => 2,
                "trans_from" => 'Wallet',
                "description" => 'Purchase Point.'
            ]); 

            if($check["status"] ==  "success") {
                return redirect('amount-to-points')->with('success', 'Purchase Point successfully.');
            } else {
                return redirect('amount-to-points')->with('success', $check["message"]);
            }
        } else {
            return redirect('amount-to-points')->with('success', $check["message"]);
        }

        return redirect('amount-to-points')->with('success', 'Point Not Purchase.');
    }



    public function purchase_point_history(Request $request, Ledger $ledger) {

        $data = $ledger->where('user_id', Auth()->user()->id)->where('ledger_type', 'INR TO POINT')->latest()->paginate(10);

        if ($request->ajax()) {
            return view('front.account.pagination.purchase-point-history-list',compact('data'));
        }

        return view('front.account.purchase-point-history-list', compact('data'));
    }


    public function fund_request_list(Request $request,FundRequest $fundrequest) {

        $data = $fundrequest->where('from_user_id', Auth()->user()->id)->where('request_for', 'Admin')->latest()->paginate(10);

        if ($request->ajax()) {
            return view('front.account.pagination.fund-request-list',compact('data'));
        }

        return view('front.account.fund-request-list', compact('data'));
    }

    public function withdraw_request(Request $request, User $user, Userwallet $userwallet, UserBankDetail $userbankdetail)
    {
        $walletData = $userwallet->where('user_id', Auth()->user()->id)->first();
        $bankInfo = $userbankdetail->where('user_id', Auth()->user()->id)->first();
        return view('front.account.withdraw-request',compact('walletData','bankInfo'));
    }


    public function withdraw_requests(Request $request, User $user, UserBankDetail $userbankdetail)
    {
        $request->validate([
            // 'user_id'      => 'required|exists:users,id',
            // 'referral_id'  => 'nullable|exists:users,id',
            // 'bank_id'      => 'nullable|exists:banks,id',
            // 'wallet_type'  => 'required|in:main,bonus',
            // 'mode'         => 'required|in:bank_transfer,upi',
            // 'utr_no'       => 'nullable|string|max:50',
            'amount'       => 'required|numeric|min:100',
            // 'trans_id'     => 'required|string|max:100|unique:withdraw_requests,trans_id',
            'remark'         => 'nullable|string|max:500',
            // 'admin_reply'  => 'nullable|string|max:500',
            // 'status'       => 'required|in:pending,approved,rejected',
        ]);

        $userInfo = $user->where('id', Auth()->user()->id)->first();
        $bankInfo = $userbankdetail->where('user_id', Auth()->user()->id)->first();
        $trans_id = Helper::getTransId(3);

        $check = Helper::debit_ledger([
                    "user_id" => auth()->user()->id,
                    "refrence_id" => $userInfo->referral_id,
                    "amount" => (float)$request->amount,
                    "trans_id" => $trans_id,
                    "cgst" => 0,
                    "sgst" => 0,
                    "ledger_type" => 17,
                    "wallet_type" => 1,
                    "trans_from" => 'Wallet',
                    "description" => $request->amount.' Withdrawal Successfully.'
                ]); 

        if($check["status"] ==  "success") {
            $fundRequest = WithdrawRequest::create([
                "user_id" => auth()->user()->id,
                "referral_id" => $userInfo->referral_id,
                "bank_id" => $bankInfo->id,
                "wallet_type" => 'MAIN',
                "mode" => 'SAME BANK FUND TRANSFER',
                "utr_no" => '0',
                "trans_id" => $trans_id,
                "amount" => (float)$request->amount,
                "desc" => $request->remark??'',
                "status" => 'Pending'
            ]);
            return redirect('withdraw-request-list')->with('success', 'Withdraw request submitted successfully.');
        } else {
            return ['status' => 'error', 'message' => 'Transaction failed.'];
        }
    }



    public function withdraw_request_list(Request $request,WithdrawRequest $withdrawrequest) {

        $data = $withdrawrequest->where('user_id', Auth()->user()->id)->latest()->paginate(10);
        if ($request->ajax()) {
            return view('front.account.pagination.withdraw-request-list',compact('data'));
        }
        return view('front.account.withdraw-request-list', compact('data'));
    }



    public function pool_ledger(Request $request,PoolRequest $poolrequest) {

        $data = $poolrequest->where('user_id', Auth()->user()->id)->latest()->paginate(10);
        if ($request->ajax()) {
            return view('front.account.pagination.pool-request-list',compact('data'));
        }
        return view('front.account.pool-request-list', compact('data'));
    }




    public function static_content(Request $request, StaticContent $staticcontent)
    {
        $urlName = $request->path();
        $title = '';
        $name = '';
        $desc = '';
        $data = $staticcontent->where('sc_for','Website')->orWhere('sc_for','Both')->where('sc_type', $urlName)->where('sc_status', 'Active')->first();

        if($data) {
            $title = $data->sc_title;
            $name = $data->sc_name;
            $desc = $data->sc_desc;
        } else {
            return back();
        }

        return view('front.static-content-page',compact('title', 'name', 'desc'));
    }





    public function get_state(Request $request, State $state)
    {
        return $state->findByActiveCountry($request->id);
    }


    public function get_city(Request $request, Citie $citie)
    {
        return $citie->findByActiveState($request->id);
    }





    // public function apply_coupon_code(Request $request, Coupon $coupon)
    // {
    //     if(Auth()->check())
    //     {

    //         $cup = $coupon->where('publish', 'Yes')->where('code', $request->coupon_code)->where('unused', '>', '0')->orderBy('id', 'desc')->first(); 

    //         if($cup)
    //         {
    //             if($cup->end_date < DATE_FORMAT(NOW(), '%Y/%m/01'))
    //             {
    //                 return [
    //                     "status" => "error",
    //                     "msg" => "this coupon code is expired."
    //                 ];
    //             } 

    //             if((float)$cup->min_order_amt <= (float)$request->order_amount)
    //             {
    //                 Cookie::queue('coupon', json_encode($cup), 100);

    //                 return [
    //                     "status" => "success",
    //                     "msg" => "Coupon code applied successfully."
    //                 ];
    //             }

    //             if((float)$cup->min_order_amt > (float)$request->order_amount) 
    //             {
    //                 return [
    //                     "status" => "error",
    //                     "msg" => "Apply minimum order Rs.".$cup->min_order_amt."/- rule before coupon discount."
    //                 ];
    //             }
    //         }
    //     }


    //     return [
    //         "status" => "error",
    //         "msg" => "this coupon code is Invalid."
    //     ];
    // }



    // public function rmeove_coupon_code(Request $request)
    // {

    //     Cookie::queue(Cookie::forget('coupon'));
    //     Cookie::forget('coupon');

    //     return [
    //         "status" => "success",
    //         "msg" => "Coupon code removed successfully."
    //     ];
    // }







    // public function view_bill($code, CartItem $cartitem, Cart $cart)
    // {
    //     $order_code = base64_decode($code);
        
    //     if($order_code != '')
    //     {
    //         $user_order = $cart
    //                         ->leftJoin('users', 'cart.user_id', 'users.id')
    //                         ->where('cart.order_code', $order_code)
    //                         ->select('users.*', 'cart.*')->first();

    //         if($user_order)
    //         {   
    //             $user_order->{'cart_item'} = $cartitem->where('cart_id', $user_order->id)->get();
    //             return view('front/view_bill',compact('user_order'));
    //         }
    //     }

    //     return back();
    // }


    
    // public function download_invoice($code, CartItem $cartitem, Cart $cart)
    // {
    //         $order_code = base64_decode($code);

    //         if($order_code != '')
    //         {
    //             $user_order = $cart
    //                         ->leftJoin('users', 'cart.user_id', 'users.id')
    //                         ->where('cart.order_code', $order_code)
    //                         ->select('users.*', 'cart.*')->first();  

    //             if($user_order)
    //             {   
    //                 $pdf = PDF::loadView('front/pdf_view_bill',compact('user_order'))->setPaper('A4');
    //                 return $pdf->download($order_code.'.pdf');
    //             }
    //         }

    //     return back();
    // }



    public function find_user_name(Request $request, User $user, Userwallet $userwallet)
    {
        $data =  $user->where('reg_code', $request->referral_code)->orWhere('phone_number', $request->referral_code)->first();

        if($data)
        {   
            $walletData = $userwallet->where('user_id', $data->id)->first();
            return [
                    'status' => 'success', 
                    'msg' => 'referral code.', 
                    'name' => $data->name,
                    'dmt_balance' => number_format($walletData->dmt_balance,2),
                    'main_balance' =>  number_format($walletData->main_balance,2)
                ];
        }

        return [
            'status' => 'error', 
            'msg' => 'invalid referral code.', 
            'name' => '',
            'dmt_balance' => '',
            'main_balance' => ''
        ];
    }



    public function add_money(Request $request, User $user, UserWallet $userwallet)
    {
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        $wallet_data = $userwallet->where('user_id', Auth()->user()->id)->first();
        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            $device = 'android';
            return view('front.account.add-money',compact('userInfo','device','wallet_data'));
        } else {
            $device = 'pc';
            return view('front.account.add-money',compact('userInfo','device','wallet_data'));
        }
    }
    

    public function add_moneys(Request $request, FundRequest $fundrequest, Tariff $tariff)
    {
       
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'utr_or_transaction_no' => 'required|string|max:191',
            'remark' => 'nullable|string|max:1000',
            'transaction_image' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        // Prepare directory path
        $uploadPath = public_path('images/fund_requests');

        // Make sure the folder exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Initialize file paths
        $frontPath = $backPath = $panPath = null;
        $frontName = '';
        // Rename and move each file if it exists
        if ($request->hasFile('transaction_image')) {
            $frontFile = $request->file('transaction_image');
            $frontName = $request->utr_or_transaction_no. '_' . time() . '.' . $frontFile->getClientOriginalExtension();
            $frontFile->move($uploadPath, $frontName);
        }

        $fundRequest = FundRequest::create([
            "from_user_id" => auth()->user()->id,
            "to_user_id" => 1,
            "wallet_type" => 'MAIN',
            "mode" => 'Bank Transfer',
            "utr_img" => $frontName,
            "utr_no" => $request->utr_or_transaction_no,
            "request_for" => 'Admin',
            "amount" => (float)$request->amount,
            "points" => 0,
            "desc" => $request->remark??''
        ]);

        return redirect('add-money')->with('success', 'add money request send successfully.');
    }


    public function add_money_online(Request $request, User $user, UserWallet $userwallet)
    {
        $userInfo = $user->where('id', Auth()->user()->id)->first();
        $wallet_data = $userwallet->where('user_id', Auth()->user()->id)->first();

        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            $device = 'android';
            return view('front.account.add-money-online',compact('userInfo','device','wallet_data'));
        } else {
            $device = 'pc';
            return view('front.account.add-money-online',compact('userInfo','device','wallet_data'));
        }
    }



    public function pool_info($id, Request $request,Pool $pool, PoolRequest $poolrequest, PoolCommission $poolcommission) {
        
        $poolData = $pool->where('id', $id)->first();

        // if(!$poolData) {
        //      return redirect('home')->with('error', 'Pool Info Not found.');
        // }

        $query = $poolrequest->leftJoin('wallet', 'pool_requests.user_id', '=', 'wallet.user_id')
                    ->where('pool_requests.pool_id', $id)
                    ->select('wallet.*', 'pool_requests.*'); 

        if ($poolData->status == 'Open' && $poolData->for == 'User') {
            $query->orderBy('wallet.dmt_balance', 'desc');
        } else if ($poolData->status == 'Open' && $poolData->for == 'Vendor') {
            $query->orderBy('wallet.aeps_balance', 'desc');
        } else {
            $query->orderByRaw("CASE WHEN pool_requests.win_level = 0 THEN 1 ELSE 0 END, pool_requests.win_level ASC");
        }

        $data = $query->paginate(10);

        $poolcomm = $poolcommission->where('pool_id', $poolData->id)->orderBy('level', 'asc')->get();

        if ($request->ajax()) {
            return view('front.account.pagination.pool-user-list',compact('poolData','data','id','poolcomm'));
        }
        return view('front.account.pool-user-list', compact('poolData','data','id','poolcomm'));
    }


    public function support_list(Request $request, Support $support) {
        $data = $support->where('user_id', Auth()->user()->id)->latest()->paginate(10);
        if ($request->ajax()) {
            return view('front.account.pagination.support-list',compact('data'));
        }
        return view('front.account.support-list', compact('data'));
    }



    public function support_view($id, Request $request, Support $support, SupportReply $supportreply)
    {
        $code = base64_decode($id);
        $supportInfo = $support->where('code', $code)->where('user_id', Auth()->user()->id)->first();
     
        if(!$supportInfo) {
            return back()->with('success', 'Invalid support info.');;
        }

        $supportreplyInfo = $supportreply->where('support_id', $supportInfo->id)->get();

        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            $device = 'android';
            return view('front.account.support-view',compact('supportInfo','supportreplyInfo','device'));
        } else {
            $device = 'pc';
            return view('front.account.support-view',compact('supportInfo','supportreplyInfo','device'));
        }
    }


    public function support_create(Request $request, Support $support)
    {
        if (preg_match('/Mobile|Android|iPhone|iPad/i', $this->user_agent)) {
            $device = 'android';
            return view('front.account.support-create',compact('device'));
        } else {
            $device = 'pc';
            return view('front.account.support-create',compact('device'));
        }
    }


    public function support_creates(Request $request, Support $support, SupportReply $supportreply)
    {

        $request->validate([
            'support_for' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        DB::beginTransaction();

        try {


            // Prepare directory path
            $uploadPath = public_path('images/support_file');

            // Make sure the folder exists
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Initialize file paths
            $frontPath = $backPath = $panPath = null;
            $frontName = null;
            // Rename and move each file if it exists
            if ($request->hasFile('file')) {

                $request->validate([
                    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10048',
                ]);

                $frontFile = $request->file('file');
                $frontName = Auth()->user()->reg_code.'_' . time() . '.' . $frontFile->getClientOriginalExtension();
                $frontFile->move($uploadPath, $frontName);
            }

            $support = Support::create([
                'for' => $request->support_for,
                'user_id' => Auth()->user()->id,
                'subject' => $request->title
            ]);

            SupportReply::create([
                'support_id' => $support->id,
                'user_id' => Auth()->user()->id,
                'description' => $request->description,
                'type' => 'User',
                'file' => $frontName
            ]);

            DB::commit();

            $code = base64_encode($support->code);

            return redirect('support-view/'.$code)->with('success', 'Request send successfully.')->withInput();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('support-create')->with('error', 'Request not send.')->withInput();
        }
      
    }

    
    public function support_reply($id, Request $request, Support $support, SupportReply $supportreply) {

        $request->validate([
            'message' => 'nullable|string',
        ]);

        $supportInfo = $support->where('id', $request->id)->first();
     
        if($supportInfo) {

            $frontName = null;
            if ($request->hasFile('file')) {
                $request->validate([
                    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
                ]);
                $file = $request->file('file');
                $frontName = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('images/support_file/'), $frontName);
            }
        
            $supportreply->create([
                'support_id' => $supportInfo->id,
                'user_id' => Auth()->user()->id,
                'description' => $request->message,
                'type' => 'User',
                'file' => $frontName
            ]); 
        }

    
        $supportreplyInfo = $supportreply->where('support_id', $supportInfo->id)->get();

        $html = view('front.account.partials._chat_list', compact('supportreplyInfo'))->render();

        return response()->json(['success' => true, 'html' => $html]);
    }



    public function update_fcm_token(Request $request)
    {
        try {
            
            if(!empty(Auth()->user()->id)){
                User::where('id', Auth()->user()->id)->update([
                    'fcm_token' => $request->token
                ]); 
                return true;               
            }

            return false;
        } catch (Exception $e) {
            return false;
        }

 
        
    }

}
