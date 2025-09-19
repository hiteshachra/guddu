<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $fillable = [
        'id',
        'name',
        'code',
        'image',
        'qty',
        'price_type',
        'price',
        'min_order_amt',
        'used',
        'unused',
        'status',
        'publish',
        'type',
        'user_id',
        'start_date',
        'end_date',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
