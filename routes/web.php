<?php
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

/**
 *  you can see the list of all the routes with all details by typing,
 *  php artisan route:list on the commandline. also change your directory to 
 *  this project directory when doing so.
 */

/**
 * Dashboard Route(s)
 * 
 */

Route::get('/index','FrontendController@index')->name('frontend.index')->middleware('Ems');

Route::name('login.')->prefix('login')->group(function () {
    Route::get('', 'FrontendController@EmsIndex')->name('login');
    Route::post('', 'FrontendController@EmsLogin')->name('emschecklogin');
});

Route::get('dynamic-field', 'DynamicFieldController@index');
Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');

Route::get('/dashboard','DashboardController@index')->name('dashboard');

/**
 *  Departments Route(s)
 * 
 */
Route::resource('/departments','DepartmentsController');
Route::post('/departments/search','DepartmentsController@search')->name('departments.search');

/**
 *  Countries Route(s)
 */
Route::resource('/countries','CountriesController');
Route::post('/countries/search','CountriesController@search')->name('countries.search');

/**
 *  Cities Route(s)
 */
Route::resource('/cities','CitiesController');
Route::post('/cities/search','CitiesController@search')->name('cities.search');

/**
 *  Salaries Route(s)
 */
Route::resource('/salaries','SalariesController');
Route::post('/salaries/search','SalariesController@search')->name('salaries.search');

/**
 *  Ssos Route(s)
 */
Route::resource('/ssos','SsosController');
Route::post('/ssos/search','SsosController@search')->name('ssos.search');

/**
 *  Infos Route(s)
 */
Route::resource('/infos','InfosController');
Route::post('/infos/search','InfosController@search')->name('infos.search');

/**
 *  Divisions Route(s)
 */
Route::resource('/divisions','DivisionsController');
Route::post('/divisions/search','DivisionsController@search')->name('divisions.search');

/**
 *  States Route(s)
 */
Route::resource('/states','StatesController');
Route::post('/states/search','StatesController@search')->name('states.search');

/**
 *  States Route(s)
 */
Route::resource('/employees','EmployeesController');

Route::post('employees/search','EmployeesController@search')->name('employees.search');

Route::resource('/payments','PaymentsController');

Route::post('payments/search','PaymentsController@search')->name('payments.search');

Route::resource('/payrolls','PayrollsController');

Route::post('payrolls/search','PayrollsController@search')->name('payments.search');

Route::post('payrolls/sendemailslip','PayrollsController@SendEmailSlip')->name('payrolls.SendEmailSlip');

Route::post('/payrolls/{id}/reports/','PayrollsController@makeReportPayroll')->name('payrolls.makeReportPayroll');
Route::post('/payrolls/reports/','PayrollsController@makeReportPayrollAll')->name('payrolls.makeReportPayrollAll');

/**
 *  Admins Route(s)
 */
Route::resource('/admins','AdminsController');
Route::post('/admins','AdminsController@search')->name('admins.search');
Route::post('/admins/create','AdminsController@store')->name('admins.store');

/**
 *  Auth Route(s)
 */

//show the login view
Route::get('/','AuthController@index')->name('login')->middleware('guest');

//Authenticate a user
Route::post('/','AuthController@authenticate')->name('auth.authenticate');

//logout the user
Route::get('/logout','AuthController@logout')->name('auth.logout')->middleware('auth');

//show user details
Route::get('/admin','AuthController@show')->name('auth.show')->middleware('auth');

Route::get('/password/reset','ResetPassword\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email','ResetPassword\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}','ResetPassword\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset','ResetPassword\ResetPasswordController@reset');

/**
 *  Reports Route(s)
 */

//Show Reports View
Route::get('/reports','ReportsController@index')->name('reports.index');

//Generate PDF
Route::post('/reports/pdf','ReportsController@makeReport')->name('reports.make');
