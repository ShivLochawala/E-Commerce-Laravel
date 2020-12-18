<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Login Route */
Route::get('/', function () {
    return redirect('home');
    //return view('welcome');
});
Route::get('login','UserController@login')->name('login');
Route::post('login-user','UserController@loginUser')->name('login-user');

/*Registration Route */
Route::get('register', 'UserController@register')->name('register');
Route::post('register-user', 'UserController@registerUser')->name('register-user');

/* Logout */
Route::get('logout','UserController@logout')->name('logout');

/*Product Page */
Route::get('home','ProductController@product')->name('home');

/*Product Details Page */
Route::get('product-details/{id}','ProductController@productDetails')->name('product-details');

/* Searching */
Route::post('searching','ProductController@productSearch')->name('searching');

/* Add to Cart */
Route::post('add-to-cart','ProductController@addToCart')->name('add-to-cart');
