<?php

namespace App\Jobs;

use App\Helpers\CustomPdf;
use App\Helpers\Word2Pdf;
use Cassandra\Custom;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GenerateAccessTicketPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $event;
    private $eventSessionTickets;
    private $accessTickets;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($event, $eventSessionTickets, $accessTickets)
    {
        $this->event = $event;
        $this->eventSessionTickets = $eventSessionTickets;
        $this->accessTickets = $accessTickets;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Generate PDF using the CustomPDF helper
        $pdf = CustomPdf::generate($this->event, $this->eventSessionTickets ,$this->accessTickets);

        // Send the PDF via email using the SendAccessTicketEmail job
        SendAccessTicketEmail::dispatch($this->event->email, $pdf);
    }
}
