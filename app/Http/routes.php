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

// Event
$app->get('events', 'App\Http\Controllers\EventController@index');
$app->get('events/{id}', 'App\Http\Controllers\EventController@show');
$app->post('events', 'App\Http\Controllers\EventController@store');
$app->put('events/{id}', 'App\Http\Controllers\EventController@update');
$app->delete('events/{id}', 'App\Http\Controllers\EventController@delete');