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

use Illuminate\Support\Facades\Route ;
use Illuminate\Support\Facades\Auth ;


/* AdminPanel Routes
-------------------*/
Route::group(['prefix' => '/admin'] , function() {
    // ShowAdmin Route
    Route::get('/' , 'showAdmin')->name('showadmin') ;
        // PostController Routes
    Route::group(['prefix' => '/post'] , function() {
        Route::get('/' , 'PostController@index')->name('post.index') ;
        Route::get('/create' , 'PostController@create')->name('post.create') ;
        Route::post('/store' , 'PostController@store')->name('post.store') ;
        Route::get('/edit/{post}' , 'PostController@edit')->name('post.edit') ;
        Route::put('/update/{post}' , 'PostController@update')->name('post.update') ;
        Route::delete('/destroy/{post}' , 'PostController@destroy')->name('post.destroy') ;
    }) ;
    // UserController Routes
    Route::group(['prefix' => '/user'] , function() {
        Route::get('/' , 'UserController@index')->name('user.index') ;
        Route::delete('/destroy/{user}' , 'UserController@destroy')->name('user.destroy') ;
    });
    // CommentController Routes
    Route::group(['prefix' => '/comment'], function () {
        Route::get('/' , 'CommentController@index')->name('comment.index') ;
        Route::delete('/destroy/{comment}' , 'CommentController@destroy')->name('comment.destroy') ;
    });
}) ;

/* Blog Routes
-------------------*/
Route::get('/' , 'BlogController@index')->name('blog.index') ;
Route::post('/store' , 'BlogController@store')->name('blog.store') ;
Route::get('/show/{post}' , 'BlogController@show')->name('blog.show') ;

/* Auth Routes
-------------------*/
Auth::routes();
Route::get('/logout' , 'Auth\LoginController@logout') ;

