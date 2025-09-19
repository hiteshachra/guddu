<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'pool_id', 'level', 'distribute'
    ];

    public function pools()
    {
        return $this->belongsTo(Pool::class, 'pool_id', 'id');
    }

}
