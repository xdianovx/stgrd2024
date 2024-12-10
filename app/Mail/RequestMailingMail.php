<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestMailingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @param  array  $details
     * @return void
     */
    public function __construct(array $details)
    {
        $this->details = $details;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Запрос на сотрудничество',
        );
    }
    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->view('emails.request_mailing_email')
            ->with([
                'name' => $this->details['name'],
                'email' => $this->details['email']
            ]);
    }
}
