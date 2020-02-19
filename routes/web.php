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
    Route::get('/edit/{id}', 'ArticlesController@edit')->name('article.edit');
    Route::post('/edit/save/{id}', 'ArticlesController@save')->name('article.edit.save');
});

Route::prefix('category')->group(function() {
    Route::get('/', 'RewiewersTypesController@show')->name('category.show');
    Route::get('/create', 'RewiewersTypesController@create')->name('category.create');
    Route::post('/store', 'RewiewersTypesController@store')->name('category.store');
});

Route::prefix('users')->group(function() {
    Route::get('/', 'UserController@show')->name('users.show');
    Route::post('/approve/{id}', 'UserController@approve')->name('users.approve');
    Route::post('/denied/{id}', 'UserController@denied')->name('users.denied');
    Route::get('/appointment', 'UserController@appointment')->name('users.appointment');
    Route::post('/approving', 'UserReviewerController@approving')->name('users.approving');
});

Route::prefix('reviewer')->group(function() {
    Route::post('/', 'ReviewersController@articles')->name('reviewer.articles');
    Route::post('/review', 'ArticleReviewController@review')->name('reviewer.review');
});

Route::prefix('message')->group(function() {
    Route::post('/store', 'CommentsController@store')->name('comment.store');
});

