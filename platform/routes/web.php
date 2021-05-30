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
Route::get("/register",'mainct@register');
Route::post("/register",'mainct@registered');
Route::post("/n",'mainct@n');
Route::get("/details/{id}",'mainct@details');
Route::get("/accept/{class}/{index}",'mainct@accept');

Route::group(['middleware' => ['login','CORS']], function() {

Route::post("/user_get",'mainct@user_get');
Route::post("/update",'mainct@update');
Route::get("/upcoming/{id}",'mainct@upcoming');
Route::post("/add_class",'mainct@add_classes');
Route::post("/student_list",'dclient@student_list');

Route::post('/load_reports', 'dclient@load_reports');  
Route::post('/reportstseet', 'dclient@reportstseet');  
Route::get('/notifications', 'mainct@notification');  
Route::post('/notifications', 'mainct@notifications');  


Route::get('/request_cancel/{id}/time/{time}', 'mainct@request_cancel');  

Route::get('/request_change/{id}/time/{time}', 'mainct@request_change'); 

Route::post('/reqs_t', 'mainct@reqs_t');  
Route::post('/reqs_d', 'mainct@reqs_d');  
Route::post('/delete_req', 'mainct@delete_req');  
Route::post('/approvereq', 'mainct@approvereq');  


Route::post('/delete_class', 'mainct@delete_class');  
Route::post('/update_client', 'mainct@update_client');  
Route::post('/create', 'mainct@create');  
Route::get('/delete_noti', 'mainct@delete_noti');  
Route::get('/notes/{id}', 'dclient@notes');  
Route::get('/create_client', 'mainct@create_client');  
Route::get('/students', 'mainct@studentsgt');  
Route::get('/teachers', 'mainct@teachersgt');  
Route::get('/assignment/{id}', 'dclient@assignment');  
Route::post('/create_client', 'mainct@create_clients');  
Route::post('/laod_class', 'dclient@laod_class');  
Route::post('/awgafasdfew', 'dclient@awgafasdfew');  
Route::post('/upload', 'mainct@upload');  
Route::post('/upload_note', 'mainct@upload_note');  
Route::post('/mark_attendence', 'dclient@mark_attendence');  
Route::get('/', 'mainct@index');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function() {
    Route::post('/load_reports', 'dclient@load_reports');  

Route::get('/', 'mainct@index');
Route::get('/users', 'mainct@users');  
Route::get('/requests', 'mainct@requests');  
Route::get('/class_history/{ras}', 'mainct@class_history');  
Route::get('/user_list', 'mainct@user_list');  
Route::post('/user_list', 'mainct@user_list');  
Route::post('/get_requests', 'mainct@get_requests');  
Route::post('/login', 'dclient@login');  
Route::post('/block', 'mainct@block');  
Route::get('/manage_class', 'mainct@manage_class');  
Route::post('/manage_class', 'mainct@get_classes');  
Route::post('/lilupdate', 'mainct@lilupdate');  
Route::get('/settings', 'mainct@settings');  
Route::get('/teachers', 'mainct@teachers');  
Route::get('/students', 'mainct@students');  
Route::get('/payments', 'mainct@payment');  
Route::post('/payments', 'dclient@payment');  
Route::post('/waitings/add', 'dclient@waitings_post');  
Route::post('/waitings/edit', 'dclient@waitings_edit');  
Route::get('/waitings', 'dclient@waitings');  
Route::post('/waitings_list', 'dclient@waitings_list');  
Route::post('/delete_waiting', 'dclient@delete_waiting');  
Route::get('/waitings/add', 'dclient@add_waitings');  
Route::get('/waitings/add/{id}', 'dclient@add_waitings_id');  
Route::get('/add_class', 'mainct@add_class');  
Route::get('/clients', 'mainct@clients');  
Route::get('/editclient/{id}', 'mainct@editclient');  
Route::post('/get_payment', 'dclient@get_payment');  
Route::post('/clients', 'mainct@get_clients');  
});

Route::group(['prefix' => 'student','middleware' => 'student'], function() {
Route::get('/', 'mainct@index');
Route::get('/settings', 'mainct@settings');  
Route::get('/my_class', 'dclient@my_class');  
Route::get('/manage_class', 'dclient@manage_class');  
Route::get('/allpreclass', 'dclient@allpreclass');  
Route::get('/allclass', 'dclient@allclass');  
});



Route::group(['prefix' => 'teacher','middleware' => 'teacher'], function() {
Route::get('/', 'mainct@index');
Route::get('/my_class', 'dclient@my_classt');  
Route::get('/manage_class', 'dclient@manage_class');  
Route::get('/settings', 'mainct@settings');  
Route::get('/settings', 'mainct@settings');  
});
});

