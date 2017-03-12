<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rych\Random\Random;

class PracticeController extends Controller
{
/**
*
* dump is a built in helper method in Laravel to quickly output information;
* debugging purposes and not for the viewer
*/
    public function practice1() {
        dump('This is the first example');
        dump([1,2,3]);
        dd([1,2,3]);
    //die dump, outputs data and then dies; same as die dump in php
    // dd dies before getting to the styling
    // good to use for debugging, dump data before getting to error
    }

    public function practice2() {
        dump(config('app.debug'));
        dump(config('app'));
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

    public function index($n) {
        $method = 'practice'.$n;

        if(method_exists($this, $method)) {
            return $this->$method();
        } else {
            dd("Practice route [{$n}] not defined");
        }

    }
}
