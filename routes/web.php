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
///parents Registration

Route::get('/parent_registration', function () {
    return view('auth.parent_registration');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/unauthorized', function () {
    return view('404');
});



Route::get('/old', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');


Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/showfeedback', 'AdminController@showfeedback');
Route::post('/panel/users/ban', 'AdminController@banFreelancer');
Route::post('/panel/freelancer/unban', 'AdminController@unbanFreelancer');
Route::get('/approveteacher', 'AdminController@showFreelancers');
Route::get('/addteacher', 'AdminController@addteacher');

Route::get('/confirmtution', 'AdminController@showTution');
Route::resource('alltuition', 'TutionController');
Route::post('/panel/tution/ban', 'AdminController@banTution');
Route::post('/panel/tution/unban', 'AdminController@unbanTution');
Route::get('/allteacher', 'AdminController@teacherdetails');
Route::get('/allparents', 'AdminController@parentdetails');

////Add Teacher
Route::resource('addteacher', 'AddteacherController');

Route::post('addteacher/update', 'AddteacherController@update')->name('addteacher.update');

Route::get('addteacher/destroy/{id}', 'AddteacherController@destroy');


Route::resource('booking', 'BookController');


//Teacher Profile
Route::resource('teacher_info', 'TeacherController');
Route::get('/teacher', 'TeacherController@index')->name('teacher');

Route::post('/panel/tution/progress', 'TeacherController@Progress');
Route::post('/panel/tution/complete', 'TeacherController@Complete');

Route::resource('tutionstatus', 'ResourceController');
Route::get('/resourcelist', 'ResourceController@ResourceDetails')->name('resourcelist');
Route::get('/parentresource', 'ResourceController@ParentsResource')->name('parentresource');

Route::get('/waiting', function () {
    return view('waitingpage');
});

Route::get('/resource', function () {
    return view('teachers.resources');
});

////Add Interest Course
Route::resource('intrstcourse', 'InterestcourseController');

Route::post('intrstcourse/update', 'InterestcourseController@update')->name('intrstcourse.update');

Route::get('intrstcourse/destroy/{id}', 'InterestcourseController@destroy');

Route::get('/', 'DashboardController@index');
Route::get('/teacherlist', 'DashboardController@teacherdetails');


//Parents Info
Route::get('/parents', 'ParentsController@index')->name('teacher');
Route::get('/bookinginfo', 'ParentsController@TutionDetails')->name('tutionstatus');
