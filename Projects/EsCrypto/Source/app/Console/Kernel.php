<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     php artisan update:payments
     php artisan update:links
     the command will run every day at midnight (00:00) and only update the payments every two days
        // $schedule->command('inspire')->hourly();
        // $schedule->command('update:links')->daily();

                //         Artisan::call('update:links'); //Daily
        //         Artisan::call('update:payments'); //Daily
        //         Artisan::call('update:price'); //Daily
        //         Artisan::call('update:balance'); //Hourly


     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('update:links')->dailyAt('00:00');
        $schedule->command('update:price')->dailyAt('00:00');
        $schedule->command('update:daily')->dailyAt('00:00');
        $schedule->command('update:news')->dailyAt('10:00');

        $schedule->command('update:balance')->hourly();
        $schedule->command('update:payments')->daily(2)->at('00:00');
        
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
