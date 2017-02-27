<?php

$api = app('Dingo\Api\Routing\Router');//use dingo api
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
$api->version('v1', ['namespace' => 'App\Http\Controllers'], function ($api) {
  $api->get('/', function () use ($api) {
      return array('App Name' => "Lumen starter API");
  });

  $api->group(['middleware' => 'jwt.auth'], function ($api) {
    $api->get('/users', 'JwtAuthController@index');
  });
});
