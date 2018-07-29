<?php

use Illuminate\Http\Request;
use App\Members;
use App\Http\Resources\MemberCollection;


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([ 'prefix' => 'v1'], function() {
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('members', function() {
            return new MemberCollection(Members::paginate());
        });
    });
});