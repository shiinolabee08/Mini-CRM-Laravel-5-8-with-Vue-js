<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Http\Resources\Employee as EmployeeResource;
use App\Http\Resources\EmployeeCollection;

//get_class($this)

class EmployeeController extends Controller
{
	protected $fields_to_validate = [
        'first_name'=> 'required|max:255',
        'last_name' => 'required|max:255',
        'email'		=> 'unique'
    ];

    protected $fields_to_update = ['first_name', 'last_name', 'email', 'phone', 'company_id'];

    protected $model_class = 'Employee';

    protected $model_resource = 'EmployeeResource';

    public function index()
    {
        return new EmployeeCollection(Employee::all());
    }

    public function show($id)
    {
        return new EmployeeResource(Employee::findOrFail($id));
    }

    /*public function store(Request $request)
    {
        $request->validate([
            'first_name'=> 'required|max:255',
            'last_name' => 'required|max:255',
            'email'		=> 'unique'
        ]);

        $employee = Employee::create($request->all());

        return (new EmployeeResource($employee))
                ->response()
                ->setStatusCode(201);
    }

    public function update($id, Request $request)
    {  	

    	$request->validate([
            'first_name'=> 'required|max:255',
            'last_name' => 'required|max:255',
            'email'		=> 'unique'
        ]);

    	$employee = Employee::findOrFail($id);
        $employee->update($request->only(['first_name', 'last_name', 'email', 'phone', 'company_id']));

        return new EmployeeResource($employee);
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(null, 204);
    }
    */
}
