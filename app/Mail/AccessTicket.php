<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccessTicket extends Mailable
{
    use Queueable, SerializesModels;

    private string $pdfContent;
    private string $pdfName;

    /**
     * Create a new message instance.
     */
    public function __construct(string $pdfContent, string $pdfName)
    {
        $this->pdfContent = $pdfContent;
        $this->pdfName = $pdfName;

        // Attach the PDF content to the email
        $this->attachData($pdfContent, $pdfName, [
            'mime' => 'application/pdf',
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@noop.pt', 'Ticketing System'),
            subject: __('Tickets'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.access_ticket',
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
