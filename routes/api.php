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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/{id}', 'EmployeeController@show');
Route::post('/employees', 'EmployeeController@store');
Route::post('/employees/{id}/update', 'EmployeeController@update');
Route::delete('/employees/{id}', 'EmployeeController@delete');

Route::get('/companies', 'CompanyController@index');
Route::get('/companies/{id}', 'CompanyController@show');
Route::post('/companies', 'CompanyController@store');
Route::post('/companies/{id}/update', 'CompanyController@update');
Route::delete('/companies/{id}', 'CompanyController@delete');
