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
    $router->get('home-arti', 'Api\Home\HomeController@arti')->name('home-arti');
});
Route::group(['middleware' => 'auth:api', 'prefix' => 'Home'], function () use ($router) {
    $router->post('home-fallow', 'Api\Home\HomeController@fallow')->name('home-fallow');
});

Route::group(['prefix' => 'Arti'], function () use ($router) {
    $router->get('arti-profile', 'Api\ArtiProfile\ArtiProfileController@index');
    $router->post('fallow-like-comment', 'Api\ArtiProfile\ArtiProfileController@fallow_like_comment');
    $router->get('arti-gallery/{id}', 'Api\ArtiProfile\ArtiProfileController@gallery');
    $router->get('arti-videos/{id}', 'Api\ArtiProfile\ArtiProfileController@videos');
    $router->post('add-rating', 'Api\ArtiProfile\ArtiProfileController@add_review');
});
Route::group(['middleware' => 'auth:api','prefix' => 'Arti'], function () use ($router) {
    $router->post('post', 'Api\ArtiProfile\ArtiProfileController@post');
});
Route::group(['prefix' => 'Product'], function () use ($router) {
    $router->get('product-detail/{id}', 'Api\Product\ProductController@product_detail');
});
Route::group(['prefix' => 'SaleProduct'], function () use ($router) {
    $router->get('sale-product-detail/{id}', 'Api\SaleProduct\SaleProductController@sale_product_detail');
});

Route::group(['prefix' => 'Blog'], function () use ($router) {
    $router->get('blog', 'Api\Blog\BlogController@index');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'Post'], function () use ($router) {
    $router->get('common', 'Api\UserProduct\UserProductController@index');
    $router->get('product-by-category', 'Api\UserProduct\UserProductController@getByCategory');
    $router->post('store-product', 'Api\UserProduct\UserProductController@productStore');
    $router->get('arti-products', 'Api\UserProduct\UserProductController@ArtiProduct');
    $router->post('post','Api\UserProduct\UserProductController@post');
    $router->get('post-product-delete/{id}', 'Api\UserProduct\UserProductController@delete_product');
    $router->get('post-delete/{id}', 'Api\UserProduct\UserProductController@delete_post');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'Newsfeed'], function () use ($router) {
    
    $router->get('newsfeed', 'Api\ArtiProfile\ArtiProfileController@newfeeds');
    $router->post('newsfeed-like-comment', 'Api\ArtiProfile\ArtiProfileController@newsfeed_like_comment');
});