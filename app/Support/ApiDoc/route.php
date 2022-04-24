<?php
use Illuminate\Routing\Router;

Route::group([
    'prefix'        => config('doc.prefix','doc'),
    'namespace'     => 'App\Support\ApiDoc',
    'middleware'    => [Illuminate\Session\Middleware\StartSession::class],
], function (Router $router) {
    $router->get('/', 'DocController@index');
    $router->any('login', 'DocController@login');
    $router->get('list', 'DocController@getList');
    $router->any('search', 'DocController@search');
    $router->get('info', 'DocController@getInfo');
    $router->get('test', function(){
        echo 'ok';
    });

});
