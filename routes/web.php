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


Route::get('categories', 'CategoriesController@index')->name('categories');  
Route::get('addCategories', 'CategoriesController@create')->name('addCategories');  
Route::get('editCategories/{id}', 'CategoriesController@edit')->name('editCategories');  
Route::post('save-categories', 'CategoriesController@store')->name('save-categories');  


Route::post('products', 'ProductsController@index')->name('products');  
Route::get('addProducts', 'ProductsController@create')->name('addProducts'); 
Route::post('editProducts', 'ProductsController@index')->name('editProducts');  