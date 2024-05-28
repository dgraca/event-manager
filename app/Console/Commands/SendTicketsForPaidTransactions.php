<?php

namespace App\Console\Commands;

use App\Jobs\GenerateAccessTicketPDF;
use App\Models\Transaction;
use Illuminate\Console\Command;

class SendTicketsForPaidTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-tickets-for-paid-transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends the tickets via email to the user, when the payment is confirmed.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all the transactions that are paid and the emails were not sent
        $transactions = Transaction::where('emails_sent', false)
            ->where('paid', true)
            ->where('deleted', false)
            ->get();

        // For each transaction, get all its access tickets and its eventSessionTickets
        foreach ($transactions as $transaction) {
            $accessTickets = collect();
            $eventSessionTickets = collect();
            $event = $transaction->accessTickets->first()->eventSessionTicket->ticket->event;

            foreach ($transaction->accessTickets as $accessTicket) {
                $accessTickets->push($accessTicket);
                $eventSessionTickets->push($accessTicket->eventSessionTicket);
            }

            // Generate the PDF and send the email
            GenerateAccessTicketPDF::dispatch($event, $eventSessionTickets, $accessTickets);

            // Mark the transaction as emails sent
            $transaction->emails_sent = true;
            $transaction->save();
        }
    }
}
