<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rych\Random\Random;
use App\Book; # <----------- NEW

class PracticeController extends Controller
{
/**
*
* dump is a built in helper method in Laravel to quickly output information;
* debugging purposes and not for the viewer
*/

    // CRUD Delete

    public function practice11() {
        # First get a book to delete
        // looking for a book by ID 
        $book = Book::find(11);

        if(!$book) {
            dump('Did not delete- Book not found.');
        }
        else {
            $book->delete();
            dump('Deletion complete; check the database to see if it worked...');
        }
    }



    public function practice10() {

        # First get a book to delete
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        // if no results
        if(!$book) {
            dump('Did not delete- Book not found.');
        }
        else {
            $book->delete();
            dump('Deletion complete; check the database to see if it worked...');
        }

    }

    // CRUD Update

    public function practice9() {

        # First get a book to update
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        if(!$book) {
            dump("Book not found, can't update.");
        }
        else {

            # Change some properties
            $book->title = 'The Really Great Gatsby';
            $book->published = '2025';

            # Save the changes
            $book->save();

            dump('Update complete; check the database to confirm the update worked.');
        }
    }

    // CRUD Read

    public function practice8() {

        $book = new Book();

        // $books = $book->all();
        // dump($books->toArray());

        // where is the contraint method
        // where -> 3 parameters (field we want, comparative operator, what looking for)
        // LIKE = fuzzy match; % signs are wild cards
        // get(); have some constraints and want to run the contraints and get results

        //$books = $book->where('title', 'LIKE', '%Harry Potter%')->get();
        $books = $book
            ->where('title', 'LIKE', '%Harry Potter%')
            ->orWhere('published', '>=', 1800)
            //->where('published', '>=', 1998)
            ->orderBy('created_at') // default is ascending
            //->orderBy('created_at', 'desc') // default is ascending
            //->first();
            ->get();

        dump($books->toArray());

        /*if($books->isEmpty()) {
            dump('No matches found');
        }
        else {
            foreach($books as $book) {
                dump($book->title);
            }
        }*/
    }

    // CRUD read

    public function practice7() {

        $book = new Book();

        $books = $book->all();
        dump($books->toArray());
    }



    // CRUD create

    public function practice6() {

    # Instantiate a new Book Model object
    $newBook = new Book();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $newBook->title = "Harry Potter and the Sorcerer's Stone";
        $newBook->author = 'J.K. Rowling';
        $newBook->published = 1997;
        $newBook->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $newBook->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $newBook->save();

    // includes all info; note that Eloquent is handling IDs and timestamps
    //dump($newBook);

    // includes only properties
    dump($newBook->toArray());
    }


    public function practice3() {
        $random = new Random();

        // Generate a 16-byte string of random raw data
        $randomBytes = $random->getRandomBytes(16);
        dump($randomBytes);

        // Get a random integer between 1 and 100
        $randomNumber = $random->getRandomInteger(1, 100);
        dump($randomNumber);

        // Get a random 8-character string using the
        // character set A-Za-z0-9./
        $randomString = $random->getRandomString(8);
        dump($randomString);
    }


    public function practice2() {
        dump(config('app.debug'));
        dump(config('app'));
    }


    public function practice1() {
        dump('This is the first example');
        dump([1,2,3]);
        dd([1,2,3]);
    //die dump, outputs data and then dies; same as die dump in php
    // dd dies before getting to the styling
    // good to use for debugging, dump data before getting to error
    }

    public function index($n) {
        $method = 'practice'.$n;

        if(method_exists($this, $method)) {
            return $this->$method();
        } else {
            dd("Practice route [{$n}] not defined");
        }

    }
}
