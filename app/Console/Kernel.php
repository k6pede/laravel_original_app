<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplyMail;
use App\Mail\ApplyMailforModify;
use App\Mail\FormUserMail;

class Kernel extends ConsoleKernel
{   

    protected $commands = [
        Commands\MailTest::class
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        //$schedule->command('email:send')->dailyAt('00:00');
        $schedule->command('email:send')->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        

        require base_path('routes/console.php');
    }
}
