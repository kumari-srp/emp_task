<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $emp = (new Employee)->getAllEmp();
        return $emp;
    }

    public function get($ip_address)
    {   
        $employee=(new Employee)->getEmpdata($ip_address);

        if( $employee ){
            return response($employee, 200);
        }
        return response()->json([
          "message" => "Employee not found"
      ], 404);
    }

    public function set(Request $request)
    {
        $employee=(new Employee)->storeAll($request);

        return response()->json([
            "message" => "employee record created"
        ], 201);
    }

    public function delete($ip_address)
    {
        $employee=(new Employee)->getEmpdata($ip_address);

        if($employee)
        {
            $employee = (new Employee)->deleteEmpdata($ip_address);

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