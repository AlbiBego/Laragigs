<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;


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

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//user forgets password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//user resets the password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
