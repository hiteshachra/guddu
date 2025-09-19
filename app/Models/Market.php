<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'address',
        'latitude',
        'longitude',
        'country',
        'state',
        'city',
        'town',
        'description',
        'logo',
        'banner',
        'status',
        'range_in_km',
        'market_owners',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
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
