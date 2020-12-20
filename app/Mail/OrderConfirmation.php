<?php

namespace App\Mail;

use App\Order;
use App\Payer;
use App\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    private $payment;
    private $payer;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @param Payment $payment
     * @param Payer $payer
     */
    public function __construct(Order $order, Payment $payment, Payer $payer)
    {
        $this->order   = $order;
        $this->payment = $payment;
        $this->payer   = $payer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('INFO_EMAIL', 'info@therops.co.uk'), 'The ROPS')
                    ->subject('Order Confirmation')
                    ->view('emails.order.success', [
                        'order'   => $this->order,
                        'payment' => $this->payment,
                        'payer'   => $this->payer
                    ]);
    }
}
