<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Town;
use App\Models\User;
use App\Models\Pool;
use App\Models\Tariff;
use App\Models\Banner;
use App\Models\Market;
use App\Models\UserKyc;
use App\Models\UserBankDetail;
use App\Models\Ledger;
use App\Models\UserWallet;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;
use DB;
use Helper;

class UserController extends Controller
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
    public function add_user(User $user)
    {
        return view('users.users-create');
    }

    public function user_create(Request $request, User $user, UserWallet $userwallet, Market $market, UserKyc $userkyc, UserBankDetail $userbankdetail, UserAddress $useraddress)
    {
        $request->merge(['reg_code' => config('app.shortname').rand(0000000,9999999)]);
        $referral = (string)request()->referral_code;
        $user = User::where('reg_code', $referral)->first();
        request()->merge(['referral_id' => $user->id??1]);

        $request->validate([
            'reg_code' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|unique:users|regex:/^[6-9]\d{9}$/',
            'role' => 'required|integer|in:2,3,4',
            'password' => 'required|min:8|confirmed',
            'referral_id' => 'required|exists:users,id',
        ],[
            'role.in' => 'Select valid role.',
            'phone.regex' => 'Enter valid phone number.',
        ]);

        // $referral_id = 1;

        $check = User::create([
            'reg_code' => $request->reg_code,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'parent_id' => $request->referral_id,
            'referral_id' => $request->referral_id,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);


        if($check) {

            $userwallet->create(['user_id' => $check->id]);
            $userkyc->create(['user_id' => $check->id]);
            $market->create(['user_id' => $check->id]);
            $userbankdetail->create(['user_id' => $check->id]);
            $useraddress->create(['user_id' => $check->id]);
           
           Helper::creadit_ledger([
                    "user_id" => $request->referral_id,
                    "refrence_id" => $check->id,
                    "amount" => 100.00,
                    "trans_id" => Helper::getTransId(3),
                    "cgst" => 0,
                    "sgst" => 0,
                    "ledger_type" => 15,
                    "wallet_type" => 2,
                    "trans_from" => 'Wallet',
                    "description" => '100.00 Points Received For Referral '.$request->reg_code
                ]); 
                           
            if($request->role == 2) {
                Helper::creadit_ledger([
                                        "user_id" => $check->id,
                                        "refrence_id" => $request->referral_id,
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

            return back()->with('success','User Create Successfully.');
        } 
    
        return back()->with('error', 'User Not Create.');
    }

    public function user_list(User $user)
    {
        $users = $user->orderBy('id','desc')->get();

        return view('users.users-list',compact('users'));
    }






    public function user_edit($id, User $user)
    {
        $single_data = $user->find($id);

        if(!$single_data) {
            return back()->with('error', 'User Not Found.');
        }
        // if($single_data->id == 1) {
        //     return back()->with('error', 'User Not Found.');
        // }
        return view('users.users-update',compact('single_data'));
    }




    public function user_update($id, Request $request, User $user)
    {
         $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|integer',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone_number = $validatedData['phone_number'];

        // Only update password if not null
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Only update role if the current role is not 1
        if ($user->role != 1 && isset($validatedData['role'])) {
            $user->role = $validatedData['role'];
        }

        $user->save();
        
        return back()->with('success', 'User updated successfully.');
       
    }


    public function user_status_change($id, User $user)
    {

        $single_data = $user->find($id);

        if($single_data) 
        {

            if($single_data->id == 1) {
                return back()->with('error', 'User Not Found.');
            }

            $status_name = $single_data->status == "Active"? "Inactive":"Active" ;

            $check = $user->where('id' ,$id)->update(['status' =>  $status_name]);

            if($check) {

                return back()->with('success','User Status Change Successfully');
            } 
        }
                return back()->with('error', 'User Status Not Change.');
       
    }





    public function address_list(UserAddress $useraddress)
    {
        $data = $useraddress->get();

        return view('users.users-address-list',compact('data'));
    }


    public function address_status_change($id, UserAddress $useraddress)
    {

        $single_data = $useraddress->find($id);

        if($single_data) 
        {
            $status_name = $single_data->status == "Active"? "Inactive":"Active" ;

            $check = $useraddress->where('id' ,$id)->update(['status' =>  $status_name]);

            if($check) {

                return back()->with('success','Address Status Change Successfully');
            } 
        }
                return back()->with('error', 'Address Status Not Change.');
       
    }




    public function direct_team_list(User $user)
    {
        $users = $user->orderBy('id','desc')->get();
        return view('users.direct-team-list',compact('users'));
    }


    public function level_team_list(User $user)
    {
        $allUsers = $user->get();
        $descendants = [];
        $stack = [[
            'id' => 1,    
            'level' => 0 
        ]];

        while (!empty($stack)) {
            $current = array_pop($stack);
            $children = $allUsers->where('parent_id', $current['id']);

            foreach ($children as $child) {
                $child->level = $current['level'] + 1; 
                $descendants[] = $child;
                $stack[] = [
                    'id' => $child->id,
                    'level' => $child->level
                ];
            }
        }

        $descendants = collect($descendants);
        $levelUsers = $descendants->filter(function ($user) use ($descendants) {
            return !$descendants->pluck('parent_id')->contains($user->id);
        });

        return view('users.level-team-list',compact('levelUsers'));
    }


    



    public function available_balance_list(Request $request,User $user, UserWallet $userwallet)
    {
        $walletData = $userwallet->latest()->get();
        return view('wallet.available-balance-list',compact('walletData'));
    }

    public function point_ledger_list(Request $request,User $user, Ledger $ledger)
    {
        $ledgerData = $ledger->where('bal_type','DMT')->latest()->get();
        return view('wallet.point-ledger-list',compact('ledgerData'));
    }

    public function main_ledger_list(Request $request,User $user, Ledger $ledger)
    {
        $ledgerData = $ledger->where('bal_type','MAIN')->latest()->get();
        return view('wallet.main-ledger-list',compact('ledgerData'));
    }


    public function tariff_list(Tariff $tariff)
    {
        $tariffs = $tariff->latest()->get();
        return view('tariffs.list', compact('tariffs'));
    }

    public function add_tariff()
    {
        return view('tariffs.create');
    }

    public function create_tariff(Request $request, Tariff $tariff)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'points' => 'required|numeric|min:0',
            'percentage' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:255',
        ]);

        $tariff->create($validated);

        return redirect('tariffs/list')->with('success', 'Tariff created successfully.');
    }

    public function edit_tariff($id, Tariff $tariff)
    {
        $tariffData = $tariff->where('id', $id)->first();
        return view('tariffs.edit', compact('tariffData'));
    }

    public function update_tariff($id, Request $request, Tariff $tariff)
    {
       $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'points' => 'required|numeric|min:0',
            'percentage' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:255',
        ]);

        $tariff->where('id', $id)->update($validated);

        return redirect('tariffs/list')->with('success', 'Tariff updated successfully.');
    }
    
    public function delete_tariff($id, Tariff $tariff)
    {
        $tariff->where('id', $id)->delete();
        return redirect('tariffs/list')->with('success', 'Tariff deleted successfully.');
    }


    

    public function kyc_list(UserKyc $userkyc)
    {
        $data = $userkyc
                        ->leftJoin('users', 'user_kyc.user_id', 'users.id')
                        ->select("users.name as user_name",
                                    "users.phone_number as user_phone_number",
                                    "users.email as user_email",
                                    "users.reg_code as user_code",
                                    "user_kyc.*")
                        ->orderBy('id','desc')
                        ->get();

        return view('users.users-kyc-list',compact('data'));
    }



    public function kyc_status_change(Request $request, UserKyc $userkyc)
    {
        $id = $request->id??'-';
        $single_data = $userkyc->find($id);

        if($single_data) 
        {
            $status_name = $request->status == "verify"? "Verified":"Reject" ;

            $check = $userkyc->where('id', $id)->update(['status' =>  $status_name, 'remarks' =>  $request->remarks]);

            if($check) {
                return back()->with('success','Kyc Status Change Successfully');
            } 
        }
                return back()->with('error', 'Kyc Status Not Change.');
       
    }


    public function bank_detail_list(UserBankDetail $userbankdetail)
    {
        $data = $userbankdetail
                            ->leftJoin('users', 'user_bank_details.user_id', 'users.id')
                            ->select("users.name as user_name",
                                        "users.phone_number as user_phone_number",
                                        "users.email as user_email",
                                        "users.reg_code as user_code",
                                        "user_bank_details.*")
                            ->orderBy('id','desc')
                            ->get();
                            
        return view('users.users-bank-detail-list',compact('data'));
    }
  


    public function bank_detail_status_change(Request $request, UserBankDetail $userbankdetail)
    {
        $id = $request->id??'-';
        $single_data = $userbankdetail->find($id);

        if($single_data) 
        {
            $status_name = $request->status == "verify"? "VERIFIED":"REJECT" ;

            $check = $userbankdetail->where('id', $id)->update(['status' =>  $status_name, 'admin_reply' =>  $request->remarks]);

            if($check) {
                return back()->with('success','Bank Status Change Successfully');
            } 
        }
                return back()->with('error', 'Bank Status Not Change.');
       
    }


    public function shop_detail_list(Market $market)
    {
        $data = $market
                    ->leftJoin('users', 'markets.user_id', 'users.id')
                    ->select("users.name as user_name",
                                "users.phone_number as user_phone_number",
                                "users.email as user_email",
                                "users.reg_code as user_code",
                                "markets.*")
                    ->orderBy('id','desc')
                    ->get();
                            
        return view('users.users-shop-list',compact('data'));
    }


}
