<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestVacancyMail extends Mailable
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

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
      return new Envelope(
          subject: 'Новый отклик на вакансию - ' . $this->details['vacancy'],
      );
  }

  /**
   * Build the message.
   */
  public function build(): self
  {
      return $this->view('emails.request_vacancy_email')
          ->with([
              'vacancy' => $this->details['vacancy'],
              'name' => $this->details['name'],
              'phone' => $this->details['phone'],
          ]);
  }
}
