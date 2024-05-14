<?php

namespace App\Console\Commands;

use App\Models\AccessTicket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteUnpaidBankTransferAccessTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-unpaid-bank-transfer-access-tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes any access tickets that have not been paid for within 72 hours of being created and that were created using a bank transfer.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Define the time threshold (72 hours ago)
        $threshold = Carbon::now()->subHours(72);

        // Query for AccessTickets meeting the criteria
        $expiredTickets = AccessTicket::where('payment_method', 'bank_transfer')
            ->where('paid', false)
            ->where('updated_at', '<', $threshold)
            ->get();

        if ($expiredTickets->isEmpty()) {
            $this->info('No expired access tickets found.');
            return;
        }

        // Output the number of expired tickets found
        $this->info(count($expiredTickets) . ' expired access tickets found.');
    }
}
