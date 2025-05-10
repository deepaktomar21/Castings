<?php

namespace App\Http\Controllers;

use App\Events\SendAdminMessage;
use App\Services\FCMService;

use App\Events\SendSellerMessage;
use App\Events\SendUserMessage;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;

class ChatsController extends Controller
{
    protected $fcmService;

    public function __construct(FCMService $fcmService)
    {
        $this->fcmService = $fcmService;
    }



    public function fetchMessagesFromUserToAdmin(Request $request)
    {
        $receiverId = $request->input('receiver_id');
        $sellerId = session('LoggedUserInfo');

        $messages = Chat::where(function ($query) use ($sellerId, $receiverId) {
            $query->where('sender_id', $sellerId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($sellerId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $sellerId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json(['messages' => $messages]);
    }

    public function sendMessageFromUserToAdmin(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required',
        ]);

        $LoggedUserInfo = User::find(session('LoggedUserInfo'));
        if (!$LoggedUserInfo) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to send a message',
            ]);
        }

        $chat = new Chat();
        $chat->sender_id = session('LoggedUserInfo');
        $chat->receiver_id = $request->input('receiver_id');
        $chat->message = $request->input('message');
        $chat->seen = 0;
        $chat->save();


        // Broadcast the message using the SendUserMessage event
        event(new SendUserMessage($chat));

        $receiver = User::find($request->receiver_id);
        if ($receiver && $receiver->fcm_token) {
            $title = 'Casting';
            $body = 'You have received a new message from '  . $LoggedUserInfo->name;
            $data = [
                'chat_id' => $chat->id,
                'sender_id' => $LoggedUserInfo->id
            ];

            $this->fcmService->sendNotification($receiver->fcm_token, $title, $body, $data);
        }


        // Return a JSON response indicating success
        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }






    // public function sendMessage(Request $request)
    // {
    //     $request->validate([
    //         'message' => 'required|string',
    //         'receiver_id' => 'required|integer|exists:users,id', // Ensure the receiver_id is a valid user id
    //     ]);

    //     $LoggedAdminInfo = User::find(session('LoggedAdminInfo'));
    //     if (!$LoggedAdminInfo) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'You must be logged in to send a message',
    //         ]);
    //     }

    //     $message = new Chat();
    //     $message->sender_id = $LoggedAdminInfo->id;
    //     $message->receiver_id = $request->receiver_id;
    //     $message->message = $request->message;
    //     $message->save();
    //     broadcast(new SendAdminMessage($message))->toOthers();




    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Message sent successfully',
    //     ]);
    // }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required',
        ]);

        $LoggedAdminInfo = User::find(session('LoggedAdminInfo'));
        if (!$LoggedAdminInfo) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to send a message',
            ]);
        }

        // Create the message
        $message = new Chat();
        $message->sender_id = $LoggedAdminInfo->id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        // Broadcast the message to others
        broadcast(new SendAdminMessage($message))->toOthers();

        // // Send FCM notification if receiver has a device token
        $receiver = User::find($request->receiver_id);
        if ($receiver && $receiver->fcm_token) {
            $title = 'Casting';
            $body = 'You have received a new message from '  . $LoggedAdminInfo->name;
            $data = [
                'chat_id' => $message->id,
                'sender_id' => $LoggedAdminInfo->id
            ];

            $this->fcmService->sendNotification($receiver->fcm_token, $title, $body, $data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
        ]);
    }
    public function fetchMessages(Request $request)
    {
        $receiverId = $request->input('receiver_id');

        // Fetch the logged-in admin using the session
        $adminId = session('LoggedAdminInfo');
        $LoggedAdminInfo = User::find($adminId);

        if (!$LoggedAdminInfo) {
            return response()->json([
                'error' => 'Admin not found. You must be logged in to access messages.'
            ], 404);
        }

        // Fetch messages between the admin and the specified seller
        $messages = Chat::where(function ($query) use ($adminId, $receiverId) {
            $query->where('sender_id', $adminId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($adminId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $adminId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json([
            'messages' => $messages
        ]);
    }
}
