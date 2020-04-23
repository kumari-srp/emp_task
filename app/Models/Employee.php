<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
	use SoftDeletes;
	protected $table = 'employees';

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'emp_id', 'epm_name','ip_address'
	];

	public function getEmpdata($ip_address)
	{
		return $this->where('ip_address',$ip_address)->first();
	}

    public function storeEmployeeData($request)
    {                
        return $this->create($request->all());
    }

	public function deleteEmpdata($ip_address)
	{
		return $this->where('ip_address',$ip_address)->delete();
	}
	
}
