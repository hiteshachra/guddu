<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class UserWallet extends Model
{
    use HasFactory;
    protected $table = 'wallet';

    protected $fillable = [
        'id',
        'user_id',
        'ref_right_balance',
        'ref_left_balance',
        'ref_direct_balance',
        'main_balance',
        'dmt_balance',
        'aeps_balance',
        'digi_balance',
        'vps_balance',
        'bonus_balance',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    // public function getByType($type)
    // {
    //     $query = DB::query()
    //     ->selectRaw('count(*)')
    //     ->from('users_data')
    //     ->whereColumn('users_data.role', 'user_role.role_id');

    //     $results = DB::query()
    //     ->select('*')
    //     ->selectSub($query, 'total_users')
    //     ->from('user_role')
    //     ->where('user_role.role_type', $type)
    //     ->orderBy('user_role.role_order_by')
    //     ->get();

    //    return $results;
    // }  

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
