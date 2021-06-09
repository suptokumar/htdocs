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
Route::get("/login","soft@login");
Route::post("/login","soft@logined");
Route::post("/register","soft@registers");
Route::get("/register","soft@register");
Route::get("/forgetpass","soft@forgetpass");
Route::get("/logout","soft@logout");
Route::get("/robot","soft@robot");
Route::group(['middleware' => 'login'], function() {
Route::get('/', function () {
    return view('appstart');
});
Route::group(['middleware' => 'admin'], function() { 
Route::get('/dashboard', 'soft@admin');

Route::get("/clouds","soft@clouds");

Route::post("/filesaver","soft@filesaver");
Route::post("/get_result","soft@get_result");
Route::get("/get_result","soft@get_result");
Route::get("/users","soft@users");
Route::get("/createuser","soft@createuser");
Route::get("/records","soft@records");
Route::get("/edituser/{id}","soft@edituser");
Route::post("/createuser","soft@createusers");
Route::post("/edituser","soft@editusers");
Route::post("/deleteuser","soft@deleteuser");
Route::post("/userlist","soft@userlist");
Route::post("/recordlist","soft@recordlist");
Route::post("/view_numbers","soft@view_numbers");
Route::post("/del","soft@del");
});
});