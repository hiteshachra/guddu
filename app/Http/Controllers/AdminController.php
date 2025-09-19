<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Town;
use App\Models\User;
use App\Models\Pool;
use App\Models\Citie;
use App\Models\State;
use App\Models\Ledger;
use App\Models\Coupon;
use App\Models\Banner;
use App\Models\UserKyc;
use App\Models\Support;
use App\Models\UserWallet;
use App\Models\PoolRequest;
use App\Models\FundRequest;
use App\Models\UserAddress;
use App\Models\SupportReply;
use App\Models\OnlinePayment;
use App\Models\StaticContent;
use App\Models\UserBankDetail;
use App\Models\WithdrawRequest;
use Carbon\Carbon;
use DB;
use PDF;
use Auth;
use Hash;
use Helper;
use Cookie;
use Razorpay;
use Validator;

class AdminController extends Controller
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
    public function index(Request $request, User $user, UserWallet $userwallet, Ledger $ledger)
    {

        $poolCount = Pool::count();
        $userTotalCount = $user->count();
        $walletTotalBal = $userwallet->sum('main_balance');
        $coinTotalBal = $userwallet->sum('dmt_balance');
        $topReferrers = $user->select('*','referral_id', DB::raw('COUNT(*) as total_referrals'))
                        ->whereNotNull('referral_id')
                        ->groupBy('referral_id')
                        ->orderByDesc('total_referrals')
                        ->take(10)
                        ->get();

        $ledgerData = $ledger->selectRaw('SUM(cramount) AS cr, SUM(dramount) AS dr')->where('bal_type', 'DMT')->first();

        $topWinners = PoolRequest::with('users')
            ->where('win_amount', '>', 0)
            ->orderByDesc('win_amount')
            ->limit(10)
            ->get();

            $topWinnersChart['labels'] = [];
            $topWinnersChart['data'] = [];
            $topWinnersChart['colors'] = [];

            foreach ($topWinners as $winner) {
                $topWinnersChart['labels'][] = $winner->users->reg_code??'';
                $topWinnersChart['data'][] = $winner->win_amount;

                // Assign color based on role
                $role = $winner->users->role ?? '3';

                switch ($role) {
                    case '2':
                        $topWinnersChart['colors'][] = 'rgba(40, 167, 69, 1)'; // green
                        break;
                    case '1':
                        $topWinnersChart['colors'][] = 'rgba(255, 165, 0)'; // yellow
                        break;
                    case '3':
                        $topWinnersChart['colors'][] = 'rgba(255, 22, 22, 1)'; // red
                        break;
                    default:
                        $topWinnersChart['colors'][] = 'rgba(255, 165, 0)'; // green
                }
            }


            $roleCounts = DB::table('users')
                ->join('user_role', 'users.role', '=', 'user_role.id')
                ->select('user_role.role_name as role_name', 'role', DB::raw('COUNT(users.id) as count'))
                ->groupBy('user_role.role_name')
                ->get();

            $roleCountChart['labels'] = $roleCounts->pluck('role_name');
            $roleCountChart['data'] = $roleCounts->pluck('count');
            $roleCountChart['colors'] = $roleCounts->pluck('role')->map(function ($role) {
                return match($role) {
                    1 => '#FFA500',
                    2 => '#28A745',
                    3 => '#FF1616',
                    default => '#FFA500',
                };
            });

            $kycStatusCounts = UserKyc::select('status', DB::raw('COUNT(*) as count'))
                ->groupBy('status')
                ->get();

            $kycStatusChart['labels'] = $kycStatusCounts->pluck('status');
            $kycStatusChart['data'] = $kycStatusCounts->pluck('count');
            $colors = [
                'Pending' => '#f9c74f',
                'Verified' => '#43aa8b',
                'Reject' => '#f94144',
                'Submitted' => '#577590'
            ];
            $kycStatusChart['colors']  = $kycStatusChart['labels']->map(fn($status) => $colors[$status] ?? '#adb5bd');

            //bank
            $bankStatusCounts = UserBankDetail::select('status', DB::raw('COUNT(*) as count'))
                ->groupBy('status')
                ->get();

            $bankStatusChart['labels'] = $bankStatusCounts->pluck('status');
            $bankStatusChart['data'] = $bankStatusCounts->pluck('count');
            $colors = [
                'PENDING' => '#f9c74f',
                'VERIFIED' => '#43aa8b',
                'REJECT' => '#f94144',
                'SUBMITED' => '#577590'
            ];
            $bankStatusChart['colors']  = $bankStatusChart['labels']->map(fn($status) => $colors[$status]??'#adb5bd');



            $fundStatusCounts = FundRequest::select('status', DB::raw('COUNT(*) as count'))
                ->groupBy('status')
                ->get();

            $fundStatusChart['labels'] = $fundStatusCounts->pluck('status');
            $fundStatusChart['data'] = $fundStatusCounts->pluck('count');

            $colors = [
                'Pending' => '#f9c74f',
                'Approved' => '#43aa8b',
                'Rejected' => '#f94144'
            ];

            $fundStatusChart['colors'] = $fundStatusChart['labels']->map(fn($status) => $colors[$status] ?? '#adb5bd');


            $last10Pools = Pool::orderByDesc('id')->limit(10)->get();

            $poolsChart['labels'] = $last10Pools->map(fn($pool) => 'P-' . $pool->id);
            $poolsChart['data'] = $last10Pools->pluck('amount');

            $poolsChart['colors'] = $last10Pools->map(function ($pool) {
                return $pool->for === 'Vendor' ? '#f94144' : '#43aa8b';
            });


        return view('dashboard.dashboard',compact('poolCount','userTotalCount','walletTotalBal','coinTotalBal','topReferrers','topWinnersChart','roleCountChart','kycStatusChart','bankStatusChart','fundStatusChart','poolsChart'));
    }
    
    public function index_two()
    {
        return view('dashboard.dashboard');
    }
    
    public function fund_transfer()
    {
        return view('fund.transfer');
    }

    public function fund_transfers(Request $request, User $user, UserWallet $userwallet)
    {

        $request->validate([
            'ledger_type'   => 'required|in:1,2',
            'wallet_type'   => 'required|in:DMT,MAIN',
            'phone_number'  => 'required|digits:10|exists:users,phone_number',
            'user_name'     => 'required|string|max:255',
            'amount'        => 'required|numeric|min:1|max:1000000000',
            'remark'        => 'required|string',
        ]);

        $sendUser = $user->where('phone_number', $request->phone_number)->where('status', 'Active')->first();
        $walletBal = $userwallet->where('user_id', $sendUser->id)->first();

        if(!$sendUser || !$walletBal){
            return back()->withErrors(['phone_number' => 'User Info Not Found.'])->withInput();  
        }
        if($sendUser->phone_number == auth()->user()->phone_number){
            return back()->withErrors(['phone_number' => 'Same account not transfer amount.'])->withInput();
        }
        if(auth()->user()->role != 1){
            return back()->withErrors(['phone_number' => 'not access transfer amount.'])->withInput();
        }

      
        $trans_id = Helper::getTransId(3);
        $wallet_type = $request->wallet_type == 'MAIN'?1:2;

        if($request->ledger_type == 2){
            
            if($request->wallet_type == 'DMT') {
                if((float)$walletBal->dmt_balance < $request->amount) {
                    return back()->withErrors(['points' => 'points amount is low.'])->withInput();  
                }
            } else if($request->wallet_type == 'MAIN') {
                if((float)$walletBal->main_balance < $request->amount) {
                    return back()->withErrors(['main_balance' => 'main balance is low.'])->withInput();
                }
            }

            $check = Helper::debit_ledger([
                "user_id" => $sendUser->id,
                "refrence_id" => auth()->user()->id,
                "amount" => (float)$request->amount,
                "trans_id" => $trans_id,
                "cgst" => 0,
                "sgst" => 0,
                "ledger_type" => (int)$request->ledger_type,
                "wallet_type" => $wallet_type,
                "trans_from" => 'Wallet',
                "description" => $request->remark
            ]); 
            
            if($check["status"] ==  "success") {
                return redirect('fund/transfer')->with('success', 'Fund transfer successfully.');
            } else {
                return redirect('fund/transfer')->with('error', $check["message"]);
            }
        }

        if($request->ledger_type == 1){
            $check = Helper::creadit_ledger([
                "user_id" => $sendUser->id,
                "refrence_id" => auth()->user()->id,
                "amount" => (float)$request->amount,
                "trans_id" => $trans_id,
                "cgst" => 0,
                "sgst" => 0,
                "ledger_type" => (int)$request->ledger_type,
                "wallet_type" => $wallet_type,
                "trans_from" => 'Wallet',
                "description" => $request->remark
            ]);  
            if($check["status"] ==  "success") {
                return redirect('fund/transfer')->with('success', 'Fund transfer successfully.');
            } else {
                return redirect('fund/transfer')->with('error', $check["message"]);
            }
        }

        return redirect('fund/transfer')->with('error', 'Fund not transfer.');
    }

    public function fund_transfer_list(Ledger $ledger)
    {   
        $ledgerData = $ledger->whereIn('ledger_type', ['WALLET CREDIT ADMIN','WALLET DEBIT BY ADMIN'])->latest()->get();
        return view('fund.transfer-list', compact('ledgerData'));
    }

    public function fund_request_list(FundRequest $fundrequest)
    {   
        $data = $fundrequest->where('to_user_id', auth()->user()->id)->where('request_for', 'Admin')->latest()->get();
        return view('fund.request-list', compact('data'));
    }

    public function fund_request_update($status, $id, Request $request, FundRequest $fundrequest)
    {   
        $data = $fundrequest->where('to_user_id', auth()->user()->id)->where('request_for', 'Admin')->where('id',$id)->first();

        if($data && $status == 'verify') {

            if((float)$data->amount <= 0) {
                return redirect('fund/request-list')->with('error', 'Fund Not update. amount greater than balance! '.$data->amount);
            }
            // if((float)$data->points <= 0) {
            //     return redirect('fund/request-list')->with('error', 'Fund Not update. points greater than balance! '.$data->points);
            // }   
            $wallet_type = 0;
            if($data->wallet_type == "MAIN") {
                $wallet_type = 1;
            }
            if($data->wallet_type == "DMT") {
                $wallet_type = 2;   
            }
            if($wallet_type == 0) {
                return redirect('fund/request-list')->with('error', 'Invalid request!'); 
            }
            
            $trans_id = Helper::getTransId(3);
            $check = Helper::creadit_ledger([
                "user_id" => $data->from_user_id,
                "refrence_id" => auth()->user()->id,
                "amount" => (float)$data->amount,
                "trans_id" => $trans_id,
                "cgst" => 0,
                "sgst" => 0,
                "ledger_type" => 18,
                "wallet_type" => $wallet_type,
                "trans_from" => 'Wallet',
                "description" => 'Fund Request Approved'
            ]);  
            if($check["status"] ==  "success") {
               $fundrequest->where('id', $id)->update([
                    "status" => "Approved",
                    "remark" => $request->remarks,
                    "trans_id" => $trans_id
                ]);
                return redirect('fund/request-list')->with('success', 'Fund Approved successfully.');
            } else {
                return redirect('fund/request-list')->with('error', $check["message"]);
            }

        } else if($data && $status == 'reject') {
            $fundrequest->where('id',$id)->update([
                "status" => "Rejected"
            ]);
            return redirect('fund/request-list')->with('success', 'Fund Rejected successfully.');
        } else {
            return redirect('fund/request-list')->with('error', 'Fund Not update.');
        }
    }


    public function support_list($status, Support $support)
    {   
        $data = $support->where('status', $status)->latest()->get();
        return view('support.support-list', compact('data'));
    }




    public function support_reply($id, Request $request, Support $support, SupportReply $supportreply)
    {
        $code = base64_decode($id);

        $supportInfo = $support->where('code', $code)->first();
     
        if(!$supportInfo) {
            return back()->with('success', 'Invalid support info.');;
        }

        $supportreplyInfo = $supportreply->where('support_id', $supportInfo->id)->get();
        return view('support.support-view',compact('supportInfo','supportreplyInfo'));
    }
    

    public function support_close($id, Request $request, Support $support)
    {
        $code = $id;

        $supportInfo = $support->where('code', $code)->first();
  
        if(!$supportInfo) {
            return redirect('support/support-list/Open')->with('error', 'Invalid support info.');
        }

        $support->where('code', $code)->update(['status' => 'Closed']);
        return redirect('support/support-list/Open')->with('success', 'Closed successfully.');
    }
    

    public function support_replys($id, Request $request, Support $support, SupportReply $supportreply) {

        $request->validate([
            'message' => 'nullable|string',
        ]);

        $supportInfo = $support->where('id', $id)->first();
     
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
                'type' => 'Admin',
                'file' => $frontName
            ]); 
        }

    
        $supportreplyInfo = $supportreply->where('support_id', $supportInfo->id)->get();

        $html = view('support._chat_list', compact('supportInfo', 'supportreplyInfo'))->render();

        return response()->json(['success' => true, 'html' => $html]);
    }


    public function withdraw_list($status, WithdrawRequest $withdrawrequest)
    {   
        $data = $withdrawrequest->where('status', $status)->latest()->get();
        return view('withdraw.withdraw-list', compact('data'));
    }


    public function withdraw_request_update($status, $id, Request $request, WithdrawRequest $withdrawrequest, Ledger $ledger)
    {   
        $data = $withdrawrequest->where('id',$id)->first();

        if($data->status != 'Pending') {
              return back()->with('error', 'withdraw Already Update');
        }

        if($data && $status == 'verify') {
                if($request->utr_no == '') {
                    return back()->with('error', 'Please Enter UTR/TXN No');
                }

                $withdrawrequest->where('id',$id)->update([
                    "status" => "Approved",
                    "utr_no" => $request->utr_no,
                    "admin_reply" => $request->remarks
                ]);

                return back()->with('success', 'withdraw approved successfully.');
        

        } else if($data && $status == 'reject') {
            
            $dataL = $ledger->where('trans_id', $data->trans_id)->where('user_id', $data->user_id)->first();

            $withdrawrequest->where('id',$id)->update([
                "status" => "Canceled",
                "utr_no" => $request->utr_no,
                "admin_reply" => $request->remarks
            ]);
            if($dataL) {
                $check = Helper::creadit_ledger([
                    "user_id" => $data->user_id,
                    "refrence_id" => auth()->user()->id,
                    "amount" => (float)$data->dramount,
                    "trans_id" => $data->trans_id,
                    "cgst" => 0,
                    "sgst" => 0,
                    "ledger_type" => 21,
                    "wallet_type" => 1,
                    "trans_from" => 'Wallet',
                    "description" => $request->remarks
                ]);  
                if($check["status"] ==  "success") {
                    return back()->with('success', 'withdraw Canceled successfully.');
                } else {
                    return back()->with('error', $check["message"]);
                }
            }
    
            return back()->with('success', 'withdraw Canceled successfully.');
        } else {
            return back()->with('error', 'withdraw Not update.');
        }
    }


}
