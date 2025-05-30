<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table  = 'subscriptions';

    protected $fillable = [
        'name',
        'price',
        'duration',
        'job_post_limit',
        'resume_view_limit',
        'description',
        'is_active'
    ];
}
