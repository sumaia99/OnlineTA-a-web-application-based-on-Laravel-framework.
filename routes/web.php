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
    return view('welcome');
});


Route::get('/login','LoginController@login');
Route::post('/login','LoginController@dashboard');



/* ################ ROUTE GROUP FOR ADMIN PANEL ################ */

Route::group(['middleware' => 'admin'], function() {

Route::get('/employeeRegister','RegisterController@registerEmployee');
Route::get('/studentRegister','RegisterController@registerStudent');
Route::get('/allTeachers','RegisterController@allTeachers');
Route::get('/allStudents','RegisterController@allStudents');
Route::get('/deleteTeacher/{id}','RegisterController@deleteTeacher');

//Route::post('/register','RegisterController@registration');

Route::post('logout','LoginController@logout');

Route::post('/register','RegisterController@registration');
Route::get('/dashboard','AdminController@adminPanel');


});

