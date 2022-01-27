<?php

namespace App\Mail\Checkout;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AfterCheckout extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $checkout;
    public function __construct($checkout)
    {
        $this->checkout = $checkout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Register Camp {$this->checkout->camp->title}")
            ->markdown('emails.checkouts.after-checkout', [
                'checkout' => $this->checkout
            ]);
    }
}
