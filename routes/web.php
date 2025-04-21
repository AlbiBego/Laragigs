<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
