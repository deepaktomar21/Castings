<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBookmark extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'job_post_id'];
    protected $table = 'job_bookmarks';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jobPost()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }
}
