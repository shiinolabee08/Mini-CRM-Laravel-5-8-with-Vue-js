<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
* Resources/Collections
**/
use App\Employee as Employee;
use App\Http\Resources\Employee as EmployeeResource;
use App\Http\Resources\EmployeeCollection;

use App\Company as Company;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\CompanyCollection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $fields_to_validate = [];

    protected $fields_to_update = [];

    protected $model_class;

    protected $model_resource;

    /**
    * Storing records of child class ie Employee/Company
    * @param Request $request
    *
    * @return obj | Model Resource
    **/
    public function store(Request $request)
    {
        $request->validate($this->fields_to_validate);

        $newRecord = $this->model_class::create($request->all());

        return (new $this->model_resource($newRecord))
                ->response()
                ->setStatusCode(201);
    }

    /**
    * Updating records of child class ie Employee/Company
    * @param int | $id
    * @param Request $request
    *
    * @return obj | Model Resource
    **/
    public function update($id, Request $request)
    {  	

    	$request->validate($this->fields_to_validate);

    	$record = $this->model_class::findOrFail($id);
        $record->update($request->only($this->fields_to_update));

        return new $this->model_resource($record);
    }

    /**
    * Deleting records of child class ie Employee/Company
    * @param int | $id
    *
    * @return obj | Model Resource
    **/
    public function delete($id)
    {
        $record = $this->model_class::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}
