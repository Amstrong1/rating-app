<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserRatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $structure_name;
    public $admin_name;
    public $place_name;

    /**
     * Create a new message instance.
     */
    public function __construct($admin_name,$structure_name,$place_name)
    {
        $this->structure_name = $structure_name;
        $this->admin_name = $admin_name;
        $this->place_name = $place_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Retour d\'un client ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.userRated',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
