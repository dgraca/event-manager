<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
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
        try {
            // Dispatch notification with PDF attachment
            Notification::route('mail', 'eu@ipt.pt')->notify(new \App\Notifications\AccessTicket(base64_decode($this->pdfContent), __('Tickets') . '.pdf'));
        } catch (\Exception $e) {
            Log::error(__("Failed to send email") . ": " . $e->getMessage());
            throw new \Exception(__("Failed to send email") . ": " . $e->getMessage());
        }
    }
}
