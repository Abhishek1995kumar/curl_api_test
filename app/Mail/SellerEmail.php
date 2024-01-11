<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SellerEmail extends Mailable {
    use Queueable, SerializesModels;
    public function __construct() {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Seller Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            view: 'view.name',
        );
    }

    public function attachments(): array
    {
        return [];
    }

    public function build() {
        return $this->view('emails.welcome')->subject('Your Registration is Successfully Created !! Enjoy !!');
    }
}
