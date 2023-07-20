<?php

namespace App\Mail;

use App\Transaksi;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ZakatInvoice extends Mailable
{
    use Queueable, SerializesModels;
    public $transaksi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trans)
    {
        $this->transaksi = $trans;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('invoice@zakat.sunthree.tk')
                    ->subject('Invoice Pelaksanaan Zakat')
                    ->view('zakat.invoice-mail');
    }
}
