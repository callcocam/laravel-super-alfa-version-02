<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use SIGA\Console\Commands\CreateCommand;
use SIGA\Console\Commands\DefaultCommand;
use SIGA\Console\Commands\EditCommand;
use SIGA\Console\Commands\LivewireCommand;
use SIGA\Console\Commands\ServiceCommand;
use SIGA\Console\Commands\ShowCommand;
use SIGA\Console\Commands\TableCommand;
use App\Console\Commands\TempLogCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        TempLogCommand::class,
        CreateCommand::class,
        EditCommand::class,
        TableCommand::class,
        LivewireCommand::class,
        ShowCommand::class,
        ServiceCommand::class,
        DefaultCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
      
        // $schedule->call(new \App\SIGA\TempLogCleaner)
        // ->everyMinute();
        $schedule->command('make:temp-log')
        ->everyMinute();
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
