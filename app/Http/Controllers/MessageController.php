<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\FCMService;

class MessageController extends Controller
{
    protected $fcm;
    public function __construct(FCMService $fcm)
    {
        $this->fcm = $fcm;
    }

    //
    public function users()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('website.chat_app', compact('users'));
    }

    public function index(User $user)
    {
        return view('website.chat', ['receiver' => $user]);
    }
    public function getMessages($userId)
    {
        $messages = Message::where(function ($query) use ($userId) {
            $query->where('from_user_id', Auth::id())
                ->where('to_user_id', $userId);
        })
            ->orWhere(function ($query) use ($userId) {
                $query->where('from_user_id', $userId)
                    ->where('to_user_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }
    public function getUsersWithUnreadCounts()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        $users->map(function ($user) {
            $user->unread_count = Message::where('from_user_id', $user->id)
                ->where('to_user_id', Auth::id())
                ->where('is_read', false)
                ->count();
            return $user;
        });

        return response()->json($users);
    }


    public function sendMessage(Request $request, FCMService $fcm)
    {
        $request->validate([
            'message' => 'required|string',
            'to_user_id' => 'required|exists:users,id',
        ]);

        // Save the message
        $message = new Message();
        $message->from_user_id = Auth::id();
        $message->to_user_id = $request->to_user_id;
        $message->message = $request->message;
        $message->save();

        // Send FCM Notification
        $recipient = User::find($request->to_user_id);
        if ($recipient && $recipient->fcm_token) {
            $title = 'New Message from ' . Auth::user()->name;
            $body = $request->message;
            $data = [
                'message_id' => $message->id,
                'from_user_id' => Auth::id(),
            ];

            $fcm->sendNotification($recipient->fcm_token, $title, $body, $data);
        }

        return response()->json(['success' => true, 'message' => $message]);
    }
    // public function sendMessage(Request $request)
    // {
    //     $request->validate([
    //         'message' => 'required|string',
    //         'to_user_id' => 'required|exists:users,id',
    //     ]);

    //     $message = new Message();
    //     $message->from_user_id = Auth::id();
    //     $message->to_user_id = $request->to_user_id;
    //     $message->message = $request->message;
    //     $message->save();



    //     return response()->json(['success' => true, 'message' => $message]);
    // }
}
