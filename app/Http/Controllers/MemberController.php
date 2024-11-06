<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all(); // Fetch all members
        // return view('members.index', compact('members')); // Return view with members
        return response()->json($members); // Return view with members

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create'); // Return create view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json(['message' => 'Store method is triggered'], 200);

        try {
            error_log('Validate Data to update: ' . json_encode($request->all()));

            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:members',
                'phone' => 'required|string|max:20',
                'date_of_birth' => 'required|date',
                'join_date' => 'required|date',
                'photo' => 'nullable|image|max:5000', // Updated rule for URL
                'bio' => 'nullable|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log the validation errors or return them in the response for debugging
            return response()->json(['errors' => $e->errors()], 422);
        }

        // Handle photo upload if provided
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $member = Member::create([
            'first_name' => $request ->first_name,
            'last_name' => $request ->last_name, 
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'join_date' => $request->join_date,
            'photo' =>  $photoPath,
            'bio' => $request->bio,
            'status' => 'active',
        ]);

         // Include the full URL for the photo in the response if it was uploaded
        $member->photo_url = $photoPath ? url('storage/' . $photoPath) : null;

        return response()->json($member, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::findOrFail($id); // Find member by ID
        return response()->json($member); // Return the member in JSON format
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        error_log('Update method is triggered.');
        error_log('Request method: ' . $request->method()); // Log the HTTP method
        error_log('Request URI: ' . $request->getRequestUri()); // Log the requested URI
        error_log('Request ID: ' . $id); // Log the received ID

        // Check if the request contains data
        if ($request->method() === 'PUT' && $request->isJson() && empty($request->all())) {
            error_log('No request data received.');
            return response()->json(['error' => 'No data received in the request'], 400);
        }

        error_log('Incoming request data: ' . json_encode($request->all())); // Log incoming request data

        try {
            error_log('Validate Data to update: ' . json_encode($request->all()));
            error_log('Validate Data to update: ' . json_encode($id));

            $request->validate([
                'first_name' => 'sometimes|required|string|max:255',
                'last_name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|string|email|max:255|unique:members,email,' . $id,
                'phone' => 'sometimes|required|string|max:20',
                'date_of_birth' => 'sometimes|required|date',
                'join_date' => 'sometimes|required|date',
                'photo' => 'nullable|string|max:5000',
                'bio' => 'nullable|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log the validation errors or return them in the response for debugging
            return response()->json(['errors' => $e->errors()], 422);
        }

        error_log('Validate Data to update: ' . json_encode($request->all()));


        // $member = Member::findOrFail($id); // Find the member to update
        try {
            // Try to find the member by ID
            $member = Member::findOrFail($id);
            error_log('member ID found ');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            error_log('Member id not found');
            // If the member with the given ID does not exist, return a 404 response
            return response()->json(['error' => 'Member not found'], 404);
        }


        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            error_log('photo file was uploaded.');

            // Optionally, delete the old photo if it exists
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }

             // Store the new photo and get its path
            $photoPath = $request->file('photo')->store('photos', 'public');    
            $member->photo = $photoPath;
        } else { 
            error_log('No photo file was uploaded.');
            // If no new photo is uploaded, retain the existing photo path
            $photoPath = $member->photo;
        }

        // Prepare the data to be updated
        $dataToUpdate = $request->only(['first_name', 'last_name', 'email', 'phone', 'date_of_birth', 'join_date', 'bio']);
        error_log('Data to update: ' . json_encode($dataToUpdate));

        // Update the member details
        $member->update($dataToUpdate);

        // If the photo was changed, save the new photo path
        if (isset($photoPath)) {
            $member->photo = $photoPath; // This line is redundant after update; can be omitted
        }

        return response()->json($member); // Return the updated member

        // return response('update triggered');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id); // Find the member to delete
        $member->delete(); // Delete the member

        return response()->json(null, 204); // Return a 204 No Content response
    }
}
