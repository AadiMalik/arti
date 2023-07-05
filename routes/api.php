<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () use ($router) {
    $router->get('common', 'Api\Auth\AuthController@common')->name('common');
    $router->post('register', 'Api\Auth\AuthController@register')->name('register');
    $router->post('login', 'Api\Auth\AuthController@login')->name('login');
    $router->post('forget-password', 'Api\Auth\AuthController@forget')->name('forget-password');
    
});

Route::group(['middleware' => ['api'],'prefix' => 'auth'], function () use ($router) {
    $router->post('logout', 'Api\Auth\AuthController@logout')->name('logout');
    $router->post('refresh', 'Api\Auth\AuthController@refresh')->name('refresh');
    $router->post('me', 'Api\Auth\AuthController@me')->name('me');
});
