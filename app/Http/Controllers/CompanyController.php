<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\CompanyCollection;

class CompanyController extends Controller
{
    protected $fields_to_validate = [
        'name'  => 'required|max:255',
        'email' => 'unique'
    ];

    protected $fields_to_update = [ 'name', 'email', 'logo', 'website_url' ];

    protected $model_class = 'Company';

    protected $model_resource = 'CompanyResource';

    public function index()
    {
        return new CompanyCollection(Company::all());
    }

    public function show($id)
    {
        return new CompanyResource(Company::findOrFail($id));
    }
}
