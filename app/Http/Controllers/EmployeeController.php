<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $emp = Employee::all();
        return $emp;
    }

    public function getEmployee($ip_address)
    {   
        $employee = Employee::where('ip_address', $ip_address)->get();
        if( $employee ){
            return response($employee, 200);
        }
        return response()->json([
          "message" => "Employee not found"
      ], 404);
    }

    public function store(Request $request)
    {
        // $employee = Employee::storeEmployeeData($request->all());
        if(Employee::where('ip_address', $request->ip_address)->exists()) 
        {
            return response()->json([
              "message" => "Employee already exists"
          ], 404);
        }else{
            $employee = new Employee;
            $employee->emp_id = $request->emp_id;
            $employee->emp_name = $request->emp_name;
            $employee->ip_address = $request->ip_address;
            $employee->save();

            return response()->json([
                "message" => "employee record created"
            ], 201);
        }
    }

    // public function store(Request $request)
    // {
    //     Artisan::call("infyom:scaffold", ['name' => $request['name'], '--fieldsFile' => 'public/Product.json']);
    // }

    public function deleteEmployee($ip_address)
    {
        if(Employee::where('ip_address', $ip_address)->exists()) 
        {
            $employee = Employee::where('ip_address', $ip_address)->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        }else{
            return response()->json([
              "message" => "Employee not found"
          ], 404);
        }
    }

}