<?php
namespace App\Channels;

use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;
use App\Notifications\Backend\Auth\PurchaseReminder;

class WhatsAppChannel
{
    public function send($notifiable, PurchaseReminder $notification)
    {
        $message = $notification->toWhatsApp($notifiable);
        $to = $notification->order->users->phone_number;
        $from = config('services.twilio.whatsapp_from');
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        return $twilio->messages->create('whatsapp:' . $to, [
            "from" => 'whatsapp:' . $from,
            "body" => $message->content
        ]);
    }
}