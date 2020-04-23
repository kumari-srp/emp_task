<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmployeeWebHistory;
use DB;

class UnsetEmpWebHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:unset {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete EmployeeWebHistory Data';

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
     * @return mixed
     */
    public function handle()
    {
       $employee_web_history = DB::table('employee_web_history')->where('ip_address', $this->argument('ip_address'))->delete();

        $this->info('Record deleted!');
    }
}
