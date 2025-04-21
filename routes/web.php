<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('listings', [
        'heading' => 'latest listings',
        'listings' => Listing::all()
    ]);
});

Route::get('listings/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing' => $listing //automatic 404 functionality
    ]);
});

//show register/create form
Route::get('/register', [UserController::class, 'create']);

//create a new user
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'logout']);

//show login form
Route::get('/login', [UserController::class, 'login']);

//Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
