<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post("/exchangelist","api@exchange");
Route::post("/planlist","api@planlist");
Route::post("/configurelist","api@configurelist");
Route::post("/createid","api@createid");
Route::post("/idlist","api@idlist");
Route::post("/createuser","api@createuser");
Route::post("/userlist","api@userlist");

