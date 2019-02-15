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

    private $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrderHeader $order, $type)
    {
        //
        $this->type = $type;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = '';
        switch ($this->type) {
            case 'NO_COMPLETE':
                # code...
                $view = 'emails.orders_no_complete';
                break;
            case 'NO_COMPLETE_PAYMENT':
                # code...
                $view = 'emails.orders_no_payment';
                break;
            default:
                # code...
                break;
        }
        return $this->from('hiwpro.website@gmail.com')
            ->view($view)
            ->with('order', $this->order);
    }
}
