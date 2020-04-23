<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;
use DB;

class UnsetEmpdata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:unset {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Employee Data';

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
       $employee = DB::table('employees')->where('ip_address', $this->argument('ip_address'))->delete();

        $this->info('Record deleted!');
    }
}
