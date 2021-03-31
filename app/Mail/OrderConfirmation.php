<?php

namespace App\Mail;

use App\Order;
use App\Payer;
use App\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as PDF;

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
        $data = [
            'payment' => $this->payment,
            'order' => $this->order,
            'extra_services'
        ];

        $pdf = PDF::loadView('pdf.order', $data);


        return $this->from(env('INFO_EMAIL', 'info@therops.co.uk'), 'The Rops')
                    ->subject('Order Confirmation')
                    ->attachData($pdf->output(), 'Your_Post_Detail.pdf', [
                        'mime' => 'application/pdf',
                    ])
                    ->view('emails.order.success', [
                        'order'   => $this->order,
                        'payment' => $this->payment,
                        'payer'   => $this->payer
                    ]);
    }
}
