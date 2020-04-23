<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;
use DB;

class Empdata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:get {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Employee data';

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
            dd($employee);
        }else{
            $this->error('Resource not found!');
        }
    }

}
