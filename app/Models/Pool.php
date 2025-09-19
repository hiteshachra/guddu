<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'distribution_type', 'amount', 'win_user_count', 'for',
        'start_time', 'end_time', 'status',
    ];

    public function commissions()
    {
        return $this->hasMany(PoolCommission::class, 'pool_id', 'id');
    }

    public function requests()
    {
        return $this->hasMany(PoolRequest::class, 'pool_id', 'id');
    }

}
