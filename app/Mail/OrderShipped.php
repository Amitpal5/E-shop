<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

     public $order_data;
      public $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_data,$cart)
    {
         $this->order_data = $order_data;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from_name = "Ecommerce";
        $from_email = "admin@ecommerce.com";
        $subject = "Thank You.Your Order are Placed";
        return $this->from($from_email, $from_name)
            ->view('emails.contact')
            ->subject($subject)
            ;
    }
}
