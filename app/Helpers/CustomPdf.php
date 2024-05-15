<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use function Spatie\LaravelPdf\Support\pdf;

class CustomPdf
{
    /**
     * Generate PDF using the package https://github.com/barryvdh/laravel-dompdf
     */
    public static function generate($event, $eventSessionTickets, $accessTickets)
    {
        try {

            // Loop through each access ticket and add a new property that will hold
            // the QRCode URL to be displayed in the PDF
            foreach ($accessTickets as $accessTicket) {
                $accessTicket->qr_code_url = route('validate-access-ticket', ['code' => $accessTicket->code]);
            }

            // Generates a PDF using the spatie/laravel-pdf package
            return pdf()
                ->view('pdf_templates.access_tickets', compact('event', 'eventSessionTickets', 'accessTickets'))
                ->base64();
        } catch (\Exception $e) {
            Log::error(__("Failed to generate PDF") . ": " . $e->getMessage());
            throw new \Exception(__("Failed to generate PDF") . ": " . $e->getMessage());
        }
    }
}
