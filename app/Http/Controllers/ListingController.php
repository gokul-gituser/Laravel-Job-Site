<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    //
     //Show all listings
     public function index(){

       
        return view('listings.index', [
       
            'listings' => Listing::latest()->filter
            (request(['tag','search']))->paginate(6)
             
        ]);

    }

    //show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);

    }

    //show create form

    public function create(){
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request){
        $formFields = $request -> validate([
            'title' => 'required',
            'company' =>'required',
            'location' => 'required',
            'salary' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message','Job Posted Successfully!');
    }

    //show edit form
    public function edit(Listing $listing){
        
        return view('listings.edit', ['listing' => $listing]);
    }

    //update
    public function update(Request $request, Listing $listing){

        //making sure logged in user is the owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }

        $formFields = $request -> validate([
            'title' => 'required',
            'company' =>'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        $listing->update($formFields);

        return back()->with('message','Job Updated Successfully!');
    }

    //delete
    public function destroy(Listing $listing){

         //making sure logged in user is the owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message','Deleted Successfully!');
    }

    //manage
    public function manage(){
        return view('listings.manage',['listings' => auth()->user()->listings()->get()]);
    }

}
