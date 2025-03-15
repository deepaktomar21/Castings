<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'stage_name',
        'contact',
        'location',
        'bio',
        'acting_techniques',
        'theater_experience',
        'reel_video',
        'visibility',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

