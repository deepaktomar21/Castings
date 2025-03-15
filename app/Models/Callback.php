<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    use HasFactory;

    protected $fillable = ['audition_id', 'talent_id', 'status'];

    public function audition()
    {
        return $this->belongsTo(Audition::class);
    }

    public function talent()
    {
        return $this->belongsTo(User::class, 'talent_id');
    }
}
