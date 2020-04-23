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
}
