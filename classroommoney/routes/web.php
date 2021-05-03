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

Route::group(['middleware' => 'login'], function() {

Route::get('/notifications', 'mainct@notification');  
Route::post('/notifications', 'mainct@notifications');  
Route::get('/delete_noti', 'mainct@delete_noti');  

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
Route::get('/settings', 'mainct@settings');  
Route::get('/my_class', 'dclient@my_class');  
Route::get('/manage_class', 'dclient@manage_class');  
});



Route::group(['prefix' => 'teacher','middleware' => 'teacher'], function() {
Route::get('/', 'mainct@index');
Route::get('/my_class', 'dclient@my_classt');  
Route::get('/manage_class', 'dclient@manage_class');  
Route::get('/settings', 'mainct@settings');  
Route::get('/settings', 'mainct@settings');  
});
});

