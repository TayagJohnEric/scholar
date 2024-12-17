<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholar;
use App\Models\YearLevel;

class ScholarController extends Controller
{
    

    public function scholarForm(){

        $year_levels = YearLevel::all();

        return view('scholar_form', compact('year_levels'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'gender' => 'required|string|in:Male,Female,Other',
            'email' => 'required|email|unique:scholars,email',
            'contact' => 'required|string',
            'address' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'year_level_id' => 'required|exists:year_levels,id',
            'cor_file' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'cog_file' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'school_id' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);
    
        // Handle file uploads
        $corPath = $request->file('cor_file')->store('cor_files', 'public');
        $cogPath = $request->file('cog_file')->store('cog_files', 'public');
        $schoolIdPath = $request->file('school_id')->store('school_ids', 'public');
    
        // Create the scholar record with default status as 'pending'
        Scholar::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'school' => $request->school,
            'course' => $request->course,
            'year_level_id' => $request->year_level_id,
            'cor_file' => $corPath,
            'cog_file' => $cogPath,
            'school_id' => $schoolIdPath,
            'status' => 'pending', // Set default status to 'pending'
        ]);
    
        // Flash success message
        session()->flash('success', 'Scholar information submitted successfully!');
    
        // Redirect or return a success response
        return redirect()->route('scholar.form')->with('success', 'Scholar information submitted successfully!');
    }
    


    public function show($id)
{
    $scholar = Scholar::findOrFail($id);
    return view('profile', compact('scholar'));
}

public function destroy($id)
{
    $scholar = Scholar::findOrFail($id);
    $scholar->delete();

    return redirect()->route('manageScholars')->with('success', 'Scholar deleted successfully.');
}

public function updateStatus(Request $request, $id)
{
    $scholar = Scholar::findOrFail($id);
    $scholar->update(['status' => $request->status]);

    return redirect()->back()->with('success', 'Scholar status updated successfully!');
}

public function approvedScholars(Request $request)
{
    $search = $request->input('search');
    $scholars = Scholar::where('status', 'approved')
                ->when($search, function ($query, $search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->with('yearLevel') // Ensure yearLevel relationship is loaded
                ->paginate(10); // Add pagination
    
    return view('approved', compact('scholars'));
}

public function rejectedScholars()
{
    $scholars = Scholar::where('status', 'rejected')->get();
    return view('rejected', compact('scholars'));
}


}
