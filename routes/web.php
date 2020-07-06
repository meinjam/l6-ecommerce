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
