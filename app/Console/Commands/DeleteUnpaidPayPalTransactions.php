<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteUnpaidPayPalTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-unpaid-paypal-transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes any transactions that have not been paid for within 72 hours of being created and that were created using PayPal.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Define the time threshold (72 hours ago)
        $threshold = Carbon::now()->subHours(72);

        // Query for Transactions meeting the criteria
        $expiredTransactions = Transaction::where('payment_method', 'paypal')
            ->where('paid', false)
            ->where('updated_at', '<', $threshold)
            ->where('deleted', false)
            ->get();

        if ($expiredTransactions->isEmpty()) {
            $this->info('No expired PayPal transactions found.');
            return;
        }

        // Output the number of expired tickets found
        $this->info(count($expiredTransactions) . ' expired PayPal transactions found.');

        // Foreach expired transaction, get all of its access tickets, and for each access_tickets,
        // get its event_session_ticket and decrease the property "count" by 1
        foreach ($expiredTransactions as $transaction) {
            DB::BeginTransaction();
            foreach ($transaction->accessTickets as $ticket) {
                $ticket->eventSessionTicket->decrement('count');
                $ticket->delete();
            }
            DB::commit();

            // Delete the transaction
            $transaction->deleted = true;
            $transaction->save();
        }

        // Output the number of expired transactions deleted
        $this->info(count($expiredTransactions) . ' expired PayPal transactions deleted.');
    }
}
