<?php

namespace App\Jobs;

use App\Mail\AccessTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

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
        // Send email with PDF attachment
        Mail::to($this->email)->send(new AccessTicket(base64_decode($this->pdfContent), __('Tickets') . '.pdf'));
    }
}
