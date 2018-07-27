<?php

use Illuminate\Http\Request;
use App\Groups;
use App\Http\Resources\GroupCollection;
use App\User;
use App\Http\Resources\UserCollection;

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

Route::get('/users', function(Request $request) {
    return new UserCollection(User::paginate());
});

Route::get('/groups', function(Request $request) {
    return new GroupCollection(Groups::paginate());
});