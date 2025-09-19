<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportReply extends Model
{
    use HasFactory;

    protected $table = 'support_replies';

    protected $fillable = [
        'support_id',
        'description',
        'type',
        'file',
        'user_id',
        'replay_id',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Relationships
    public function ticket()
    {
        return $this->belongsTo(Support::class);
    }

    public function parentReply()
    {
        return $this->belongsTo(SupportReply::class, 'replay_id');
    }

    public function childReplies()
    {
        return $this->hasMany(SupportReply::class, 'replay_id');
    }
}
