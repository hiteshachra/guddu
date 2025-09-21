<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{

    protected $table = 'service_sub_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name','service_category_id','image','status'];


    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }


    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y H:i A');
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y H:i A');
    }
}
