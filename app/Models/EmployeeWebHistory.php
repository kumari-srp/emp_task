<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeWebHistory extends Model
{
    use SoftDeletes;
	protected $table = 'employee_web_history';

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'ip_address', 'url','date'
	];

	public function getAll()
	{
		return $this->withTrashed()->get();
	}

	public function find($ip_address)
	{
		return $this->where('ip_address',$ip_address)->get();
	}

    public function store($request)
    {                
        return $this->create($request->all());
    }

	public function deleteEmpWebHistory($ip_address)
	{
		return $this->where('ip_address',$ip_address)->delete();
	}
}
