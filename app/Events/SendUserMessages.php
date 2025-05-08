<?php

namespace App\Events;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class SendUserMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @param Message $message
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        return new Channel('admin-messages'); // Channel to broadcast on
    }

    /**
     * Prepare the data to be broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        // Assuming sender_id is a user ID from_user_id
        $user = User::find($this->message->from_user_id); // Replace User with the actual model name if different

        if ($user) {
            return [
                'message' => $this->message->message,
                'to_user_id' => $this->message->to_user_id,
                'from_user_id' => $this->message->from_user_id,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,

                ],
                'created_at' => $this->message->created_at,
            ];
        } else {
            return [
                'message' => $this->message->message,
                'to_user_id' => $this->message->to_user_id,
                'from_user_id' => $this->message->from_user_id,
                'user' => [
                    'id' => null,
                    'name' => 'Unknown User',

                ],
                'created_at' => $this->message->created_at,
            ];
        }
    }

    /**
     * The name of the event to broadcast.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'user-message'; // Event name to broadcast as
    }
}
