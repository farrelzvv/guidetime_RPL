<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class OrderApprovedNotification extends Notification
{
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database']; // Simpan ke database
    }

    public function toDatabase($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'product_title' => $this->order->product->title,
            'quantity' => $this->order->quantity,
            'total_price' => $this->order->total_price,
        ];
    }
}
