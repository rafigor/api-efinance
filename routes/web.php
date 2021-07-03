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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function() use($router){
    $router->group(['prefix' => 'estados'], function() use($router) {
        $router->get('', 'EstadoController@index');
        $router->post('', 'EstadoController@create');
        $router->get('{id}', 'EstadoController@show');
        $router->put('{id}', 'EstadoController@update');
        $router->delete('{id}', 'EstadoController@destroy');
    });

    $router->group(['prefix' => 'cidades'], function() use($router) {
        $router->get('', 'CidadeController@index');
        $router->post('', 'CidadeController@create');
        $router->get('{id}', 'CidadeController@show');
        $router->put('{id}', 'CidadeController@update');
        $router->delete('{id}', 'CidadeController@destroy');
    });

    $router->group(['prefix' => 'clientes'], function() use($router) {
        $router->get('', 'ClienteController@index');
        $router->post('', 'ClienteController@create');
        $router->get('{id}', 'ClienteController@show');
        $router->put('{id}', 'ClienteController@update');
        $router->delete('{id}', 'ClienteController@destroy');
    });
});