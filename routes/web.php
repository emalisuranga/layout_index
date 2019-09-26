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

Route::get('/', function () {
    return view('welcome');
});


Route::post('categories', 'CategoriesController@index')->name('categories');  
Route::post('addCategories', 'CategoriesController@create')->name('addCategories');  
Route::post('editCategories', 'CategoriesController@index')->name('editCategories');  


Route::post('products', 'ProductsController@index')->name('products');  
Route::post('addProducts', 'ProductsController@index')->name('addProducts');  
Route::post('editProducts', 'ProductsController@index')->name('addProducts');  