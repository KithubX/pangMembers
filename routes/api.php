<?php

use Illuminate\Http\Request;
use App\Members;
use App\Http\Resources\MemberCollection;

/**
 * Route for user login, signup, logout, and current user info.
 */
Route::group([ 'prefix' => 'auth' ], function () {

    /** User Login */
    Route::post('login', 'AuthController@login');

    /** User Signup */
    Route::post('signup', 'AuthController@signup');
  
    /** Routes which requires an Authorization Bearer token */
    Route::group([ 'middleware' => 'auth:api' ], function() {

        /** User Logout */
        Route::get('logout', 'AuthController@logout');

        /** Get current user info */
        Route::get('user', 'AuthController@user');
    });
});

/**
 * Route for api/v1 members CRUD.
 */
Route::group([ 'prefix' => 'v1'], function() {
    Route::group(['middleware' => 'auth:api'], function() {

        /** Get all members with pagination */
        Route::get('members', function() {
            return new MemberCollection(Members::paginate());
        });

        /** Update member using id */
        Route::put('/members/{id}', 'MemberController@update');

        /** Delete member using id */
        Route::delete('/members/{id}', 'MemberController@destroy');

        /** Get all members with pagination */
        Route::post('/members', 'MemberController@create');

        /** Send SMS Message */
        Route::post('/members/{id}/sms', 'MemberController@sms');
    });
});