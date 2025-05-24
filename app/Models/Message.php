<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Events\MessageSent;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'message',
        'is_read',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'is_read' => 'boolean',
    ];


    public function markAsRead($userId)
    {
        Message::where('from_user_id', $userId)
            ->where('to_user_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }
    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    // Relationship to get receiver profile
    public function receiver()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function receiverProfilee()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id')->select(['id', 'name', 'picture', 'bio']);
    }

    public function senderProfilee()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id')->select(['id', 'name', 'picture', 'bio']);
    }

    public function receiverSellerProfile()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id')->select(['id', 'name', 'picture', 'bio']);
    }

    public function senderSellerProfile()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id')->select(['id', 'name', 'picture', 'bio']);
    }




    public $timestamps = true;
}
