<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;
use DB;

class SetEmpdata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:set {emp_id} {emp_name} {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CommSave Employee Data';

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
        $employee = DB::table('employees')->where('ip_address', $this->argument('ip_address'))->first();

        if($employee)
        {
            $this->error('Record already exist!');
        }else{
            $employee = DB::table('employees')->insert(['emp_id' => $this->argument('emp_id'), 'emp_name' => $this->argument('emp_name'),'ip_address'=> $this->argument('ip_address')]);

            $this->info('Record Saved successfully!');
        }
    }
}
