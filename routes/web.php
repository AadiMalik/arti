<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@home')->name('/');
Route::get('package','PackageController@index');
Route::view('thanks-you','thanks');
Route::get('about-us', 'HomeController@about');
Route::get('contact-us', 'ContactController@index');
Route::post('Send_Message', 'ContactController@store')->name('Send_Message');
Route::get('blog', 'HomeController@blog');
Route::get('blog-detail/{id}', 'HomeController@blog_detail');
Route::get('blog-search', 'HomeController@blog_search');
Route::get('shop', 'HomeController@shop');
Route::get('shop/filter', 'HomeController@shop_price');
Route::get('shop-category/{catgeory}', 'HomeController@shop_category');
Route::get('shop-tag/{tag}', 'HomeController@shop_tags');
Route::get('zamidar', 'HomeController@zamidar');
Route::get('category/{catgeory}', 'HomeController@zamidar_category');
Route::get('sub-category/{sub_catgeory}', 'HomeController@zamidar_sub_category');
Route::get('zameendar/filter', 'HomeController@zamidar_price');
Route::get('search', 'HomeController@search');
// Advance search
Route::get('advance-search', 'HomeController@advance_serach');
Route::post('advance-search/filter', 'HomeController@advance_serach_filter');


Route::get('arti-advance-search', 'HomeController@arti_advance_serach');
Route::post('arti-advance-search/filter', 'HomeController@arti_advance_serach_filter');


Route::get('forsale-detail/{id}', 'HomeController@zamidar_detail');
Route::get('product-detail/{id}', 'HomeController@product_detail');
Route::get('faq', 'HomeController@faq');
Route::get('term', 'HomeController@term');
Route::post('newsletter', 'NewsletterController@store')->name('newsletter');
Route::get('arti-detail/{id}', 'HomeController@arti_detail');
Route::post('PostLike', 'HomeController@postlike')->name('PostLike');
Route::get('share-social/{id}', 'HomeController@shareSocial');
Route::get('comment', 'HomeController@Comment');
Route::post('get-district-by-province','Auth\RegisterController@getDistrict');
Route::post('get-tehsil-by-district','Auth\RegisterController@getTehsil');
Route::get('fallow', 'HomeController@getFallow');
Route::get('vfallow', 'HomeController@getVFallow');
Route::post('arti_phone/store', 'PhoneCountController@store');
Route::get('getData', 'HomeController@getData');
Route::view('arti_package','arti-package');




// Route::get('/', function () {
//     return view('welcome');
// });
// profile
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', 'ProfileController@index');
    Route::post('get-tehsil','ProfileController@getTehsil');
    Route::post('update-profile', 'ProfileController@update');
    Route::post('/mark-as-read', 'HomeController@markNotification');
    //for arti note update
    Route::get('view-note', 'ProfileController@view_note');
    Route::post('update-note', 'ProfileController@arti_note');
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
    Route::post('featured', 'OtherProductController@feature')->name('Featured');
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
    // arti phone
    Route::resource('arti-phone', 'PhoneCountController');
});
Route::group(['middleware' => 'Language'], function () {
    Route::get('/change-language/{lang}', "HomeController@changeLang");
});


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
    //Website Content
    Route::resource('content', 'ContentController');
    // media
    Route::resource('media', 'MediaController');
    Route::post('deletemedia', 'MediaController@destroy')->name('deleteMedia');
    // Province
    Route::resource('province', 'ProvinceController');
    Route::post('deleteprovince', 'ProvinceController@destroy')->name('deleteProvince');
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
    // Package
    Route::resource('package', 'PackageController');
    Route::post('deletePackage', 'PackageController@destroy')->name('deletePackage');
    
    // Package history
    Route::resource('package-history', 'PackageHistoryController');

    
Route::post('/mark-as-read', 'HomeController@markNotification')->name('markNotification');
});


Route::group(['middleware' => ['auth']], function () {

    Route::get('package-buy/{id}','PackageController@create');
    Route::post('package-buy', 'PackageController@store')->name('stripe.post');
});
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);
