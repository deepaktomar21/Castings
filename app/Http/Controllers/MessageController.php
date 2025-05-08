<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\SendAdminMessage;
use App\Events\SendSellerMessage;
use App\Events\SendUserMessage;
use App\Models\Chat;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\FCMService;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    //user-view
    public function talent()
    {
        $userId = session('LoggedUserInfo');
        $LoggedUserInfo = User::find($userId);

        if (!$LoggedUserInfo) {
            return redirect('login')->with('fail', 'You must be logged in to access the dashboard');
        }

        // Retrieve all admins
        $admins = User::all();

        return view('website.chat_app', [
            'LoggedUserInfo' => $LoggedUserInfo,
            'admins' => $admins // Pass only admins to the view
        ]);
    }


    public function recruiter()
    {
        $LoggedAdminInfo = User::find(session('LoggedAdminInfo'));
        if (!$LoggedAdminInfo) {
            return redirect()->route('login')->with('fail', 'You must be logged in to access the dashboard');
        }

        // Fetch chats where the admin is either the sender or the receiver
        $chats = Chat::with(['senderProfilee', 'receiverProfilee', 'senderSellerProfile', 'receiverSellerProfile'])
            ->where('sender_id', $LoggedAdminInfo->id)
            ->orWhere('receiver_id', $LoggedAdminInfo->id)
            ->get();

        // Combine both results and remove duplicates
        $allChats = $chats->map(function ($chat) use ($LoggedAdminInfo) {
            if ($chat->sender_id == $LoggedAdminInfo->id) {
                if ($chat->receiverProfilee) {
                    $chat->user_id = $chat->receiver_id;
                    $chat->profile = $chat->receiverProfilee;
                } else {
                    $chat->user_id = $chat->receiver_id;
                    $chat->profile = $chat->receiverSellerProfile;
                }
            } else {
                if ($chat->senderProfilee) {
                    $chat->user_id = $chat->sender_id;
                    $chat->profile = $chat->senderProfilee;
                } else {
                    $chat->user_id = $chat->sender_id;
                    $chat->profile = $chat->senderSellerProfile;
                }
            }
            return $chat;
        })->unique('user_id')->values();
        // dd($allChats);

        // Pass the logged-in admin's information and chats to the view
        return view('website.recruiter_chat', [
            'LoggedAdminInfo' => $LoggedAdminInfo,
            'chats' => $allChats
        ]);
    }
    // public function recruiter()
    // {
    //     $LoggedAdminInfo = User::find(session('LoggedAdminInfo'));
    //     if (!$LoggedAdminInfo) {
    //         return redirect()->route('login')->with('fail', 'You must be logged in to access the dashboard');
    //     }

    //     // Fetch chats where the admin is either the sender or the receiver
    //     $chats = Chat::with(['senderProfilee', 'receiverProfilee', 'senderSellerProfile', 'receiverSellerProfile'])
    //         ->where('sender_id', $LoggedAdminInfo->id)
    //         ->orWhere('reciever_id', $LoggedAdminInfo->id)
    //         ->get();

    //     // Combine both results and remove duplicates
    //     $allChats = $chats->map(function ($chat) use ($LoggedAdminInfo) {
    //         if ($chat->sender_id == $LoggedAdminInfo->id) {
    //             if ($chat->receiverProfilee) {
    //                 $chat->user_id = $chat->reciever_id;
    //                 $chat->profile = $chat->receiverProfilee;
    //             } else {
    //                 $chat->user_id = $chat->reciever_id;
    //                 $chat->profile = $chat->receiverSellerProfile;
    //             }
    //         } else {
    //             if ($chat->senderProfilee) {
    //                 $chat->user_id = $chat->sender_id;
    //                 $chat->profile = $chat->senderProfilee;
    //             } else {
    //                 $chat->user_id = $chat->sender_id;
    //                 $chat->profile = $chat->senderSellerProfile;
    //             }
    //         }
    //         return $chat;
    //     })->unique('user_id')->values();

    //     dd($chats);
    //     // Pass the logged-in admin's information and chats to the view
    //     return view('website.recruiter_chat', [
    //         'LoggedAdminInfo' => $LoggedAdminInfo,
    //         'chats' => $allChats
    //     ]);
    // }



    //fetchMessagesFromUserToAdmin method:
    public function fetchMessagesFromUserToAdmin(Request $request)
    {
        $toUserId = $request->input('to_user_id');
        $fromUserId = session('LoggedUserInfo');

        $messages = Message::where(function ($query) use ($fromUserId, $toUserId) {
            $query->where('from_user_id', $fromUserId)
                ->where('to_user_id', $toUserId);
        })->orWhere(function ($query) use ($fromUserId, $toUserId) {
            $query->where('from_user_id', $toUserId)
                ->where('to_user_id', $fromUserId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json(['messages' => $messages]);
    }
    //✅ sendMessageFromUserToAdmin method:
    public function sendMessageFromUserToAdmin(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'to_user_id' => 'required',
        ]);

        $chat = new Message();
        $chat->from_user_id = session('LoggedUserInfo');
        $chat->to_user_id = $request->input('to_user_id');
        $chat->message = $request->input('message');
        // $chat->seen = 0;
        $chat->save();

        event(new SendUserMessage($chat));

        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }

    //sendMessage (Admin sends to user):
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'to_user_id' => 'required',
        ]);

        $admin = User::find(session('LoggedAdminInfo'));
        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to send a message',
            ]);
        }

        $message = new Message();
        $message->from_user_id = $admin->id;
        $message->to_user_id = $request->to_user_id;
        $message->message = $request->message;

        $message->save();
        broadcast(new SendAdminMessage($message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
        ]);
    }


    //fetchMessages (Admin fetches messages with user):
    public function fetchMessages(Request $request)
    {
        $toUserId = $request->input('to_user_id');
        $fromUserId = session('LoggedAdminInfo');

        $admin = User::find($fromUserId);

        if (!$admin) {
            return response()->json([
                'error' => 'Recriuter not found. You must be logged in to access messages.'
            ], 404);
        }

        $messages = Message::where(function ($query) use ($fromUserId, $toUserId) {
            $query->where('from_user_id', $fromUserId)
                ->where('to_user_id', $toUserId);
        })->orWhere(function ($query) use ($fromUserId, $toUserId) {
            $query->where('from_user_id', $toUserId)
                ->where('to_user_id', $fromUserId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json(['messages' => $messages]);
    }
}
