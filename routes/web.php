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



Auth::routes();

Route::get('/profile', 'CommonController@profile')->name('profile');
Route::post('/change_password', 'CommonController@change_password')->name('change_password');



Route::prefix('/sys_admin')->group(function () {
    Route::get('/', 'SysAdminController@index')->name('sys_admin.index');
    Route::get('/students', 'SysAdminController@students')->name('sys_admin.students');
    Route::post('/students', 'SysAdminController@store_student')->name('sys_admin.store_student');
    Route::get('/lecturers', 'SysAdminController@lecturers')->name('sys_admin.lecturers');
    Route::post('/lecturers', 'SysAdminController@store_lecturer')->name('sys_admin.store_lecturer');

    Route::get('/config', 'SysAdminController@config')->name('sys_admin.config');
    Route::post('/add_course', 'SysAdminController@add_course')->name('sys_admin.add_course');
    Route::post('/add_handler', 'SysAdminController@add_handler')->name('sys_admin.add_handler');
    Route::post('/add_position', 'SysAdminController@add_position')->name('sys_admin.add_position');


    Route::put('/update_handler', 'SysAdminController@update_handler')->name('sys_admin.update_handler');
    Route::put('/edit_position', 'SysAdminController@edit_position')->name('sys_admin.edit_position');
    Route::put('/edit_course', 'SysAdminController@edit_course')->name('sys_admin.edit_course');
    Route::put('/edit_lecturer', 'SysAdminController@edit_lecturer')->name('sys_admin.edit_lecturer');
    Route::put('/edit_student', 'SysAdminController@edit_student')->name('sys_admin.edit_student');

});

Route::prefix('/student')->group(function () {
    Route::get('/complaints', 'StudentComplaintController@index')->name('student.allComplaints');
    Route::get('/complaints/{complaint_id}', 'StudentComplaintController@show')->name('student.showComplaint');
    Route::get('/complaints/lectures', 'StudentComplaintController@index')->name('student.lecturesComplaints');
    Route::get('/complaints/grades', 'StudentComplaintController@index')->name('student.gradesComplaints');

    Route::post('/complaints', 'StudentComplaintController@store_complaint')->name('student.store_complaint');
    Route::post('/complaints/reply', 'StudentComplaintController@reply')->name('student.reply');
    Route::post('/edit_complaint', 'StudentComplaintController@edit_complaint')->name('student.edit_complaint');
    Route::post('/complaints/escalate', 'StudentComplaintController@escalate')->name('student.escalate');
    Route::post('/complaint/solved', 'StudentComplaintController@solved')->name('student.solved');

    Route::get('/get/complaints/solved', 'StudentComplaintController@solved_complaints')->name('student.solvedComplaints');
    Route::get('/get/complaints/unsolved', 'StudentComplaintController@unsolved_complaints')->name('student.unsolvedComplaints');


    Route::get('/note', 'StudentComplaintController@note')->name('note');
});

Route::prefix('/lecturer')->group(function () {
    Route::get('/', 'LecturerController@index')->name('lecturer.index');
    Route::get('/complaints', 'LecturerController@complaints')->name('lecturer.complaints');
    Route::get('/complaints/{complaint_id}', 'LecturerController@show')->name('lecturer.showComplaints');
    Route::get('/profile', 'LecturerController@profile')->name('lecturer.profile');

    Route::post('/complaints/reply', 'LecturerController@reply')->name('lecturer.reply');

    Route::get('/get/complaints/solved', 'LecturerController@solved_complaints')->name('lecturer.solvedComplaints');
    Route::get('/get/complaints/unsolved', 'LecturerController@unsolved_complaints')->name('lecturer.unsolvedComplaints');

});
