<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholar;

class DashboardController extends Controller
{
    public function dashboard()
{
    $totalScholars = Scholar::count();
    $pendingSubmissions = Scholar::where('status', 'pending')->count();
    $approvedSubmissions = Scholar::where('status', 'approved')->count();
    $rejectedSubmissions = Scholar::where('status', 'rejected')->count();
    $firstYear = Scholar::where('year_level_id', 1)->count();
    $secondYear = Scholar::where('year_level_id', 2)->count();
    $thirdYear = Scholar::where('year_level_id', 3)->count();
    $fourthYear = Scholar::where('year_level_id', 4)->count();

    return view('dashboard', compact(
        'totalScholars',
        'pendingSubmissions',
        'approvedSubmissions',
        'rejectedSubmissions',
        'firstYear',
        'secondYear',
        'thirdYear',
        'fourthYear'
    ));
}


    public function manageScholars(Request $request)
    {
        $search = $request->input('search');
        $scholars = Scholar::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->with('yearLevel')->get();
    
        return view('manage_scholar', compact('scholars'));
    }
    

    public function submissions(Request $request){

        
        $search = $request->input('search');
        $scholars = Scholar::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->with('yearLevel')->get();


        return view('submission', compact('scholars'));
    }



    public function approvedScholars(){

        $search = request()->input('search');
    $scholars = Scholar::where('status', 'approved')
                ->when($search, function ($query, $search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->with('yearLevel') // Ensure yearLevel relationship is loaded
                ->paginate(10); // Add pagination
    

        return view('approved', compact('scholars'));
    }

    public function rejectedScholars(){

        
        $search = request()->input('search');
    $scholars = Scholar::where('status', 'rejected')
                ->when($search, function ($query, $search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->with('yearLevel') // Ensure yearLevel relationship is loaded
                ->paginate(10); // Add pagination


        return view('rejected', compact('scholars'));
    }
    
}
