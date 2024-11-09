<?php

namespace App\Console;

use App\Console\Commands\SendBirthdayNotificationAlert;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Schedule the birthday notification command to run daily at a specific time
        $schedule->command('birthday:notify')->dailyAt('00:00'); // Adjust the time as needed
        // $schedule->command('birthday:notify')->everyTwoSeconds(); // For testing purpose - discard before production
        $schedule->command('send:birthday-notifications')->dailyAt('09:08');

    }
    protected $commands = [
        \App\Console\Commands\BirthdayNotificationCommand::class,
        \App\Console\Commands\SendBirthdayNotificationAlert::class,
    ];

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
