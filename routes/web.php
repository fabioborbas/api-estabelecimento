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

/** @var \Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'autenticador'], function () use ($router) {
    $router->group(['prefix' => 'estabelecimento'], function () use ($router) {
        $router->post('', 'EstabelecimentoController@store');
        $router->get('', 'EstabelecimentoController@index');
        $router->get('{id}', 'EstabelecimentoController@show');
        $router->put('{id}', 'EstabelecimentoController@update');
        $router->delete('{id}', 'EstabelecimentoController@destroy');

        $router->get('{estabelecimentoId}/clientes', 'ClientesController@buscaPorClientes');
    });

    $router->group(['prefix' => 'clientes'], function () use ($router) {
        $router->post('', 'ClientesController@store');
        $router->get('', 'ClientesController@index');
        $router->get('{id}', 'ClientesController@show');
        $router->put('{id}', 'ClientesController@update');
        $router->delete('{id}', 'ClientesController@destroy');
    });
});

$router->post('/api/login', 'TokenController@gerarToken');
