<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update the last_month_accrued_leaves column';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $todays_date = date("y/m/d");

        if(date('m')==1){
            DB::table('users')->update(['last_year_accrued_leaves'=> DB::raw('current_year_accrued_leaves')]);
            DB::table('users')->update(['current_year_accrued_leaves'=> 0]);
        }
       DB::table('users')->update(['current_year_accrued_leaves' => DB::raw('current_year_accrued_leaves + 1')]);
       
      

       echo "operation done";
    }
}
