<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PoolCommission;
use App\Models\PoolRequest;
use App\Models\Ledger;
use App\Models\Pool;
use App\Models\User;
use Carbon\Carbon;
use Helper;


class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pool $pool)
    {
        $pools = $pool->where('status', '!=', 'Delete')->latest()->get();
        return view('pools.index', compact('pools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PoolCommission $poolcommission)
    {
        // $poolcomm = $poolcommission->where('status', 'Active')->get();
        return view('pools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pool $pool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'for' => 'required|string|max:255',                
            'amount' => 'required|numeric|min:10|max:100000000000',
            'win_user_count' => 'required|integer|min:1|max:20000',
            'amount_or_percentage' => 'required|array',
            'amount_or_percentage.*' => 'required|numeric',
            'start_time' => 'required|date_format:Y-m-d\TH:i|after_or_equal:now',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'distribution_type' => 'required|in:Percentage,Fix Amount',
            'status' => 'required|in:Open,Closed',
        ]);


        if ($request->distribution_type === 'Fix Amount') {
            $sum = array_sum($request->amount_or_percentage);
            if ($sum > $request->amount) {
                return back()->withInput()->withErrors(['amount' => 'The total of all fix amounts must be less than the main amount.']);
            }
        }

        $overlappingPools = Pool::where('status', 'Open')
            ->where('for', $request->for)
            ->where(function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('start_time', '<', $request->end_time)
                      ->where('end_time', '>', $request->start_time);
                });
            })
            ->exists();

        if ($overlappingPools) {
            return back()->withErrors(['start_time' => 'An active pool already exists during this time range.'])->withInput();
        }

        try {

            DB::beginTransaction();

            $pool = Pool::create($validated);

            foreach ($request->input('amount_or_percentage') as $key => $commissionData) {
                PoolCommission::create([
                    'pool_id' => $pool->id,
                    'level' => ($key+1),
                    'distribute' => $commissionData,
                ]);
            }

            DB::commit();
            return redirect('pools')->with('success', 'Pool created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('pools')->with('success', 'Pool Not created.');
        }
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pool $pool, PoolCommission $poolcommission)
    {
        $startTime = Carbon::parse($pool->start_time);
        $now = Carbon::now();
        $signedDiff = $now->diffInSeconds($startTime, false);

        $endTime = Carbon::parse($pool->end_time);
        $signedDiffEnd = $now->diffInSeconds($endTime, false);
        
        if($signedDiffEnd <= 0){
            return back();
        }

        return view('pools.edit', compact('pool','signedDiff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pool $pool)
    {
        $startTime = Carbon::parse($pool->start_time);
        $now = Carbon::now();
        $signedDiff = $now->diffInSeconds($startTime, false);

        if($signedDiff > 0) {

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'amount' => 'required|numeric|min:10|max:100000000000',
                'win_user_count' => 'required|integer|min:1|max:200',
                'amount_or_percentage' => 'required|array',
                'amount_or_percentage.*' => 'required|numeric',
                'distribution_type' => 'required|in:Percentage,Fix Amount',
                'for' => 'required|string|max:255',
                'start_time' => 'required|date_format:Y-m-d\TH:i|after_or_equal:now',
                'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
                'status' => 'required|in:Open,Closed',
            ]);

            $overlappingPools = Pool::where('status', 'Open')
                ->where('id', '!=', $pool->id)
                ->where('for', $request->for)
                ->where(function ($query) use ($request) {
                    $query->where(function ($q) use ($request) {
                        $q->where('start_time', '<', $request->end_time)
                          ->where('end_time', '>', $request->start_time);
                    });
                })
                ->exists();

            if ($overlappingPools) {
                return back()->withErrors(['start_time' => 'An active pool already exists during this time range.'])->withInput();
            }

        } else {

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'amount' => 'required|numeric|min:10|max:100000000000',
                'win_user_count' => 'required|integer|min:1|max:200',
                'amount_or_percentage' => 'required|array',
                'amount_or_percentage.*' => 'required|numeric',
                'distribution_type' => 'required|in:Percentage,Fix Amount',
            ]);

        }


        if ($request->distribution_type === 'Fix Amount') {
            $sum = array_sum($request->amount_or_percentage);
            if ($sum > $request->amount) {
                return back()->withInput()->withErrors(['amount' => 'The total of all fix amounts must be less than the main amount.']);
            }
        }


        try {

            DB::beginTransaction();

            $pool->update($validated);

            PoolCommission::where('pool_id', $pool->id)->delete();

            foreach ($request->input('amount_or_percentage') as $key => $commissionData) {
                PoolCommission::create([
                    'pool_id' => $pool->id,
                    'level' => ($key+1),
                    'distribute' => $commissionData,
                ]);
            }

            DB::commit();
            return redirect('pools')->with('success', 'Pool updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('pools')->with('success', 'Pool Not updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pool $pool)
    {
        // $pool->delete();
        return redirect('pools')->with('success', 'Pool deleted successfully.');
    }

    public function status_change($id, Pool $pool)
    {       
        $pool->where('id', $id)->update(['status' => 'Delete']);
        return redirect('pools')->with('success', 'Pool deleted successfully.');
    }


    public function user_pool_request_list(User $user, PoolRequest $poolrequest)
    {
        $data = $poolrequest->latest()->get();
        return view('pools.pool-request-list', compact('data'));
    }


    public function pool_cashback_list(Request $request, User $user, Ledger $ledger)
    {
        $ledgerData = $ledger->where('bal_type','MAIN')->where('ledger_type','DEBIT POOL')->latest()->get();
        return view('pools.pool-cashback-list', compact('ledgerData'));
    }



    public function commission_list(PoolCommission $poolcommission)
    {
        $commissions = $poolcommission::with('pools')->latest()->get();
        return view('pools.commission.index', compact('commissions'));
    }



    public function enterUsersToPool()
    {
        $now = Carbon::now();
        $roleName = 'User';
        $roleId = 3;

        $pool = Pool::where('status', 'Open')
            ->where('for', $roleName)
            ->where('start_time', '<=', $now)
            ->where('end_time', '>=', $now)
            ->orderBy('start_time', 'desc')
            ->first();

        if ($pool) {

            // Fetch eligible users with a wallet balance > 0 and not already in the pool
            $eligibleUsers = User::join('wallet', 'users.id', '=', 'wallet.user_id')
                ->where('users.role', $roleId)
                ->where('wallet.dmt_balance', '>', 0)
                ->whereDoesntHave('poolRequests', function ($query) use ($pool) {
                    $query->where('pool_id', $pool->id);
                })
                ->select('users.id','wallet.dmt_balance')
                ->get();

            if (!$eligibleUsers->isEmpty()) {
                // Prepare bulk insert
                $poolRequests = $eligibleUsers->map(function ($user) use ($pool) {
                    return [
                        'pool_id'     => $pool->id,
                        'user_id'     => $user->id,
                        'user_points' => 0,
                        'status'      => 1
                    ];
                })->toArray();

                PoolRequest::insert($poolRequests);

                // return response()->json([
                //     'message' => count($poolRequests) . ' users entered the pool.',
                //     'entered_user_ids' => $eligibleUsers->pluck('id'),
                // ]);
            }
        }

        $poolClose = Pool::where('status', 'Open')
            ->where('for', $roleName)
            ->where('end_time', '<', $now)
            ->first();

        if($poolClose) {
            
            $eligibleUsersWin = User::join('wallet', 'users.id', '=', 'wallet.user_id')
                ->where('users.role', $roleId)
                ->where('wallet.dmt_balance', '>', 0)
                ->whereHas('poolRequests', function ($query) use ($poolClose) {
                    $query->where('pool_id', $poolClose->id);
                })
                ->orderByDesc('wallet.dmt_balance')
                ->select('users.id', 'wallet.dmt_balance')
                ->limit($poolClose->commissions->count())
                ->get();

            foreach ($eligibleUsersWin as $key => $value) {

                $level = $key+1;
                $pCom = PoolCommission::where('level', $level)->where('pool_id', $poolClose->id)->first();
            
                if($pCom) {

                    $win_amount = 0; 
                    $percentage = $pCom->distribute??1;
                    if($poolClose->distribution_type == "Fix Amount") {
                        $win_amount = (float)$pCom->distribute??0; 
                    }
                    if($poolClose->distribution_type == "Percentage") {
                        $win_amount = (float)(($percentage / 100) * $poolClose->amount??10);
                    }

                    $trans_id = Helper::getTransId(3);

                    $check = Helper::debit_ledger([
                                "user_id" => $value->id,
                                "refrence_id" => 0,
                                "amount" => (float)$value->dmt_balance,
                                "trans_id" => $trans_id,
                                "cgst" => 0,
                                "sgst" => 0,
                                "ledger_type" => 19,
                                "wallet_type" => 2,
                                "trans_from" => 'Wallet',
                                "description" => $value->dmt_balance.' deducted amount pool'
                            ]); 

                    if($check["status"] ==  "success") {
                        $trans_id = Helper::getTransId(3);
                        $check2 = Helper::creadit_ledger([
                            "user_id" => $value->id,
                            "refrence_id" => 0,
                            "amount" => (float)$win_amount,
                            "trans_id" => $trans_id,
                            "cgst" => 0,
                            "sgst" => 0,
                            "ledger_type" => 19,
                            "wallet_type" => 1,
                            "trans_from" => 'Wallet',
                            "description" => $win_amount.' pool winning amount'
                        ]); 

                        PoolRequest::where('user_id', $value->id)->where('pool_id', $poolClose->id)->update(['user_points' => (float)$value->dmt_balance, 'win_level' => $level, 'win_amount' => (float)$win_amount]);
                    }
                }
            }

                      
                 Pool::where('id', $poolClose->id)->update(['status' => 'Closed']);
                        
        }

        return true;
    }




    public function enterVendorsToPool()
    {
        $now = Carbon::now();
        $roleName = 'Vendor';
        $roleId = 2;

        $pool = Pool::where('status', 'Open')
            ->where('for', $roleName)
            ->where('start_time', '<=', $now)
            ->where('end_time', '>=', $now)
            ->orderBy('start_time', 'desc')
            ->first();

        if ($pool) {

            // Fetch eligible users with a wallet balance > 0 and not already in the pool
            $eligibleUsers = User::join('wallet', 'users.id', '=', 'wallet.user_id')
                ->where('users.role', $roleId)
                ->where('wallet.aeps_balance', '>', 0)
                ->whereDoesntHave('poolRequests', function ($query) use ($pool) {
                    $query->where('pool_id', $pool->id);
                })
                ->select('users.id')
                ->get();

            if (!$eligibleUsers->isEmpty()) {
                // Prepare bulk insert
                $poolRequests = $eligibleUsers->map(function ($user) use ($pool) {
                    return [
                        'pool_id'     => $pool->id,
                        'user_id'     => $user->id,
                        'user_points' => 0,
                        'status'      => 1
                    ];
                })->toArray();

                PoolRequest::insert($poolRequests);

                // return response()->json([
                //     'message' => count($poolRequests) . ' users entered the pool.',
                //     'entered_user_ids' => $eligibleUsers->pluck('id'),
                // ]);
            }
        }

        $poolClose = Pool::where('status', 'Open')
            ->where('for', $roleName)
            ->where('end_time', '<', $now)
            ->first();

        if($poolClose) {
            
            $eligibleUsersWin = User::join('wallet', 'users.id', '=', 'wallet.user_id')
                ->where('users.role', $roleId)
                ->where('wallet.aeps_balance', '>', 0)
                ->whereHas('poolRequests', function ($query) use ($poolClose) {
                    $query->where('pool_id', $poolClose->id);
                })
                ->orderByDesc('wallet.aeps_balance')
                ->select('users.id', 'wallet.aeps_balance')
                ->limit($poolClose->commissions->count())
                ->get();

            foreach ($eligibleUsersWin as $key => $value) {

                $level = $key+1;
                $pCom = PoolCommission::where('level', $level)->where('pool_id', $poolClose->id)->first();
                
                if($pCom) {

                    $win_amount = 0; 
                    $percentage = $pCom->distribute??1;
                    if($poolClose->distribution_type == "Fix Amount") {
                        $win_amount = (float)$pCom->distribute??0; 
                    }
                    if($poolClose->distribution_type == "Percentage") {
                        $win_amount = (float)(($percentage / 100) * $poolClose->amount??10);
                    }

                    $trans_id = Helper::getTransId(3);

                    $check = Helper::debit_ledger([
                                "user_id" => $value->id,
                                "refrence_id" => 0,
                                "amount" => (float)$value->aeps_balance,
                                "trans_id" => $trans_id,
                                "cgst" => 0,
                                "sgst" => 0,
                                "ledger_type" => 19,
                                "wallet_type" => 3,
                                "trans_from" => 'Wallet',
                                "description" => $value->aeps_balance.' deducted amount pool'
                            ]); 

                    if($check["status"] ==  "success") {
                        $trans_id = Helper::getTransId(3);
                        $check2 = Helper::creadit_ledger([
                            "user_id" => $value->id,
                            "refrence_id" => 0,
                            "amount" => (float)$win_amount,
                            "trans_id" => $trans_id,
                            "cgst" => 0,
                            "sgst" => 0,
                            "ledger_type" => 19,
                            "wallet_type" => 1,
                            "trans_from" => 'Wallet',
                            "description" => $win_amount.' pool winning amount'
                        ]); 

                        PoolRequest::where('user_id', $value->id)->where('pool_id', $poolClose->id)->update(['user_points' => (float)$value->aeps_balance, 'win_level' => $level, 'win_amount' => (float)$win_amount]);
                    }
                }
            }

                      
                Pool::where('id', $poolClose->id)->update(['status' => 'Closed']);
                        
        }

        return true;
    }

}
