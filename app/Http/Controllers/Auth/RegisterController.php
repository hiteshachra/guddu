<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Market;
use App\Models\UserKyc;
use App\Models\UserWallet;
use App\Models\UserAddress;
use App\Models\UserBankDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Helper;
use Auth;





class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        // $var = "3";
        // dd(Helper::shortEncrypt($var));
        // $type = Helper::shortDecrypt(request()->type);
       
        $typeError = false;
        // if((int)$type != 2 && (int)$type != 3) {
        //     $typeError = true; 
              
        // }
        
        $referral = '';
        if(request()->referral != ''){
            // $referral = Helper::shortDecrypt(request()->referral);
            $referral = request()->query('referral_code');
        }
        // dd($referral);

    
        return view('auth.register',compact('typeError','referral'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $data['reg_code'] = config('app.shortname').rand(0000000,9999999);
        // $data['role'] = Helper::shortDecrypt(request()->type);
        $data['role'] = request()->role_id;
        $referral = (string)request()->referral_code;
        $user = User::where('reg_code', $referral)->first();
        $data['referral_id'] = $user->id??1;

        request()->merge(['reg_code' => $data['reg_code']]);
        request()->merge(['role' => $data['role']]);
        request()->merge(['referral_id' => $data['referral_id']]);
       
        return Validator::make($data, [
            'reg_code' => ['required', 'unique:users'],
            'phone_number' => ['required','unique:users','regex:/^[6-9]\d{9}$/'],
            'role' => ['required', 'in:2,3'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral_id' => ['required', 'exists:users,id'],
        ],[
            'role.in' => 'Select valid role.',
            'phone.regex' => 'Enter valid phone number.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $check = User::create([
            'reg_code' => $data['reg_code'],
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'parent_id' => $data['referral_id'],
            'referral_id' => $data['referral_id'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);

        if($check) {

            UserWallet::create(['user_id' => $check->id]);
            Market::create(['user_id' => $check->id]);
            UserKyc::create(['user_id' => $check->id]);
            UserBankDetail::create(['user_id' => $check->id]);
            UserAddress::create(['user_id' => $check->id]);

            Helper::creadit_ledger([
                                "user_id" => $data['referral_id'],
                                "refrence_id" => $check->id,
                                "amount" => 100.00,
                                "trans_id" => Helper::getTransId(3),
                                "cgst" => 0,
                                "sgst" => 0,
                                "ledger_type" => 15,
                                "wallet_type" => 2,
                                "trans_from" => 'Wallet',
                                "description" => '100.00 Points Received For Referral '.$data['reg_code']
                            ]); 
                
            if(request()->role == 2) {

                Helper::creadit_ledger([
                                        "user_id" => $check->id,
                                        "refrence_id" => $data['referral_id'],
                                        "amount" => 1000.00,
                                        "trans_id" => Helper::getTransId(3),
                                        "cgst" => 0,
                                        "sgst" => 0,
                                        "ledger_type" => 14,
                                        "wallet_type" => 2,
                                        "trans_from" => 'Wallet',
                                        "description" => '1000.00 Points First Login Reward '
                                    ]); 

            }

        } 
        
        return $check;
    }

    protected function redirectTo()
    {
        if (auth()->user()->role == 1) {
            return '/dashboard';
        } elseif (auth()->user()->role == 2 || auth()->user()->role == 3) {
            return '/home';
        }

        Auth::logout();
        return redirect('/login');
    }
}
