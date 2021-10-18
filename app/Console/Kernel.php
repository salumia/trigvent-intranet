<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
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

        $schedule->call(function () {
            if(date('m')==1){
                DB::table('users')->update(['last_year_accrued_leaves'=> DB::raw('current_year_accrued_leaves')]);
                DB::table('users')->update(['current_year_accrued_leaves'=> 0]);
            }
           DB::table('users')->update(['current_year_accrued_leaves' => DB::raw('current_year_accrued_leaves + 1')]);
           
          
    
           echo "operation done";
        })->everyMinute();

// $schedule->command('minute:update')->everyMinute();
        

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
