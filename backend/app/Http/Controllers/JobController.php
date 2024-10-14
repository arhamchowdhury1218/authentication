<?php

namespace App\Http\Controllers;

use App\Models\JobAdded;
use Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function store(Request $request)
    {

        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        // Validate the incoming request
        $request->validate([
            'type' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
            'company_name' => 'required|string',
            'company_description' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
        ]);
    
        // Create a new job entry with the user_id
        JobAdded::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'location' => $request->location,
            'company_name' => $request->company_name,
            'company_description' => $request->company_description,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'user_id' => Auth::id(), // Set the user_id to the currently authenticated user
        ]);
    
        // Return response or redirect as needed
        return response()->json(['message' => 'Job added successfully!'], 201);
    }

    public function getJobsForCurrentUser()
    {
        $userId = Auth::id(); // Get the current user's ID
        $jobs = JobAdded::where('user_id', $userId)->get();

        return response()->json($jobs); // Return the jobs as JSON
    }
}
