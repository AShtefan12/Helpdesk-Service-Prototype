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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function() {
    Route::view('/', 'spa')->name('home');
    Route::view('/problems', 'spa')->name('problems');
    Route::view('/calls', 'spa')->name('calls');

    Route::get('/token', 'CallController@incoming');
    Route::get('/search', 'ProblemController@search');
});
