<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () use ($router) {
    $router->post('register', 'Api\Auth\AuthController@register')->name('register');
    $router->post('login', 'Api\Auth\AuthController@login')->name('login');
    
});

Route::group(['middleware' => ['jwt.verify'],'prefix' => 'auth'], function () use ($router) {
    $router->post('logout', 'Api\Auth\AuthController@logout')->name('logout');
    $router->post('refresh', 'Api\Auth\AuthController@refresh')->name('refresh');
    $router->post('me', 'Api\Auth\AuthController@me')->name('me');
});
