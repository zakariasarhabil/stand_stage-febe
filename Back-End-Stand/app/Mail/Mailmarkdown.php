<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mailmarkdown extends Mailable
{
    use Queueable, SerializesModels;
    public $mailrequest;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $mailrequest)
    {
        $this->mailrequest = $mailrequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.markdawnViewMail');
    }
}
