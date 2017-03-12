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

/**
* Book related routes
*/

Route::get('/books', 'BookController@index');

Route::get('/books/{title?}', 'BookController@view');

/**
* Main homepage visitors see when they visit just /
*/

Route::get('/', 'WelcomeController');


/**
* This route will only set if env is configured to local
*/
if(config('app.env') == 'local') {
    Route::get('/logs', function(){});
}

/**
* Laravel log viewer
*/
if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

/**
* Practice
* Dynamic route that works with any of the practice examples
*/
Route::any('/practice/{n?}', 'PracticeController@index');

# New route
Route::get('/example', function() {
    echo Hash::make('secret123');
});
