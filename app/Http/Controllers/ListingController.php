<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create()
    {
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'website' => ['required', Rule::unique('listings', 'website')],
            'email' => ['required', 'email'],
            'location' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);

        Session::flash('message', 'The listing was created successfully!');

        return redirect('/');
    }
}
