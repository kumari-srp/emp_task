<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeWebHistory;

class EmpWebHistoryController extends Controller
{
    public function index()
    {
        $emp = EmployeeWebHistory::all();
        return $emp;
    }

    public function show($ip_address)
    {   
        $employee = EmployeeWebHistory::where('ip_address', $ip_address)->get();
        if( $employee ){
            return response($employee, 200);
        }
        return response()->json([
          "message" => "Resourse not found"
      ], 404);
    }

    public function store(Request $request)
    {        
        $employee = new EmployeeWebHistory;
        $employee->ip_address = $request->ip_address;
        $employee->url = $request->url;
        $employee->date = $request->date;
        $employee->save();

        return response()->json([
            "message" => "Record created"
        ], 201);
    }

    public function delete($ip_address)
    {
        if(EmployeeWebHistory::where('ip_address', $ip_address)->exists()) 
        {
            $employee = EmployeeWebHistory::where('ip_address', $ip_address)->delete();

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
