<?php

namespace App\Mail;

use App\Models\OrderHeader;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrderHeader $order)
    {
        //
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hiwpro.website@gmail.com')
            ->view('emails.orders')
            ->with('order', $this->order);
    }
}
