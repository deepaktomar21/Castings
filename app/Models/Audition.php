<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audition extends Model
{
    use HasFactory;

    protected $fillable = ['job_post_id', 'talent_id', 'scheduled_at', 'status'];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function talent()
    {
        return $this->belongsTo(User::class, 'talent_id');
    }
}
