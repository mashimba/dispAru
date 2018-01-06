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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addstudent', 'HomeController@addstudent');
Route::get('/editpatient', 'HomeController@editpatient');

Route::resource('patients', 'PatientsController');
Route::get('menu', 'HomeController@checkRegistered');

Route::get('testing', 'PatientsController@checkRegistered');

Route::get('searchit', 'HomeController@liveSearch');

/*
validation of input routes
 */
Route::get('validRegNo', 'PatientsController@validateRegNo');
Route::get('validNhifNo', 'PatientsController@validateNhifNo');
Route::get('validFiileNo', 'PatientsController@validateFileNo');


/*
confirm delete
 */
// Route::get('/confirmDel', 'PatientsController@deletePatient');