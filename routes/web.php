<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

//show all listings
Route::get('/', [ListingController::class, 'index']);

//show create form
Route::get('/listings/create', [ListingController::class, 'create']);

//store listing data
Route::post('/listings', [ListingController::class, 'store']);

//show single listing (make sure to keep this in the end so that the wildcard does not interfere with the other routes)
Route::get('listings/{listing}', [ListingController::class, 'show']);
