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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout'); //TODO : remove me

Route::get('/note', function () {
    return view('note');
})->name('note');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('/sys_admin')->group(function () {
    Route::get('/', 'SysAdminController@index')->name('sys_admin.index');
    Route::get('/students', 'SysAdminController@students')->name('sys_admin.students');
    Route::post('/students', 'SysAdminController@store_student')->name('sys_admin.store_student');
    Route::get('/lecturers', 'SysAdminController@lecturers')->name('sys_admin.lecturers');
    Route::post('/lecturers', 'SysAdminController@store_lecturer')->name('sys_admin.store_lecturer');

    Route::get('/config', 'SysAdminController@config')->name('sys_admin.config');
    Route::post('/add_course', 'SysAdminController@add_course')->name('sys_admin.add_course');
    Route::post('/add_handler', 'SysAdminController@add_handler')->name('sys_admin.add_handler');

});

Route::prefix('/student')->group(function () {
    Route::get('/complaints/all', 'StudentComplaintController@index')->name('student.allComplaints');
    Route::get('/complaints/{complaint_id}', 'StudentComplaintController@show')->name('student.showComplaint');
    Route::get('/complaints/lectures', 'StudentComplaintController@index')->name('student.lecturesComplaints');
    Route::get('/complaints/grades', 'StudentComplaintController@index')->name('student.gradesComplaints');
});

Route::prefix('/lecturer')->group(function () {
    Route::get('/', 'LecturerController@index')->name('lecturer.index');
    Route::get('/complaints', 'LecturerController@complaints')->name('lecturer.complaints');
    Route::get('/profile', 'LecturerController@profile')->name('lecturer.profile');
});
