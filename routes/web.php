<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});
// Route to create a new role
$app->post('/role', 'JwtAuthController@createRole');
// Route to create a new permission
$app->post('permission', 'JwtAuthController@createPermission');
// Route to assign role to user
$app->post('assign-role', 'JwtAuthController@assignRole');
// Route to attache permission to a role
$app->post('attach-permission', 'JwtAuthController@attachPermission');
// Protected route
$app->get('users', 'JwtAuthController@index');

// Authentication route
$app->post('authenticate', 'JwtAuthController@authenticate');
