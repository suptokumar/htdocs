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
    Route::get("/plan","soft@plan");
    Route::get("/editconfigure/{id}","soft@editconfigure");
    Route::get("/editplan/{id}","soft@editplan");
    Route::get("/editexchange/{id}","soft@editexchange");
    Route::post("/createapi/editexchangelist","soft@editexchangelist");
    Route::post("/createapi/addconfigure","soft@addconfigureintodatabase");
    Route::post("/createapi/addexchangelist","soft@addexchangelistintodatabase");
    Route::post("/createapi/addplan","soft@addplan");
    Route::post("/load_configures","soft@load_configures");
    Route::post("/load_plans","soft@load_plans");
    Route::post("/load_exchange","soft@load_exchange");
    Route::post("/editconfigure","soft@editconfigureintodatabase");
    Route::post("/editplan","soft@editplanintodatabase");
    Route::post("/deleteconfigure","soft@deleteconfigure");
    Route::post("/deleteplan","soft@deleteplan");
    Route::post("/deleteexchange","soft@deleteexchange");



    // Route for ID Management
    Route::get("/createid","soft@idmanagement");
    Route::get("/createnewid","soft@createnewid");
    Route::get("/idactions/{id}","soft@idactions");
    Route::post("/load_idmanagement","soft@load_idmanagement");
    Route::post("/load_plan","soft@load_plan");
    Route::post("/deleteid","soft@deleteid");
    Route::post("/createapi/createnewid","soft@createnewidaddintodatabase");

    // Route for Deposit Management
    Route::get("/deposit","depositcontroller@deposit");
    Route::get("/createdeposit","depositcontroller@createdeposit");
    Route::get("/declinedeposit/{id}","depositcontroller@declinedeposit");
    Route::get("/deposit/{id}","depositcontroller@depositdetails");
    Route::post("/load_deposit","depositcontroller@load_deposit");
    Route::post("/createapi/declinedeposit","depositcontroller@declinedepositinpost");
    Route::post("/approvedeposit","depositcontroller@approvedeposit");
    Route::post("/deletedeposit","depositcontroller@deletedeposit");
    Route::post("/phoneid","depositcontroller@phoneid");
    Route::post("/createapi/adddeposit","depositcontroller@adddeposit");


    // Route for Withdrawal Management
    Route::get("/withdrawal","withdrawcontroller@withdrawal");
    Route::get("/createwithdrawal","withdrawcontroller@createwithdrawal");
    Route::get("/withdralid","withdrawcontroller@withdralid");
    Route::post("/createapi/addwithdrawalrequest","withdrawcontroller@addwithdrawalrequest");
    Route::post("/load_withdraw","withdrawcontroller@load_withdraw");
    Route::post("/addwithdrawalrequestapprove","withdrawcontroller@addwithdrawalrequestapprove");
    Route::post("/deletewithdrawal","withdrawcontroller@deletewithdrawal");
    Route::post("/createapi/declinewithdrawal","withdrawcontroller@declinewithdrawalse");
    Route::get("/declinewithdrawal/{id}","withdrawcontroller@declinewithdrawal");
    Route::get("/withdrawal/{id}","withdrawcontroller@withdrawaldetails");


});