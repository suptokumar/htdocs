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
 date_default_timezone_set("Asia/Dhaka");

Route::get('/', "soft@menu");
Route::get('/login', "soft@login");
Route::get('/logout', "soft@logout");
Route::post('/login', "soft@logined");
Route::group(["middleware"=>"login"], function(){

	// emergency
	Route::get('/emergency', "soft@emargency");
	Route::get('/emergency/{id}', "soft@emargencyedit");
	Route::post('/emergency', "soft@emargencyed");
	Route::post('/emargencylist', "soft@emargencylist");
	Route::post('/em_list', "soft@em_list");
	Route::get('/tests/{user}', "soft@tests");
	Route::get('/collect/{user}', "soft@collect");
	Route::get('/memo/emergency/tests/{user}', "soft@memo1");
	Route::get('/memo/emergency/{user}', "soft@em_memo");
	Route::post('/testsadd', "soft@testsadd");
	Route::post('/testslist', "soft@testslist");
	Route::post('/load_userdetails', "soft@load_userdetailst");
	Route::post('/collect', "soft@collected");
	Route::post('/prev_details', "soft@prev_details");
	Route::post('/delete_emergency', "soft@delete_emergency");

	// Appoinment
	Route::get('/appoinment', "soft@appoinment");
	Route::get('/appoinment/token/{id}', "soft@apptoken");
	Route::post('/load_token', "soft@load_token");
	Route::post('/payid', "soft@apppay");
	Route::post('/payid2', "soft@apppay2");
	Route::post('/appoinment', "soft@appoinmented");
	Route::get('/appoinment/{id}', "soft@appoinmentedit");
	Route::get('/appoinment/collect/{id}', "soft@appcollect");
	Route::post('/appoinmentlist', "soft@appoinmentlist");
	Route::post('/delete_app', "soft@delete_app");
	Route::post('/appoinment/collect', "soft@appcollected");


	// Admission
	Route::get('/admission', "soft@admission");
	Route::post('/admission', "soft@admissioned");
	Route::post('/admission/load_userdetails', "soft@adload_userdetails");
	Route::get('/memo/admission/tests/{user}', "soft@memo2");
	Route::get('/admission/memo/dis/{user}', "soft@memo3");
	Route::get('/memo/whole/{user}', "soft@memo4");
	Route::get('/admission/{id}', "soft@admissionedit");
	Route::get('/admission/collect/{id}', "soft@admissioncollect");
	Route::get('/admission/discharge/{id}', "soft@admissiondischarge");
	Route::post('/admissionlist', "soft@admissionlist");
	Route::post('/delete_add', "soft@delete_admission");
	Route::post('/prev_details3', "soft@prev_details3");
	Route::post('/admission/collect', "soft@admissioncollected");
	Route::get('/admission/tests/{user}', "soft@admtests");
	Route::get('/admission/collect/{user}', "soft@collect");
	Route::post('/admission/testsadd', "soft@adtestsadd");
	Route::post('/admission/discharge', "soft@discharge");
	Route::post('/admission/testslist', "soft@adtestslist");
// Account
	Route::get('/accounts', "soft@accounts");
	Route::post('/accountlist', "soft@accountlist");
	Route::post('/accounts', "soft@accounted");
	Route::get('/accounts/{user}', "soft@accountsedit");


	Route::group(["middleware"=>"admin", "prefix"=>"admin"], function(){
	Route::get('/service', "soft@service");
	Route::get('/reports', "soft@reports");
	Route::post('/service', "soft@serviceadd");
	Route::post('/delete_account', "soft@delete_account");
	Route::post('/delete_expense', "soft@delete_expense");
	Route::post('/reports', "soft@reportsd");

	Route::get('/room', "soft@pathology");
	Route::post('/room', "soft@pathologyadd");
	Route::post("/pathologylist", "soft@pathologylist");
	Route::get("/room/{id}", "soft@pathologyedit");
	Route::post("/delete_pathology", "soft@delete_pathology");
	

	Route::get('/expense', "soft@expense");
	Route::post('/expenselist', "soft@expenselist");
	Route::post('/expense', "soft@expensed");
	Route::get('/expense/{user}', "soft@expensedit");






	Route::post('/imagetest', "soft@imageadd");
	Route::post('/imagetestlist', "soft@imagetestlist");
	Route::post('/delete_imagetest', "soft@delete_imagetest");
	Route::get('/imagetest', "soft@imagetest");
	Route::get("/doctor", "soft@doctor");
	Route::get("/test", "soft@test");
	Route::get("/doctors/{id}", "soft@doctoredit");
	Route::get("/imagetest/{id}", "soft@imageedit");
	Route::get("/service/{id}", "soft@serviceedit");
	Route::post("/doctor", "soft@doctoradd");
	Route::post("/delete_doctor", "soft@delete_doctor");
	Route::post("/delete_service", "soft@delete_service");
	Route::post("/doctorlist", "soft@doctorlist");
	Route::post("/imagelist", "soft@imagelist");
	Route::post("/servicelist", "soft@servicelist");
});
});