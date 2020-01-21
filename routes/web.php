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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('article')->group(function() {
    Route::get('/', 'ArticlesController@show')->name('article.show');
    Route::get('/create', 'ArticlesController@create')->name('article.create');
    Route::post('/store', 'ArticlesController@store')->name('article.store');
    Route::get('/{id}', 'ArticlesController@showArticle')->name('article.showArticle');
});

Route::prefix('category')->group(function() {
    Route::get('/', 'RewiewersTypesController@show')->name('category.show');
    Route::get('/create', 'RewiewersTypesController@create')->name('category.create');
    Route::post('/store', 'RewiewersTypesController@store')->name('category.store');
});

Route::prefix('message')->group(function() {
    Route::post('/store', 'CommentsController@store')->name('comment.store');
});
