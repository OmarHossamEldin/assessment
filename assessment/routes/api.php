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
    $router->post('login', 'Auth\LoginController@login');

    $router->post('register', 'Auth\RegisterController@register');

    //Authenticated 
    $router->group(['middleware' => ['auth:api']], function () use ($router){

        $router->post('logout', 'Auth\LogoutController@logout');

        $router->get('users', 'UserController@index');
        $router->get('users/{user}', 'UserController@show');
        $router->put('users/{user}', 'UserController@update');
        $router->delete('users/{user}', 'UserController@destroy');

        $router->get('articles', 'UserController@index');
        $router->post('articles', 'UserController@store');
        $router->get('articles/{user}', 'UserController@show');
        $router->put('articles/{user}', 'UserController@update');
        $router->delete('articles/{user}', 'UserController@destroy');
        
    });
});
