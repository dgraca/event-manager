<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendAccessTicketEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $pdfContent;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $pdfContent)
    {
        $this->email = $email;
        $this->pdfContent = $pdfContent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Dispatch notification with PDF attachment
        Notification::route('mail', $this->email)->notify(new \App\Notifications\AccessTicket(base64_decode($this->pdfContent), __('Tickets') . '.pdf'));
    }
}
