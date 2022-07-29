<?php

use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('welcome');
// });
// profile
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', 'ProfileController@index');
    Route::post('get-tehsil','ProfileController@getTehsil');
    Route::post('update-profile', 'ProfileController@update');
    //Blog Comment
    Route::post('blog-comment', 'HomeController@blog_comment')->name('Blog.Comment');
    //Product Comment
    Route::post('product-comment', 'HomeController@product_comment')->name('Product.Comment');
    //Post Comment
    Route::post('post-comment', 'HomeController@post_comment')->name('Post.Comment');
    //Arti Fallow
    Route::post('arti-fallow', 'HomeController@arti_fallow')->name('ArtiFallow');
    //Post Comment
    Route::post('arti-rating', 'HomeController@rating')->name('Rating');
    //New Feeds
    Route::get('newfeeds', 'HomeController@newfeeds');
    //forsale
    Route::view('sell','forsale/category');
    Route::get('sell/{category}/{sub_category}', 'OtherProductController@category');
    // For Sale Product
    Route::resource('forsale', 'OtherProductController');
    Route::post('deleteForsale', 'OtherProductController@destroy')->name('deleteForsale');
    // For Sale Image
    Route::resource('forsale-image', 'OtherProductImageController');
    Route::post('deleteForSaleImage', 'OtherProductImageController@destroy')->name('deleteForSaleImage');
});

// User
Route::group(['as' => 'client.', 'middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@redirect');
    Route::get('dashboard', 'Admin\HomeController@index')->name('home');
    // User Product
    Route::resource('user-product', 'UserProductController');
    Route::post('deleteUserProduct', 'UserProductController@destroy')->name('deleteUserProduct');
    Route::post('Post-Product', 'UserProductController@post')->name('PostProduct');
    Route::get('user_product_edit/{id}', 'UserProductController@imageEdit')->name('Product.Image.Edit');
    Route::post('user_product_update/{id}', 'UserProductController@imageUpdate')->name('Product.Image.Update');
    Route::post('product_update/{id}', 'UserProductController@updateby')->name('Product.Update');
    // User Gallery
    Route::resource('user-gallery', 'UserGalleryController');
    Route::post('deleteUserGallery', 'UserGalleryController@destroy')->name('deleteUserGallery');
    // User Video
    Route::resource('user-video', 'UserVideoController');
    Route::post('deleteUserVideo', 'UserVideoController@destroy')->name('deleteUserVideo');
    // Arti Post
    Route::resource('post', 'ProductPostController');
    Route::post('deleteProductPost', 'ProductPostController@destroy')->name('deleteProductPost');
    
    // Product Image
    Route::resource('product-image', 'ProductImageController');
    Route::post('deleteProductImage', 'ProductImageController@destroy')->name('deleteProductImage');
});
Route::group(['middleware' => 'Language'], function () {
    Route::get('/change-language/{lang}', "HomeController@changeLang");
});
Route::get('/', 'HomeController@home')->name('/');
Route::get('about-us', 'HomeController@about');
Route::get('contact-us', 'ContactController@index');
Route::post('Send_Message', 'ContactController@store')->name('Send_Message');
Route::get('blog', 'HomeController@blog');
Route::get('blog-detail/{id}', 'HomeController@blog_detail');
Route::get('shop', 'HomeController@shop');
Route::get('zamidar', 'HomeController@zamidar');
Route::get('category/{catgeory}', 'HomeController@zamidar_category');
Route::get('sub-category/{sub_catgeory}', 'HomeController@zamidar_sub_category');
Route::get('zameendar/filter', 'HomeController@zamidar_price');
Route::get('search', 'HomeController@search');
Route::get('forsale-detail/{id}', 'HomeController@zamidar_detail');
Route::get('product-detail/{id}', 'HomeController@product_detail');
Route::get('faq', 'HomeController@faq');
Route::get('term', 'HomeController@term');
Route::post('newsletter', 'NewsletterController@store')->name('newsletter');
Route::get('arti-detail/{id}', 'HomeController@arti_detail');
Route::post('PostLike', 'HomeController@postlike')->name('PostLike');
Route::get('share-social/{id}', 'HomeController@shareSocial');
Route::get('comment', 'HomeController@Comment');
Route::post('get-tehsil-by-district','Auth\RegisterController@getTehsil');

