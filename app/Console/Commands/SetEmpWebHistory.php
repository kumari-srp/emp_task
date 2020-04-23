<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmployeeWebHistory;
use DB;

class SetEmpWebHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:set {ip_address} {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save EmployeeWebHistory Data';

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
        $employee_web_history = DB::table('employee_web_history')->insert(['ip_address' => $this->argument('ip_address'), 'url' => $this->argument('url')]);

        $this->info('Record Saved successfully!');
    }
}
