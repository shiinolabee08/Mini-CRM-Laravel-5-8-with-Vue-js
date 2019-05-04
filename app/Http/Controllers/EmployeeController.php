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
        'email'		=> 'unique:employees'
    ];

    protected $fields_to_update = ['first_name', 'last_name', 'email', 'phone', 'company_id'];

    protected $model_class = 'App\Employee';

    protected $model_resource = 'App\Http\Resources\Employee';

    public function index()
    {
        return new EmployeeCollection(Employee::all());
    }

    public function show($id)
    {
        return new EmployeeResource(Employee::findOrFail($id));
    }
}