Route::view('price','price_table');


Auth::routes();



// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function () {

    Route::get('/admin', 'HomeController@index')->name('home');
    Route::get('paid-users/{id?}', 'HomeController@paidUsers');
    Route::resource('profile', 'ProfileController');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    // media
    Route::resource('media', 'MediaController');
    Route::post('deletemedia', 'MediaController@destroy')->name('deleteMedia');
    // District
    Route::resource('district', 'DistrictController');
    Route::post('deletedistrict', 'DistrictController@destroy')->name('deleteDistrict');
    // Tehsil
    Route::resource('tehsil', 'TehsilController');
    Route::post('deleteTehsil', 'TehsilController@destroy')->name('deleteTehsil');
    // Faq
    Route::resource('faq', 'FaqController');
    Route::post('deleteFAQ', 'FaqController@destroy')->name('deleteFAQ');
    // Team
    Route::resource('team', 'TeamController');
    Route::post('deleteTeam', 'TeamController@destroy')->name('deleteTeam');
    // Brand
    Route::resource('brand', 'BrandController');
    Route::post('deleteBrand', 'BrandController@destroy')->name('deleteBrand');
    // Review
    Route::resource('review', 'ReviewController');
    Route::post('deleteReview', 'ReviewController@destroy')->name('deleteReview');
    // Slider
    Route::resource('slider', 'SliderController');
    Route::post('deleteSlider', 'SliderController@destroy')->name('deleteSlider');
    // Blog
    Route::resource('blog', 'BlogController');
    Route::post('deleteBlog', 'BlogController@destroy')->name('deleteBlog');
    // Term & Condition
    Route::resource('term', 'TermController');
    Route::post('deleteTerm', 'TermController@destroy')->name('deleteTerm');
    // Newsletter
    Route::resource('newsletter', 'NewsletterController');
    Route::post('deleteNewsletter', 'NewsletterController@destroy')->name('deleteNewsletter');
    // Newsletter
    Route::resource('contact', 'ContactController');
    Route::post('deleteContact', 'ContactController@destroy')->name('deleteContact');
    // Category
    Route::resource('category', 'CategoryController');
    Route::post('deleteCategory', 'CategoryController@destroy')->name('deleteCategory');
    // Product
    Route::resource('product', 'ProductController');
    Route::post('deleteProduct', 'ProductController@destroy')->name('deleteProduct');
    // Product Image
    Route::resource('product-image', 'ProductImageController');
    Route::post('deleteProductImage', 'ProductImageController@destroy')->name('deleteProductImage');
    // User Product
    Route::resource('user-product', 'UserProductController');
    Route::post('deleteUserProduct', 'UserProductController@destroy')->name('deleteUserProduct');
    // Arti Post
    Route::resource('arti-post', 'ProductPostController');
    Route::post('deleteProductPost', 'ProductPostController@destroy')->name('deleteProductPost');
    // User Gallery
    Route::resource('user-gallery', 'UserGalleryController');
    Route::post('deleteUserGallery', 'UserGalleryController@destroy')->name('deleteUserGallery');
    // User Video
    Route::resource('user-video', 'UserVideoController');
    Route::post('deleteUserVideo', 'UserVideoController@destroy')->name('deleteUserVideo');
    // Admin Video
    Route::resource('video', 'VideoController');
    Route::post('deleteVideo', 'VideoController@destroy')->name('deleteVideo');
    
});


Route::group(['middleware' => ['auth']], function () {

    Route::get('stripe', 'StripeController@stripe');
    Route::post('stripe', 'StripeController@stripePost')->name('stripe.post');
});
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
