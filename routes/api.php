<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () use ($router) {
    $router->get('common', 'Api\Auth\AuthController@common')->name('common');
    $router->post('register', 'Api\Auth\AuthController@register')->name('register');
    $router->post('login', 'Api\Auth\AuthController@login')->name('login');
    $router->post('forget-password', 'Api\Auth\AuthController@forget')->name('forget-password');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'auth'], function () use ($router) {
    $router->post('logout', 'Api\Auth\AuthController@logout')->name('logout');
    $router->post('refresh', 'Api\Auth\AuthController@refresh')->name('refresh');
    $router->post('me', 'Api\Auth\AuthController@me')->name('me');
});

Route::group(['prefix' => 'Home'], function () use ($router) {
    $router->get('home', 'Api\Home\HomeController@index')->name('home');
});

Route::group(['prefix' => 'Arti'], function () use ($router) {
    $router->get('arti-profile', 'Api\ArtiProfile\ArtiProfileController@index');
    $router->post('fallow-like-comment', 'Api\ArtiProfile\ArtiProfileController@fallow_like_comment');
});
Route::group(['prefix' => 'Product'], function () use ($router) {
    $router->get('product-detail/{id}', 'Api\Product\ProductController@product_detail');
});
Route::group(['prefix' => 'SaleProduct'], function () use ($router) {
    $router->get('sale-product-detail/{id}', 'Api\SaleProduct\SaleProductController@sale_product_detail');
});

