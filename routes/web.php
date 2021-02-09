<?php

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

Route::prefix('/admin')->name('admin.')->namespace('crud')->group(function(){

    Route::prefix('/customers')->name('customers.')->group(function(){

        Route::get('/', 'CustomerController@index')->name('index');
        Route::get('/create', 'CustomerController@create')->name('create');
        Route::post('/customer', 'CustomerController@store')->name('store');
        Route::get('/{customer}/edit', 'CustomerController@edit')->name('edit');
        Route::put('/update/{customer}', 'CustomerController@update')->name('update');
        Route::get('/destroy/{customer}', 'CustomerController@destroy')->name('destroy');

    });

    Route::prefix('/products')->name('products.')->group(function(){
            
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/{product}/edit', 'ProductController@edit')->name('edit');
        Route::put('/update/{product}', 'ProductController@update')->name('update');
        Route::get('/destroy/{product}', 'ProductController@destroy')->name('destroy');
    });

    Route::prefix('/orders')->name('orders.')->group(function(){
            
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('/create', 'OrderController@create')->name('create');
        Route::post('/store', 'OrderController@store')->name('store');
        Route::get('/{order}/edit', 'OrderController@edit')->name('edit');
        Route::put('/update/{order}', 'OrderController@update')->name('update');
        Route::get('/destroy/{order}', 'OrderController@destroy')->name('destroy');
    });

    Route::prefix('/ordersproducts')->name('ordersproducts.')->group(function(){
            
        Route::get('/', 'OrdersProducts@index')->name('index');
        Route::get('/create', 'OrdersProducts@create')->name('create');
        Route::post('/store', 'OrdersProducts@store')->name('store');
        Route::get('/{orderproduct}/edit', 'OrdersProducts@edit')->name('edit');
        Route::put('/update/{orderproduct}', 'OrdersProducts@update')->name('update');
        Route::get('/destroy/{orderproduct}', 'OrdersProducts@destroy')->name('destroy');
    });

});

Route::get('/layouts/app', function () {
    return view('layouts.app');
});