<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Disclaimer: This helper was kindly provided by noop
 *
 * This helper class is responsible for converting Word documents to PDF using the Word2PDF API by noop.
 */
class Word2Pdf
{
    // Inside Word2Pdf helper class
    public static function convertDocument2Pdf($pathToTemplate, $formData)
    {
        $apiUrl = 'https://wordgenerator.noop.pt/generator_word_to_pdf_var/cabcdefghijklmnopqrst';

        try {
            // Send the file to the conversion API
            $response = Http::asMultipart()
                ->attach('file', file_get_contents($pathToTemplate), 'document.docx')
                ->post($apiUrl, $formData);

            if ($response->successful()) {
                // If the request is successful, return the body of the response
                return $response->body();
            } else {
                // If the request is not successful, return an array with the error message
                return ['error' => __('Response was not successful.') . ' ' . $response->body()];
            }
        } catch (\Exception $e) {
            // If an exception occurs, return an array with the error message
            return ['error' => $e->getMessage()];
        }
    }

}
