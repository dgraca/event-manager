<?php

namespace App\Jobs;

use App\Helpers\Word2Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateAccessTicketPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $accessTickets;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($accessTickets)
    {
        $this->accessTickets = $accessTickets;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $formData = [];

        // Loop through all access tickets to add them to $formData
        for ($i = 0; $i < count($this->accessTickets); $i++) {
            $formData["tickets[$i][name]"] = $this->accessTickets[$i]->name;
            $formData["tickets[$i][email]"] = $this->accessTickets[$i]->email;
            $formData["tickets[$i][phone]"] = $this->accessTickets[$i]->phone;
            $formData["tickets[$i][qrcode]"] = $this->accessTickets[$i]->qrcode;
        }

        // Get the path to the template file
        $pathToTemplate = storage_path('email_templates/test.docx');

        // Calls the Word2Pdf helper to convert the document to PDF
        // using the Word2PDF API provided by noop
        $response = Word2Pdf::convertDocument2Pdf($pathToTemplate, $formData);

        // If the error key is present in the response, throw an exception
        if (is_array($response) && array_key_exists('error', $response)) {
            throw new \Exception($response['error']);
        }

        // If the request is successful, send the email with the PDF attached
        if (!empty($response)) {
            // Once PDF is generated, dispatch job for sending emails asynchronously
            SendAccessTicketEmail::dispatch('test@danielgraca.com', base64_encode($response));
        } else {
            throw new \Exception(__('Error generating the PDF'));
        }
    }
}
