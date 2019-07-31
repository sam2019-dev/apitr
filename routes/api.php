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
Route::group(["prefix"=>"test"],function(){
	Route::apiResource('/testapi','apicontroller');
});

    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');
	Route::post('getposts', 'Api\apinew@me');
	Route::post('adminlogin', 'Api\Adminauthcontroller@login');
	Route::post('adminme', 'Api\Adminauthcontroller@me')->middleware('jwt');
    Route::post('adminlogout', 'Api\Adminauthcontroller@logout');
    Route::post('getposts', 'Api\apinew@getposts');
    Route::post('adminnewlogin', 'Api\adminusernewauth@login');
    