<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class SubmissionController extends Controller
{
    
    public function storeSubmission(Request $request, $scholarId)
    {
        // Validate input
        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
        ]);
    
        // Store submission in the database
        $submission = new Submission();
        $submission->scholar_id = $scholarId; // Scholar ID from route or request
        $submission->status = $validatedData['status'];
        $submission->save();
    
        // Redirect with success message
        return redirect()->route('submissions')->with('success', 'Submission status updated successfully.');
    }
    



}
