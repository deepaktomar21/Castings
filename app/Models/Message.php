<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'message',
        'is_read',
    ];
    protected $casts = [
        'is_read' => 'boolean',
    ];
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
   
    public function markAsRead($userId)
{
    Message::where('from_user_id', $userId)
        ->where('to_user_id', Auth::id())
        ->where('is_read', false)
        ->update(['is_read' => true]);

    return response()->json(['success' => true]);
}



}
