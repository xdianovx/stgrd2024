<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestCooperationMail extends Mailable
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
        return $this->view('emails.request_cooperation_email')
            ->with([
                'company' => $this->details['company'],
                'user' => $this->details['user'],
                'phone' => $this->details['phone'],
                'email' => $this->details['email']
            ]);
    }
}
