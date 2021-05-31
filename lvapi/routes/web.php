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

Route::get('/', "soft@index");

Route::group(['prefix' => 'admin'], function() {
    Route::get("/paymentdetails","soft@paymentdetails");
    Route::get("/editgateway/{id}","soft@editgateway");
    Route::get("/editgateway",function(){return back();});
    Route::get("/addnewpayment","soft@addnewpayment");
    Route::post("/statuschanger","soft@statuschanger");
    Route::post("/load_gateway","soft@load_gateway");
    Route::post("/deletepaymentgateway","soft@deletepaymentgateway");
    Route::post("/createapi/addpaymentgateway","soft@addgateway");
    Route::post("/createapi/editpaymentgateway","soft@editpaymentgateway");
});