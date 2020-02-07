<?php

use Illuminate\Http\Request;

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

Route::prefix('projects')->name('projects/')->group(static function() {
    Route::get('/get', 'Api\ProjectsController@get');
});

Route::prefix('careers')->name('careers/')->group(static function() {
    Route::get('/get', 'Api\CareersController@get');
});

