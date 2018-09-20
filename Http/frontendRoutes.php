<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => trans('ibusiness::frontend.uri')], function (Router $router) {

    $locale = LaravelLocalization::setLocale() ?: App::getLocale();

    $router->get('/', [
        'as' => $locale . '.ibusiness',
        'uses' => 'PublicController@index',
        'middleware' => 'logged.in'
    ]);

    $router->get('/preorder', [
        'as' => $locale.'.ibusiness.preorder.create',
        'uses' => 'PublicController@preorderCreate',
        'middleware' => 'logged.in'
    ]);

    $router->get('/preorder/{id}', [
        'as' => $locale.'.ibusiness.preorder.show',
        'uses' => 'PublicController@show',
        'middleware' => 'logged.in'
    ]);

    $router->post('/preorder',[
      'as'=>$locale.'ibusiness.preorder.create',
      'uses'=>'PublicController@preorderCreatePost',
      'middleware'=>'logged.in'
    ]);

    // Procesos para el frontend
    $router->get('procesos', [
        'as' => $locale . 'ibusiness.procesos',
        'uses' => 'PublicController@procesos',
    ]);

});