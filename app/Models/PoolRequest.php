<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolRequest extends Model
{
    use HasFactory;

   protected $fillable = [
        'pool_id', 'user_id', 'user_points', 'win_level', 'win_amount', 'status'
    ];
    


    public function pools()
    {
        return $this->belongsTo(Pool::class, 'pool_id', 'id');
    }
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
