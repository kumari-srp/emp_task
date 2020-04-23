<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeWebHistoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGet()
    {
        $this->get('/empwebhistory/192.168.10.10')
             ->seeJsonStructure([
             	"id": 1,
    			"ip_address": "191.168.10.10",   
    			"urls": {
	  			“url”: "http://google.com",
	  			“url”: “http://facebook.com”
     		}
        ]);
    }

    public function testSet()
    {
    	if($this->get('/employees/192.168.10.10'))
    	{
        	$this->json('POST', '/empwebhistory', ['ip_address' => '191.168.10.10', 'url' =>'http://google.com'])
             ->seeJsonEquals([
                 'created' => true,
            ]);
        }
    }

    public function testDelete()
    {
        $this->delete('/empwebhistory/192.168.10.10')
             ->seeJsonStructure([
             	'deleted' => true,
             ]);
    }
}
