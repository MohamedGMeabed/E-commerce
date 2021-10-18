<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderEvent implements ShouldBroadcast
{
    public $order;
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('orders'. $this->order->id);
    }
    public function broadcastWith()
    {
        return [
            'order' =>[ 
                'id' =>$this->order->id,
                'First Name' =>$this->order->shipping_first_name,
                'Last Name' =>$this->order->shipping_last_name,
                'Email' =>$this->order->shipping_email,
                'Phone' =>$this->order->shipping_phone,
                'Address' =>$this->order->shipping_address,
                'status' =>$this->order->status,
                'total' =>$this->order->total,
                'order_number' =>$this->order->order_number,
            ],
        ];

    }

    public function broadcastAs()
    {
        // name for channel
        return 'Orders-Created';
    }
}
