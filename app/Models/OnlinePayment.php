<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    protected $table = 'online_payment';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'user_id',
        'gateway_order_id',
        'payment_id',
        'ledger_id',
        'amount',
        'currency',
        'gateway_request',
        'gateway_response',
        'gateway_name',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

}
