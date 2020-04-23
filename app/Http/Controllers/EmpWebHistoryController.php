<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeWebHistory;
use App\Models\Employee;

class EmpWebHistoryController extends Controller
{
    public function index()
    {
        $emp_web_history=(new EmployeeWebHistory)->getAll();
        return $emp_web_history;
    }

    public function get($ip_address)
    {   
        $emp_web_history=(new EmployeeWebHistory)->find($ip_address);

        if( $emp_web_history ){
            return response($emp_web_history, 200);
        }
        return response()->json([
          "message" => "Resourse not found"
      ], 404);
    }

    public function set(Request $request)
    {    
        $employee=(new Employee)->getEmpdata($request->ip_address);

        if($employee)
        {    
            $employee_web_history=(new EmployeeWebHistory)->store($request);

            return response()->json([
                "message" => "Record created"
            ], 201);
        }else{
            return response()->json([
              "message" => "Employee IP Address not found"
          ], 404);
        }
    }

    public function delete($ip_address)
    {
        $emp_web_history=(new EmployeeWebHistory)->find($ip_address);

        if( $emp_web_history )
        {
            $employee_web_history = (new EmployeeWebHistory)->deleteEmpWebHistory($ip_address);

            return response()->json([
                "message" => "records deleted"
            ], 202);
        }else{
            return response()->json([
              "message" => "Resourse not found"
          ], 404);
        }
    }
    
}
