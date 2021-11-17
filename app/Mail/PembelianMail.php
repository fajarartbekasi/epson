<?php

namespace App\Mail;

use App\Pembelian;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PembelianMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pembelian $pembelian)
    {
        $this->pembelian = $pembelian;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('albahri@gmail.com')
                    ->markdown('email.pembelian')
                    ->with('pembelian', $this->pembelian);
    }
}
