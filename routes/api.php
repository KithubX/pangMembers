<?php

use Illuminate\Http\Request;
use App\Members;
use App\Groups;

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

Route::get('/members', function(Request $request) {
    return Members::all();
});

Route::get('/groups', function(Request $request) {
    return Groups::all();
});