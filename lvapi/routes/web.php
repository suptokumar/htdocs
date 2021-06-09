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

// Login Route

Route::get("/",function(){return redirect("/admin");});
Route::get("login",'soft@login');
Route::get("logout",'soft@logout');
Route::get("permissionerror",'soft@permissionerror');
Route::post("login",'soft@makelogin');

Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
    Route::get('/', "soft@index");
    Route::get("/paymentdetails","soft@paymentdetails");
    Route::get("/editgateway/{id}","soft@editgateway");
    Route::get("/editgateway",function(){return back();});
    Route::get("/addnewpayment","soft@addnewpayment");
    Route::post("/statuschanger","soft@statuschanger");
    Route::post("/load_gateway","soft@load_gateway");
    Route::post("/deletepaymentgateway","soft@deletepaymentgateway");
    Route::post("/createapi/addpaymentgateway","soft@addgateway");
    Route::post("/createapi/editpaymentgateway","soft@editpaymentgateway");

    // Route For User Management
    Route::get("/users","soft@users");
    Route::get("/createusers","soft@createusers");
    Route::get("/edituser/{id}","soft@edituser");
    Route::get("/privileges/{id}","soft@privileges");
    Route::post("/load_user","soft@load_user");
    Route::post("/deleteusers","soft@deleteusers");
    Route::post("/privilegessave","soft@privilegessave");
    Route::post("/createapi/adduserintodatabase","soft@adduserintodatabase");
    Route::post("/createapi/updateusers","soft@updateusers");

    // Route for Exchange Management
    Route::get("/exchange","soft@exchange");
    Route::get("/addexchange","soft@addexchange");
    Route::get("/addconfigure","soft@addconfigure");
    Route::get("/editconfigure/{id}","soft@editconfigure");
    Route::get("/editexchange/{id}","soft@editexchange");
    Route::post("/createapi/editexchangelist","soft@editexchangelist");
    Route::post("/createapi/addconfigure","soft@addconfigureintodatabase");
    Route::post("/createapi/addexchangelist","soft@addexchangelistintodatabase");
    Route::post("/load_configures","soft@load_configures");
    Route::post("/editconfigure","soft@editconfigureintodatabase");
    Route::post("/deleteconfigure","soft@deleteconfigure");
    Route::post("/load_exchange","soft@load_exchange");
    Route::post("/deleteexchange","soft@deleteexchange");

});