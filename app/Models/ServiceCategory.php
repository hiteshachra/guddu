<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name','image','status'];



    public function subCategories()
    {
        return $this->hasMany(ServiceSubCategory::class, 'service_category_id');
    }


    public function services()
    {
        return $this->hasMany(Services::class, 'service_category_id');
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
