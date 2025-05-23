<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function routeNotificationForOneSignal()
    {
        return $this->onesignal_player_id; // You must save this per user
    }

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [

        'name',
        'last_name',
        'stage_name',
        'professional_title',
        'email',
        'phone',
        'role',
        'location',
        'gender',
        'pronoun',
        'min_age',
        'max_age',
        'date_of_birth',
        'height_feet',
        'height_inches',
        'weight',
        'body_type',
        'hair_color',
        'eye_color',
        'ethnicity',
        'fcm_token',

        'otp',
        'city_id',
        'postal_code',
        'password',
        'activity_log',

        'bio',
        'photos',

        'instagram',
        'facebook',
        'youtube',
        'linkedin',
        'imdb',
        'other_url',

        'representative_type',
        'representative_name',
        'representative_email',
        'representative_phone_number',
        'representative_company_name',
        'representative_website',
        'representative_address1',
        'representative_address2',
        'representative_city',
        'representative_state',
        'representative_zip',
        'representative_country',

        'credit_productionType',
        'credit_project_name',
        'credit_role',
        'credit_year',
        'credit_location',
        'credit_month',
        'credit_website',
        'credit_director_production',

        'additional_notes',
        'acting_techniques',
        'special_skills',
        'languages',
        'accents',
        'dialects',
        'other_skills',


        'skills',

        'school',
        'degree',
        'passout_year',
        'institute_location',
        'instructor',

        'selfrecording_description',
        'file',
        'documents',
        'highlights',
        'dont_show_date',


        'theater_experience',
        'film_experience',
        'training',
        'reel_video',
        'resume',
        'visibility',
        'is_featured',
        'status',
        'membership_plan'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected $casts = [
        'activity_log' => 'array', // Ensures automatic conversion between JSON & array
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function bookmarks()
    {
        return $this->hasMany(JobBookmark::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public static function boot()
    {
        parent::boot();

        static::saving(function ($talent) {
            if (!$talent->slug) {
                $talent->slug = Str::slug($talent->name);
            }
        });
    }
}
