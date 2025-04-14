<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['job_post_id', 'user_id','name','email','phone', 'status','resume'];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class , 'job_post_id');
    }

    public function talent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

