<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChatMail extends Mailable
{
    use Queueable, SerializesModels;
    public $structure_name;
    public $auth_user_name;

    /**
     * Create a new message instance.
     */
    public function __construct($structure_name,$auth_user_name)
    {
        $this->structure_name = $structure_name;
        $this->auth_user_name = $auth_user_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau Message de '.$this->structure_name.' par '.$this->auth_user_name.'(Avis Client)',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.chat',
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
