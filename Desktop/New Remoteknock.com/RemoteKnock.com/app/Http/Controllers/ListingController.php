<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{




    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search', 'min_salary', 'location','job_position']))
                ->simplePaginate(50)
        ]);
    }
    
 
    

    //Show single listing
    public function show(Listing $listing) {
        // Check if this listing has been viewed in the current session
        $viewedListings = session('viewed_listings', []);
        if (!in_array($listing->id, $viewedListings)) {
            // Increment the view count
            $listing->listing_views++;
            $listing->save();
    
            // Add the listing ID to the viewed listings in the session
            session(['viewed_listings' => array_merge($viewedListings, [$listing->id])]);
        }
    
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create() {
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
           // 'company' => ['required', Rule::unique('listings', 'company')],
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'min_salary'=>'required',
            'max_salary' => 'required',
            //'description' => 'required'
            'listing_views' => "",
            'description' => 'required|min:50',
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['listing_views'] = 0; // Set a default value
        $formFields['applications_made'] = 0; // Set a default value

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'min_salary'=>'required',
            'max_salary'=>'required',
            'description' => 'required'
           //'description' => 'required|min:50',
        ]);
        //dd($formFields);

        $formFields['description'] = $request->input('description');
        
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('/')->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

////////////////////////////////////////
// Testing...
    public function trackApplication($id)
    {
        // You can perform additional validation or checks here
        $listing = Listing::findOrFail($id);
        $listing->increment('applications_made'); // Increment the applications_made column
        $listing->save();

        return response()->json(['success' => true]);
    }

}