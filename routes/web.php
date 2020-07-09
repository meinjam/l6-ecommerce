<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\frontendController@index')->name('homepage');
Route::get('/contact', 'Frontend\frontendController@contact')->name('contact');
Route::get('/about', 'Frontend\frontendController@about')->name('about');
Route::get('/cart', 'Frontend\frontendController@cart')->name('cart');

Route::get('/details', function () {
    return view('frontend.details');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    // Category Route
    Route::resource('categories', 'Backend\CategoryController')->except(['show', 'destroy']);
    Route::get('categories/{slug}/delete/', 'Backend\CategoryController@destroy')->name('delete.category');
    // Brand Route
    Route::resource('brands', 'Backend\BrandController')->except(['show', 'destroy']);
    Route::get('brands/{slug}/delete/', 'Backend\BrandController@destroy')->name('delete.brand');
    // Color Route
    Route::resource('colors', 'Backend\ColorController')->except(['show', 'destroy']);
    Route::get('colors/{slug}/delete/', 'Backend\ColorController@destroy')->name('delete.color');
    // Size Route
    Route::resource('sizes', 'Backend\SizeController')->except(['show', 'destroy']);
    Route::get('sizes/{slug}/delete/', 'Backend\SizeController@destroy')->name('delete.size');
    // Product Route
    Route::resource('products', 'Backend\ProductController')->except(['destroy']);
    Route::get('products/{slug}/delete/', 'Backend\ProductController@destroy')->name('delete.product');
});
