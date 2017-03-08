<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class BookController extends Controller
{
    /**
    * GET
    * /books
    */
    public function index() {
        return Hash::make('secret123');
        #return \Hash::make('secret123');
        #return 'view all books...';
    }

    /**
    * GET
    * /books/{title?}
    */

    public function view($title = null) {

        # query the database for all books that match the title $title
        # return a view

        return 'you want to view the book '.$title;
    }
}
