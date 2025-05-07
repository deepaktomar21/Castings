<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
use Carbon\Carbon;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $to_user_id;
    public $from_user_id;

    /**
     * Create a new event instance.
     *
     * @param Message $message
     * @param int $to_user_id
     * @param int $from_user_id
     * @return void
     */
    public function __construct(Message $message, $to_user_id, $from_user_id)
    {
        if ($message->created_at) {
            $message->created_at = Carbon::parse($message->created_at)->toDateTimeString();
        }

        $this->message = $message;
        $this->to_user_id = $to_user_id;
        $this->from_user_id = $from_user_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [
            new PrivateChannel('private-chat.' . $this->to_user_id),
            new PrivateChannel('private-chat.' . $this->from_user_id),
        ];
    }

    /**
     * Get the data to broadcast with the event.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'to_user_id' => $this->to_user_id,
            'from_user_id' => $this->from_user_id,
            'created_at' => $this->message->created_at,
        ];
    }

    /**
     * Customize the event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'message.sent';
    }
}
