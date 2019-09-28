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
    return view('master');
});


// Route::get('categories', 'CategoriesController@index')->name('categories');  
// Route::get('addCategories', 'CategoriesController@create')->name('add-categories');  
// Route::get('editCategories/{id}', 'CategoriesController@edit')->name('edit-categories');  
// Route::post('save-categories', 'CategoriesController@store')->name('save-categories');  
Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');


// Route::post('products', 'ProductsController@index')->name('products');  
// Route::post('add-products', 'ProductsController@create')->name('add-products'); 
// Route::post('edit-Products/{id}', 'ProductsController@edit')->name('edit-products');  
// Route::post('save-categories', 'ProductsController@store')->name('save-products');  