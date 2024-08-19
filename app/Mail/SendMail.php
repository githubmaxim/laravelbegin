<?php
declare(strict_types=1);

namespace App\Mail;

use App\Models\ForMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ForMail $forMail){}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jeffrey@example.com', 'Jeffrey Way'),
            subject: 'Send',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'forMail.send',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
