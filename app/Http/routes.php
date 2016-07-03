<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('/', function() {
        return ['test' => true];
    });

    $api->resource('authenticate', 'App\Http\Controllers\AuthenticateController', ['only' => ['index']]);
    $api->post('authenticate', 'App\Http\Controllers\AuthenticateController@authenticate');
    //'middleware'=>'jwt.auth'
    $api->group([],function($api){
        $api->resource('user','App\Http\Controllers\UserController');
        $api->resource('role','App\Http\Controllers\RoleController');
        $api->resource('company','App\Http\Controllers\CompanyController');
        $api->resource('station','App\Http\Controllers\StationController');
    });

});
