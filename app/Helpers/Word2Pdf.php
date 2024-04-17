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
    public static function convertDocument2Pdf($pathToTemplate, $formData)
    {
        $apiUrl = 'https://wordgenerator.noop.pt/generator_word_to_pdf_var/cabcdefghijklmnopqrst';

        try {
            // Envio do ficheiro para a API de conversão
            $response = Http::asMultipart()
                ->attach('file', file_get_contents($pathToTemplate), 'document.docx')
                ->post($apiUrl, $formData);

            if ($response->successful()) {
                // Se a solicitação for bem-sucedida, retorna o corpo da resposta
                return $response->body();

            } else {
                // Se a solicitação não for bem-sucedida, registra um erro e retorna uma resposta de erro
                Log::error('Erro ao enviar o arquivo para a API:' . $response->status() . $response->body());
                flash(__('Error generating the PDF'))->error()->overlay();
                return redirect()->back();
            }

        } catch (\Exception $e) {
            // Em caso de exceção, registra o erro e retorna uma resposta de erro
            Log::error('Erro na Geração de PDF: ' . $e->getMessage());
            flash(__('Error generating the PDF'))->error()->overlay();
            return redirect()->back();
        }
    }
}
