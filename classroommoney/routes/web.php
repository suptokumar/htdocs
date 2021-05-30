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
Route::get("/add_live",'soft@add_live');
Route::post("/request_perchage",'soft@request_perchage');
Route::post("/my_class",'soft@my_class');
Route::post("/livesearch",'soft@livesearch');
Route::post("/sohwofsddfiusdfssddgfuawidfhwae",'soft@sohwofsddfiusdfssddgfuawidfhwae');
Route::post("/liveadd",'soft@liveadd');
Route::post("/mylivelist",'soft@mylivelist');
Route::post("/deleteclass",'soft@deleteclass');
Route::get("/invest",'soft@invest');
Route::get("/balance",'soft@balance');
Route::post("/notifications",'soft@notifications');
Route::post("/req_balance",'soft@req_balance');
Route::post("/amt",'soft@amt');
Route::post("/accept_with",'soft@accept_with');
Route::post("/reject_with",'soft@reject_with');
Route::post("/add_marks",'soft@add_marks');
Route::post("/rmv_req",'soft@rmv_req');
Route::post("/delete_notifications",'soft@delete_notifications');
Route::post("/accept_student",'soft@accept_student');
Route::post('/request', 'soft@request');  
Route::post('/delete_request', 'soft@delete_request');  
Route::post('/hammba', 'soft@hammba');  
Route::get('/delete_noti', 'mainct@delete_noti');  
Route::post('/remove_teacher', 'soft@remove_teacher');  
Route::post('/delteanoe', 'soft@delteanoe');  

Route::get('/', 'soft@index');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function() {
Route::get('/', 'mainct@index');
Route::get('/live', 'soft@live');  
Route::get('/teachers', 'soft@teachers');  
Route::post('/veri_teachers', 'soft@veri_teachers');  
Route::post('/livelist', 'soft@livelist');  
Route::post('/bookreqeusts', 'soft@bookreqeusts');  
Route::post('/acceptreader', 'soft@acceptreader');  
Route::post('/deletesreader', 'soft@deletesreader');  
Route::get('/bookrequest', 'soft@bookrequest');  
Route::post('/rejectict', 'soft@rejectict');  
Route::post('/approveict', 'soft@approveict');  
Route::post('/veri_success', 'soft@veri_success');  
Route::get('/withdrawal', 'soft@withdrawal');  
Route::post('/results', 'soft@results');  
Route::post('/amt', 'soft@amts');  
Route::post('/changeit', 'soft@changeit');  
Route::post('/requestapprove', 'soft@requestapprove');  
Route::get('/users', 'mainct@users');  
Route::get('/books', 'soft@books');  
Route::get('/requests', 'mainct@requests');  
Route::get('/class_history/{ras}', 'mainct@class_history');  

});

Route::group(['prefix' => 'student','middleware' => 'student'], function() {
Route::get('/', 'mainct@index');
Route::post('/teacherlist', 'soft@teacherlist');  
Route::post('/result', 'soft@result');  
Route::post('/myteacherlist', 'soft@myteacherlist');  
Route::get('/myteachers', 'soft@myteachers');  
Route::post('/mytutors', 'soft@mytutors');  
Route::get('/tutors', 'soft@mytutor');  
Route::get('/teach', 'soft@teach');  
Route::get('/mymarksheet', 'soft@mymarksheets');  
Route::get('/settings', 'mainct@settings');  
Route::get('/library', 'soft@library');  
Route::get('/mybooks', 'soft@mybooks');  

});



Route::group(['prefix' => 'teacher','middleware' => 'teacher'], function() {
Route::get('/', 'mainct@index');
Route::get('/settings', 'mainct@settings');  
Route::get('/requests', 'soft@requestpage');  
Route::get('/mystudents', 'soft@mystudents');  
Route::get('/add_mark/{id}', 'soft@add_mark');  
Route::get('/mymarksheet', 'soft@mymarksheet');  
Route::post('/mystudentlist', 'soft@mystudentlist');  
Route::post('/mystudentlistofmark', 'soft@mystudentlistofmark');  
Route::post('/requests', 'soft@requestlist');  
});
});

