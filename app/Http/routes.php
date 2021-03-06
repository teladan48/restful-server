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
    return ['app_name' => 'TLD48', 'version' => '1.0'];
});

$app->group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function () use ($app) {

    // Event
    $app->get('events', 'EventController@index');
    $app->get('events/{id}', 'EventController@view');
    $app->post('events', 'EventController@create');
    $app->put('events/{id}', 'EventController@update');
    $app->delete('events/{id}', 'EventController@delete');

    // Users
    $app->get('users', 'UserController@index');
    $app->get('users/{id}', 'UserController@view');

    // Users Location
    $app->get('user-locations', 'UserLocationController@index');
    $app->put('user-locations/{user_id}', 'UserLocationController@update');

});