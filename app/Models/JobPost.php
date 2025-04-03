<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $table = 'job_posts';

    protected $fillable = [
        'user_id',
        'talent_types',
        'project_type',
        'organization_type',
        'company_name',
        'company_website',
        'job_title',
        'city',
        
        

    ];

    protected $casts = [
        'talent_types' => 'array', // Ensures it is stored/retrieved as an array
    ];
    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
