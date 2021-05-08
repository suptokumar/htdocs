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
Route::get("/login",'mainct@login');
Route::post("/login",'mainct@logined');
Route::get("/logout",'mainct@logout');
Route::get("/student_register",'mainct@student_register');
Route::post("/student_register",'soft@student_registered');
Route::get("/teacher_register",'mainct@teacher_register');
Route::post("/teacher_register",'soft@teacher_registered');
Route::post("/teacher_update",'soft@teacher_update');
Route::post("/accept_student",'soft@accept_student');
Route::post("/student_update",'soft@student_update');

Route::group(['middleware' => 'login'], function() {

Route::get("/profile/{id}",'soft@profile');
Route::get("/settings",'soft@settings');
Route::post("/notifications",'soft@notifications');
Route::post("/notifications",'soft@notifications');
Route::post("/delete_notifications",'soft@delete_notifications');
Route::post("/accept_student",'soft@accept_student');
Route::post('/request', 'soft@request');  
Route::post('/delete_request', 'soft@delete_request');  
Route::get('/delete_noti', 'mainct@delete_noti');  
Route::post('/remove_teacher', 'soft@remove_teacher');  

Route::get('/', 'soft@index');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function() {
Route::get('/', 'mainct@index');
Route::get('/teachers', 'soft@teachers');  
Route::post('/veri_teachers', 'soft@veri_teachers');  
Route::post('/veri_success', 'soft@veri_success');  
Route::get('/users', 'mainct@users');  
Route::get('/requests', 'mainct@requests');  
Route::get('/class_history/{ras}', 'mainct@class_history');  

});

Route::group(['prefix' => 'student','middleware' => 'student'], function() {
Route::get('/', 'mainct@index');
Route::post('/teacherlist', 'soft@teacherlist');  
Route::post('/myteacherlist', 'soft@myteacherlist');  
Route::get('/myteachers', 'soft@myteachers');  
Route::get('/teach', 'soft@teach');  
Route::get('/settings', 'mainct@settings');  

});



Route::group(['prefix' => 'teacher','middleware' => 'teacher'], function() {
Route::get('/', 'mainct@index');
Route::get('/settings', 'mainct@settings');  
Route::get('/requests', 'soft@requestpage');  
Route::get('/mystudents', 'soft@mystudents');  
Route::post('/mystudentlist', 'soft@mystudentlist');  
Route::post('/requests', 'soft@requestlist');  
});
});

