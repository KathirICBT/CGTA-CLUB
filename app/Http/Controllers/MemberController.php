<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

//    public static function allMembers()
//    {
//        return Member::all(); // Return view with members
//    }

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
        error_log('store memember method triggered');
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:members',
                'phone' => 'required|string|max:20',
                'date_of_birth' => 'required|date',
                'join_date' => 'required|date',
                'photo' => [
                    'nullable',
                    function ($attribute, $value, $fail) use ($request) {
                        if (!$request->hasFile('photo') && !is_string($value)) {
                            $fail("The $attribute must be a valid image file or a string representing the photo URL.");
                        }
                    }
                ],
                'bio' => 'nullable|string',
                'membership_level' => 'required|string',
                'status' => 'required|string',
                'password' => 'required|string|min:8',
                'renewal_date' => 'nullable|date',
            ]);

            if ($validator->fails()) {
                error_log('Validation failed: ' . json_encode($validator->errors()));
                return response()->json(['errors' => $validator->errors()], 422);
            }



            error_log('Validation passed and data after validation: ' . json_encode($request->all()));


        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log the validation errors or return them in the response for debugging
            error_log('errors' . $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        }

        // Handle photo upload if provided
        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Save the uploaded file and get the path
            $photoPath = $request->file('photo')->store('photos', 'public');
        } elseif (is_string($request->photo)) {
            // Use the provided URL as the photo path
            $photoPath = $request->photo;
        }

        error_log('photopath blocked the process');


        $member = Member::create([
            'first_name' => $request ->first_name,
            'last_name' => $request ->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'join_date' => $request->join_date,
            'photo' =>  $photoPath,
            'bio' => $request->bio,
            'status' => $request->status,
            'membership_level' => $request->membership_level,
            'password' => bcrypt($request->password),
            'renewal_date' => $request->renewal_date,
        ]);

        // Include the full URL for the photo in the response
        $member->photo_url = $photoPath && !str_contains($photoPath, 'http') ? url('storage/' . $photoPath) : $photoPath;

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
        error_log('Request ID: ' . $id);

        $isUpdate = isset($id);

        if ($request->method() === 'PUT' && $request->isJson() && empty($request->all())) {
            error_log('No request data received.');
            return response()->json(['error' => 'No data received in the request'], 400);
        }

        error_log('Incoming request data: ' . json_encode($request->all()));

        // Validation Rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members,email,' . $id,
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'join_date' => 'required|date',
            'photo' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    error_log('Photo field received: ' . json_encode($value));
//                    if (!$request->hasFile('photo') && !is_string($value)) {
//                        $fail("The $attribute must be a valid image file or a string representing the photo URL.");
//                    }
                    if ($request->hasFile('photo')) {
                        error_log('Photo is a file.');
                        $file = $request->file('photo');
                        error_log('Photo file name: ' . $file->getClientOriginalName());
                        error_log('Photo file size: ' . $file->getSize());
                    } elseif (is_string($value)) {
                        error_log('Photo is a string URL: ' . $value);
                    } else {
                        $fail("The $attribute must be a valid image file or a string representing the photo URL.");
                    }
                }
            ],
            'bio' => 'nullable|string',
            'membership_level' => 'required|string',
            'status' => 'required|string',
            'renewal_date' => 'nullable|date',
        ];

        // Conditionally add password validation for update
        if (!$isUpdate || $request->filled('password')) {
            $rules['password'] = 'required|string|min:8';  // Only apply this rule if it's a new password or the update includes a password
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            error_log('Validation failed: ' . json_encode($validator->errors()));
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Retrieve the member or return a 404 response
            $member = Member::findOrFail($id);
            error_log('Member ID found: ' . $id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            error_log('Member ID not found: ' . $id);
            return response()->json(['error' => 'Member not found'], 404);
        }

        // Function to delete the old photo if it exists
        $deleteOldPhoto = function ($path) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path); // Delete the old photo
            }
        };

        // Handle photo upload or retain existing photo
        $photoPath = $member->photo; // Default to existing photo
        if ($request->hasFile('photo')) {
            error_log('Photo file uploaded.');

            // Delete old photo
            $deleteOldPhoto($photoPath);

            $photoPath = $request->file('photo')->store('photos', 'public'); // Store new photo
        } elseif (is_string($request->photo)) {
            error_log('Photo is a string URL.');

            // Delete old photo
            $deleteOldPhoto($photoPath);

            $photoPath = $request->photo;
        } else {
            error_log('No valid photo provided. Retaining existing photo.');
        }

        // Update member fields
        $dataToUpdate = $request->only([
            'first_name', 'last_name', 'email', 'phone',
            'date_of_birth', 'join_date', 'bio',
            'membership_level', 'renewal_date'
        ]);
        if ($request->filled('password')) {
            $dataToUpdate['password'] = bcrypt($dataToUpdate['password']); // Hash password if provided
        }
        $dataToUpdate['photo'] = $photoPath;

        $member->update($dataToUpdate);

        // Include photo URL in the response
        $member->photo_url = $photoPath && !str_contains($photoPath, 'http') ? url('storage/' . $photoPath) : $photoPath;

        error_log('Member updated successfully: ' . $member->id);

        return response()->json($member, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $member = Member::findOrFail($id); // Find the member to delete
            if ($member->photo && Storage::disk('public')->exists($member->photo)) {
                Storage::disk('public')->delete($member->photo);
            }
            $member->delete(); // Delete the member
            return response()->json(null, 204); // Return a 204 No Content response
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete member'], 500);
        }
    }
}
