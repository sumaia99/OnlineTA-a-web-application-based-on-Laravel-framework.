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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login','LoginController@login');
Route::post('/login','LoginController@dashboard');
Route::post('/student_login','LoginController@studentDashboard');
Route::get('/','NoticeController@userHome');
Route::get('/view-notice/{id}','NoticeController@userViewNotice');
Route::get('view-notice/','NoticeController@adminViewNotice');

/* ################ ROUTE GROUP FOR ADMIN PANEL ################ */

Route::group(['middleware' => 'admin'], function() {

Route::get('/employeeRegister','RegisterController@registerEmployee');
Route::get('/studentRegister','RegisterController@registerStudent');
Route::get('/allTeachers','RegisterController@allTeachers');
Route::get('/allStudents','RegisterController@allStudents');
Route::get('/deleteTeacher/{id}','RegisterController@deleteTeacher');
Route::get('/library-panel','LibraryController@index');
Route::post('/upload-book','LibraryController@uploadBook');
Route::get('/view-book','LibraryController@viewBook');
Route::get('/classroom_panel','ClassroomController@index');
Route::post('/create-department','ClassroomController@createDepartment');
Route::get('/notice','NoticeController@index');
Route::post('/post-notice','NoticeController@postNotice');


/* ################ ROUTE GROUP FOR USER PANEL ################ */

Route::get('/blog','UserController@blog');
Route::get('/profile','UserController@profile');
Route::get('/single_blog_post','UserController@single_blog_post');
Route::get('/classroom','UserController@classroom');
Route::get('/classroom_details','UserController@classroom_details');
Route::get('/library','LibraryController@viewBookToUsers');

//Route::post('/register','RegisterController@registration');

Route::post('logout','LoginController@logout');
Route::post('student_logout','LoginController@student_logout');
Route::post('/register','RegisterController@registration');
Route::post('/update_data/{id}','RegisterController@updateRegisteredUserData');
Route::get('/dashboard','AdminController@adminPanel');

});