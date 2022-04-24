<?php

use Illuminate\Support\Facades\Route;
//use  App\Http\Controllers\Notify\Wx;
//use  App\Http\Controllers\Notify\Ali;
//use  App\Http\Controllers\Notify\WxWork;

Route::group([
    'middleware'    => [],
], function ($router) {

    $router->any('wx',function (){
       return "hello world! wx";
    });


});
