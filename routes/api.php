<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//Employee
Route::get('employees', 'EmployeeController@index');
Route::get('employees/{ip_address}', 'EmployeeController@getEmployee');
Route::post('employees', 'EmployeeController@store');
Route::delete('employees/{ip_address}', 'EmployeeController@deleteEmployee');

//Employee web History
Route::get('empwebhistory', 'EmpWebHistoryController@index');
Route::get('empwebhistory/{ip_address}', 'EmpWebHistoryController@show');
Route::post('empwebhistory', 'EmpWebHistoryController@store');
Route::delete('empwebhistory/{ip_address}', 'EmpWebHistoryController@delete');
