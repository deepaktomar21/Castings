<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FCMService
{
    protected $messaging;

    public function __construct()
    {
        // Initialize Firebase Messaging
        $factory = (new Factory)->withServiceAccount(storage_path('app/firebase-admin.json'));
        $this->messaging = $factory->createMessaging();
    }

    /**
     * Send FCM notification to a single device
     *
     * @param string $token - The recipient's FCM token
     * @param string $title - Notification title
     * @param string $body - Notification body
     * @param array $data - Additional payload data (optional)
     * @return string|null
     */
    public function sendNotification($token, $title, $body, $data = [])
    {
        $message = CloudMessage::withTarget('token', $token)
            ->withNotification(Notification::create($title, $body))
            ->withData($data); // Add custom payload data if needed

        return $this->messaging->send($message);
    }

    /**
     * Send FCM notification to multiple devices
     *
     * @param array $tokens - List of FCM tokens
     * @param string $title - Notification title
     * @param string $body - Notification body
     * @param array $data - Additional payload data (optional)
     * @return array
     */
    public function sendMulticastNotification(array $tokens, $title, $body, $data = [])
    {
        $message = CloudMessage::new()
            ->withNotification(Notification::create($title, $body))
            ->withData($data);

        return $this->messaging->sendMulticast($message, $tokens);
    }
}
