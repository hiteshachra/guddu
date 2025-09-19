<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $table = 'supports';

    protected $fillable = [
        'code',
        'for',
        'user_id',
        'subject',
        'assigned_by',
        'assigned_to',
        'assign_date',
        'status',
    ];

    protected $dates = [
        'assign_date',
        'created_at',
        'updated_at',
    ];

    // Example relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($support) {
            if (empty($support->code)) {
                $support->code = 'SUPP' . random_int(10000000, 99999999);
            }
        });
    }
}
