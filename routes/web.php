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

# New route
Route::get('/example', function() {
    echo Hash::make('secret123');
});

Route::get('/', 'WelcomeController');

Route::get('/books', 'BookController@index');

Route::get('/books/{title?}', 'BookController@view');
