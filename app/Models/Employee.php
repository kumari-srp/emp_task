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
		'emp_id', 'emp_name','ip_address'
	];

	public function getAllEmp()
	{
		return $this->withTrashed()->get();
	}

	public function getEmpdata($ip_address)
	{
		return $this->where('ip_address',$ip_address)->first();
	}

    public function storeAll($request)
    {                
        return $this->create($request->all());
    }

	public function deleteEmpdata($ip_address)
	{
		return $this->where('ip_address',$ip_address)->delete();
	}
	
}
