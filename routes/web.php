<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello world!';
});

Route::get('/helloHeader', function () {
    return '<h1>Hello world!</h1>';
});

Route::get('/helloWithResponse', function () {
    return response('<h1>Hello world!</h1>', 404)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('/wildcards/{w}', function ($w) {
    //return response('the wildcard is ' . $w);
    return 'the wildcard is ' . $w;
});

Route::get('/wildcardsWithConstraint/{w}', function ($w) {
    return response('the wildcard with a constraint of only bein a number is ' . $w);
})->where('w', '[0-9]+');

Route::get('/dd/{w}', function ($w) {
    dd($w); //returns a 500 status code
    return $w;
});

Route::get('/queryParams', function (Request $request) {
    return $request->name . ' ' . $request->city;
});

Route::get('/listings', function () {
    return view('listings', [
        'heading' => 'latest listings',
        'listings' => [
            [
                'id' => '1',
                'title' => 'listing 1',
                'description' => 'this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description '
            ],
            [
                'id' => '2',
                'title' => 'listing 2',
                'description' => 'this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description '
            ]
        ]
    ]);
});
