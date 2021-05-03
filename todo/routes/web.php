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



// Route Grouping

// Route::group(['prefix'=>"account"],function(){
// 	Route::get("/login",function(){
// return "a";
// 	});
// 	Route::get("/logout",function(){
// 		return "a";
// 	});
// 	Route::get("/register",function(){
// 		return "a";
// 	});
// });

// Route Grouping
Route::group(['middleware'=>"dashboard"],function(){
App::setlocale("en");
Route::get('/', "SiteController@home");
Route::get('/add_tasks', "SiteController@add_task");
Route::post('/add_tasks', "SiteController@add_tasks");
Route::post('/feedback', "SiteController@feedback");
Route::get('/add_month', "SiteController@add_month");
Route::get('/lifestyle', "SiteController@lifestyle");
Route::get('/all_tasks', "SiteController@all_tasks");
Route::post('/lifestyle', "SiteController@lifestyles");
Route::post('/del', "SiteController@del");
Route::get('/apply_month', "SiteController@apply_months");
Route::get('/user_payment', "SiteController@user_payment");
Route::get('/apply_month/{rd}', "SiteController@appsly_monsth_one");
Route::get('/collect/{rd}', "SiteController@collect");
Route::post('/collect', "SiteController@collected");
Route::get('/add_member/{id}', "SiteController@edit_member");
Route::get('/delete_member/{id}', "SiteController@delete_member");
Route::get("/logout","SiteController@logout");



// Route::get("/make","SiteController@make")->name("dk");

// Route::resource('books', Books::class);
});

Route::post("/login","SiteController@logme");
Route::get("/login","SiteController@login");
Route::get("/register","SiteController@register");
Route::post("/register","SiteController@regme");