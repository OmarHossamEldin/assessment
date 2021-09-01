<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => '/api', 'middleware' => ['Cors', 'ForceJsonResponse', 'Localization']], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });
    //guest
    $router->post('login', 'App\Http\Controllers\Auth\LoginController@login');

    $router->post('register', 'App\Http\Controllers\Auth\RegisterController@register');

    //Authenticated 
    $router->group(['middleware' => ['auth:api']], function () use ($router){

        $router->post('logout', 'App\Http\Controllers\Auth\LogoutController@logout');
        $router->get('users', 'App\Http\Controllers\UserController@index');
        $router->get('users/{user}', 'App\Http\Controllers\UserController@show');
        $router->put('users/{user}', 'App\Http\Controllers\UserController@update');
        
    });
});
