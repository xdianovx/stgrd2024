<?php

namespace App\Jobs;

use App\Mail\RequestVacancyMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;

class RequestVacancyMailSendJob implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var array
   */
  protected $details;

  /**
   * Create a new job instance.
   *
   * @param array $details
   */
  public function __construct(array $details)
  {
      $this->details = $details;
  }

  /**
   * Execute the job.
   */
  public function handle(): void
  {
      Mail::to(env('MAIL_TO_ADDRESS'))
          ->queue(new RequestVacancyMail($this->details));
  }
}
