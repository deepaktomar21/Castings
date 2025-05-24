<?php
namespace App\Listeners;

use App\Events\SendAdminMessage;
use App\Services\FCMService;
use App\Models\User;

class SendAdminMessageListener
{
    protected $fcmService;

    public function __construct(FCMService $fcmService)
    {
        $this->fcmService = $fcmService;
    }

    public function handle(SendAdminMessage $event)
    {
        $message = $event->message;
        $sender = $message->sender;
        $receiver = User::find($message->receiver_id);

        if ($receiver && $receiver->fcm_token) {
            $title = 'Casting';
            $body = 'You have received a new message from ' . $sender->name . ': ' . $message->message;
            $data = [
                'chat_id' => $message->id,
                'sender_id' => $sender->id
            ];

            $this->fcmService->sendNotification($receiver->fcm_token, $title, $body, $data);
        }
    }
}
