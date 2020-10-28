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


Route::prefix('v1')->namespace('App\Http\Controllers\Api')->group(function(){
    /**
     * Route from User
    */
    Route::name('users.')->group(function() {
        Route::resource('users', 'UserController');
    });
    /**
     * Route from entities
    */
    Route::name('entities.')->group(function() {
        Route::resource('entities', 'EntityController');
    });
    /**
     * Route from bank-accounts
     * add new accounts remove accounts or update and delete
    */
    Route::name('bank-accounts.')->group(function() {
        Route::resource('bank-accounts', 'BankAccountsController');
    });
    /**
     * Route from account in piety-works
     * movements in this account from piety-works
    */
    Route::name('piety-works.')->group(function() {
        Route::resource('piety-works', 'PietWorksController');
    });
    /**
     * Route from account-application
     * This Route from applications in accounts referencies by this account
    */
    Route::name('account-application.')->group(function() {
        Route::resource('account-application', 'AccountApplicationController');
    });
    /**
     * Route from account-movements
     * This Route from movements in accounts referencies by this account
    */
    Route::name('account-movements.')->group(function() {
        Route::resource('account-movements', 'AccountMovementsController');
    });
    /**
     * Route from travel
     * This Route from controller movements in accounts travels
    */
    Route::name('travel.')->group(function() {
        Route::resource('travel', 'TravelController');
    });
});
