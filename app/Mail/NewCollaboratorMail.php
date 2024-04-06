<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewCollaboratorMail extends Mailable
{
    use Queueable, SerializesModels;
    public $newPassword;
    public $collaborator_name;
    public $collaborator_email;
    public $structure_name;
    /**
     * Create a new message instance.
     */
    public function __construct($newPassword,$collaborator_name,$collaborator_email,$structure_name)
    {
        $this->newPassword = $newPassword;
        $this->collaborator_name = $collaborator_name;
        $this->collaborator_email = $collaborator_email;
        $this->structure_name = $structure_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vous aviez été ajouter comme collaborateur',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.collaborator',
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
