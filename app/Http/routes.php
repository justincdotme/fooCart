<?php

use fooCart\src\Product;

Route::get('/', 'HomeController@index');
Route::get('about', 'AboutController@index');

Route::resource('admin/products/tax', 'TaxController');
Route::resource('admin/products/manufacturers', 'ManufacturerController');
Route::resource('admin/products/categories', 'CategoryController');


//Test route
Route::get('test', 'ManufacturerController@index');

//Cart
Route::resource('cart', 'CartController');
Route::post('cart/add/{product_id}', 'CartController@store');
Route::get('cart/delete/{product_id}', 'CartController@destroy');

Route::group(['middleware' => 'auth'], function()
{
    //Admin
    Route::get('admin', 'OrderController@index');
    //Product management routes
    Route::resource("admin/products", 'ProductAdminController');
    Route::get("admin/products/delete/{product_id}", 'ProductAdminController@destroy');
    //Product image management routes
    Route::post('admin/products/images/crop', 'ProductImageController@crop');
    Route::resource('admin/products/images', 'ProductImageController');
    //Order management routes
    Route::resource('admin/orders', 'OrderController');
    //Slideshow management routes
    Route::post('admin/slideshow/crop', 'SlideshowController@crop');
    Route::resource('admin/slideshow', 'SlideshowController');
    Route::get('admin/cropper', 'SlideshowController@crop');
    //User management routes
    Route::get('admin/users', 'UsersController@index');
    Route::get('admin/register', 'Auth\AuthController@getRegister');
    Route::post('admin/register', 'Auth\AuthController@postRegister');
    Route::delete('admin/users/{user_id}', 'UsersController@destroy');
    Route::put('admin/users', 'UsersController@update');
    //Message management routes
    Route::get('admin/messages', 'MessageController@index');
    Route::put('admin/messages/{message_id}', ['as' => 'admin.messages.update', 'uses' => 'MessageController@update'] );
    Route::delete('admin/messages/{message_id}', 'MessageController@destroy');
});

//Message (contact form) route
Route::post('/messages', 'MessageController@store');

//Product Controllers
Route::get('/products/{product}', 'ProductDisplayController@show');
Route::get("shop", 'ProductDisplayController@index');
Route::get("shop/on-sale", 'ProductSaleController@index');

//Order creating routes
Route::get('order', 'OrderController@create');
Route::post('order', 'OrderController@store');

//Search routes
Route::match(['GET', 'POST'], '/search', 'SearchController@index');

//Login routes
Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', 'Auth\AuthController@getLogout');
Route::any('admin/{_missing}', 'Auth\AuthController@missingMethod');

//Password Reset routes
//Route::get('password/email', 'Auth\PasswordController@getEmail');
//Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/email', function()
{
    return redirect('admin/users');
});
Route::post('password/email', function()
{
    return redirect('admin/users');
});

//Route::get('password/reset', 'Auth\PasswordController@getReset');
//Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::post('password/reset', function()
{
    return redirect('admin/users');
});
Route::get('password/reset', function()
{
    return redirect('admin/users');
});
Route::any('admin/{_missing}', 'Auth\PasswordController@missingMethod');


