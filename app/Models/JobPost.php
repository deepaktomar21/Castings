<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobPost extends Model
{
    use HasFactory;

    protected $table = 'job_posts';

    protected $fillable = [
        'user_id',
        'talent_types',
        'organization_type',
        'company_name',
        'company_website',
        'job_title',
        'city',

        'project_name',
        'project_description',
        'project_type',
        'union_status',

        'talent_compensation',
        'expected_duration',
        'pay_rate_frequency',
        'pay_rate_currency',
        'pay_rate_amount',
        'contract_details',

        'expire_date_listing',
        'expire_time_listing',

        'production_info',
        'location_type',
        'audition_country',
        'audition_special_instructions',
        'script_title',
        'script_description',

        'role_name',
        'role_type',
        'remote_opportunity',
        'role_gender',
        'role_min_age',
        'role_max_age',
        'role_ethnicity',
        'role_skills',
        'role_description',
        'media_required',
        'role_require_nudity',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }

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
    public function jobBookmarks()
    {
        return $this->hasMany(JobBookmark::class, 'job_post_id');
    }
}
