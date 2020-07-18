<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\frontendController@index')->name('homepage');
Route::get('/contact', 'Frontend\frontendController@contact')->name('contact');
Route::get('/about', 'Frontend\frontendController@about')->name('about');
Route::get('/products', 'Frontend\frontendController@products')->name('products');
Route::get('/products/category/{slug}', 'Frontend\frontendController@category')->name('category');
Route::get('/products/details/{slug}', 'Frontend\frontendController@product_details')->name('product.details');

// Cart Routes
Route::post('/add-to-cart', 'Frontend\CartController@add_to_cart')->name('add.cart');
Route::get('/cart', 'Frontend\CartController@show_cart')->name('show.cart');
Route::post('/update-cart', 'Frontend\CartController@update_cart')->name('update.cart');
Route::get('/cart-delete/{id}', 'Frontend\CartController@delete_cart')->name('delete.cart');
Route::get('/checkout', 'Frontend\CartController@checkout')->name('checkout')->middleware('auth');
Route::post('/checkout', 'Frontend\CartController@checkout_store')->name('checkout.store')->middleware('auth');
Route::get('/payment', 'Frontend\CartController@payment')->name('payment')->middleware('auth');
Route::post('/payment', 'Frontend\CartController@payment_store')->name('payment.store')->middleware('auth');
Route::get('/order-list', 'Frontend\CartController@order_list')->name('order.list')->middleware('auth');

// User Profile Route
Route::get('/profile/{slug}', 'Frontend\ProfileController@profile')->name('profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
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
