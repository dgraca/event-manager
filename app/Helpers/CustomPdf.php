<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use function Spatie\LaravelPdf\Support\pdf;

class CustomPdf
{
    /**
     * Generate PDF using the package https://github.com/barryvdh/laravel-dompdf
     */
    public static function generate($event, $accessTickets)
    {
        try {

            return pdf()
                ->view('pdf_templates.access_tickets', compact('event', 'accessTickets'))
                ->base64();
        } catch (\Exception $e) {
            Log::error(__("Failed to generate PDF") . ": " . $e->getMessage());
            throw new \Exception(__("Failed to generate PDF") . ": " . $e->getMessage());
        }
    }
}