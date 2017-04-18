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

Route::get('/books/new', 'BookController@createNewBook');
Route::post('/books/new', 'BookController@storeNewBook');

Route::get('/books/{title?}', 'BookController@show');

# /routes/web.php
Route::get('/search', 'BookController@search');

/**
* Main homepage visitors see when they visit just /
*/

Route::get('/', 'WelcomeController');


/**
* This route will only set if env is configured to local
*/
#if(config('app.env') == 'local') {
#    Route::get('/logs', function(){});
#}

/**
* Laravel log viewer
*/
if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

/**
* Temp demo of debugbar
*/
/**Route::get('/debugbar', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Just demoing some of the features of Debugbar';

});
*/

/**
* Practice
* Dynamic route that works with any of the practice examples
*/
Route::any('/practice/{n?}', 'PracticeController@index');

# New route
Route::get('/example', function() {
    echo Hash::make('secret123');
});

/*Route::get('/debug', function() {

	echo '<pre>';

	echo '<h1>Environment</h1>';
	echo App::environment().'</h1>';

	echo '<h1>Debugging?</h1>';
	if(config('app.debug')) echo "Yes"; else echo "No";

	echo '<h1>Database Config</h1>';
    	echo 'DB defaultStringLength: '.Illuminate\Database\Schema\Builder::$defaultStringLength;*/
    	/*
	The following commented out line will print your MySQL credentials.
	Uncomment this line only if you're facing difficulties connecting to the database and you
        need to confirm your credentials.
        When you're done debugging, comment it back out so you don't accidentally leave it
        running on your production server, making your credentials public.
        */
	//print_r(config('database.connections.mysql'));

	/*echo '<h1>Test Database Connection</h1>';
	try {
		$results = DB::select('SHOW DATABASES;');
		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
		echo "<br><br>Your Databases:<br><br>";
		print_r($results);
	}
	catch (Exception $e) {
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
	}

	echo '</pre>';

});*/

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database foobookstwo');
        DB::statement('CREATE database foobookstwo');

        return 'Dropped foobooks; created foobookstwo.';
    });

};
