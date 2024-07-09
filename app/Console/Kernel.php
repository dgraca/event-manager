<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:delete-unpaid-paypal-transactions')->daily();
        //$schedule->command('app:delete-unpaid-bank-transfer-transactions')->daily();
        $schedule->command('app:send-tickets-for-paid-transactions')->everyMinute();

        $schedule->command('queue:restart')->hourly();

        // run the queue worker "without overlapping"
        // this will only start a new worker if the previous one has died
        $schedule->command("queue:work --tries=3 --sleep=10")
            ->everyMinute()
            ->name('queue_notifications')
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
