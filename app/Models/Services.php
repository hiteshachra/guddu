<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = ['service_category_id','service_sub_category_id','title','slug','description','images','video','faqs','price','discount','services','inclusions','status'];


    public function category()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(ServiceSubCategory::class,'service_sub_category_id');
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
