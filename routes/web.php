<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// company
Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('/addNewCompany', 'CompanyController@create')->name('addNewCompany');
Route::get('/deleteCompany/{id}', 'CompanyController@destroy');
Route::get('/editCompany/{id}', 'CompanyController@edit');
Route::post('/updateCompany', 'CompanyController@update')->name('updateCompany');
Route::post('/saveNewCompany', 'CompanyController@store')->name('saveNewCompany');
// employee
Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/addNewEmployee', 'EmployeeController@create')->name('addNewEmployee');
Route::post('/saveNewEmployee', 'EmployeeController@store')->name('saveNewEmployee');
Route::get('/deleteEmployee/{id}', 'EmployeeController@destroy');
Route::get('/editEmployee/{id}', 'EmployeeController@edit');
Route::post('/updateEmployee', 'EmployeeController@update')->name('updateEmployee');


