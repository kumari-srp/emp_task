<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGet()
    {
        $this->get('/employees/192.168.10.10')
             ->seeJsonStructure([
             	"id": 1,
    			"emp_id": "1",   
    			"emp_name": "Jack Petter",   
    			"ip_address": "191.168.10.10"
             ]);
    }

    public function testSet()
    {
        $this->json('POST', '/employees', ['emp_id' => '1', 'emp_name' =>'Jack Petter', 'ip_address' => '191.168.10.10'])
             ->seeJsonEquals([
                 'created' => true,
             ]);
    }

    public function testDelete()
    {
        $this->delete('/employees/192.168.10.10')
             ->seeJsonStructure([
             	'deleted' => true,
             ]);
    }

}
