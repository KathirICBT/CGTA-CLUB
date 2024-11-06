<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Display a listing of the companies
    public function index()
    {
        $companies = Company::with(['package', 'member'])->get(); // Retrieve companies with related package and member
        return response()->json($companies);
    }

    // Store a newly created company in storage
    // public function store(Request $request)
    // {
    //     // Validate request data
    //     $request->validate([
    //         'member_id' => 'required|exists:members,id',
    //         'package_id' => 'required|exists:packages,id',
    //         'companyName' => 'required|string|max:255',
    //         'email' => 'required|email|unique:companies,email',
    //         'phonenumber' => 'required|string',
    //         'address' => 'required|string',
    //         'joinDate' => 'required|date',
    //         'services' => 'nullable|string',
    //         'bio' => 'nullable|string',
    //         'logoImg' => 'nullable|string',
    //         'status' => 'required|string',
    //         'region' => 'required|string',
    //         'city' => 'required|string'
    //     ]);

    //     // Create a new company
    //     $company = Company::create($request->all());
    //     return response()->json($company, 201); // 201 Created
    // }
    public function store(Request $request)
    {
        // Logging input for debugging
        error_log('Data to create company: ' . json_encode($request->all()));

        // Validate incoming data
        try {
            $request->validate([
                'member_id' => 'required|exists:members,id',
                'package_id' => 'required|exists:packages,id',
                'companyName' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:companies',
                'phonenumber' => 'required|string|max:20',
                'address' => 'required|string',
                'joinDate' => 'required|date',
                'services' => 'nullable|string',
                'bio' => 'nullable|string',
                'logoImg' => 'nullable|image|max:5000', // Validate logo image
                'status' => 'required|string',
                'region' => 'required|string',
                'city' => 'required|string'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log and return validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }

        // Handle logo image upload if provided
        $logoImgPath = null;
        if ($request->hasFile('logoImg')) {
            $logoImgPath = $request->file('logoImg')->store('logos', 'public'); // Save logo image to 'logos' directory in 'public' disk
        }

        // Create a new company with the validated data
        $company = Company::create([
            'member_id' => $request->member_id,
            'package_id' => $request->package_id,
            'companyName' => $request->companyName,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
            'joinDate' => $request->joinDate,
            'services' => $request->services,
            'bio' => $request->bio,
            'logoImg' => $logoImgPath, // Save the path in the database
            'status' => $request->status,
            'region' => $request->region,
            'city' => $request->city,
        ]);

        // Include the full URL for the logo image in the response if it was uploaded
        $company->logoImg_url = $logoImgPath ? url('storage/' . $logoImgPath) : null;

        return response()->json($company, 201);
    }


    // Display the specified company
    public function show($id)
    {
        $company = Company::with(['package', 'member'])->find($id);

        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        return response()->json($company);
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        // Validate request data
        $request->validate([
            'member_id' => 'exists:members,id',
            'package_id' => 'exists:packages,id',
            'companyName' => 'string|max:255',
            'email' => 'email|unique:companies,email,' . $company->id,
            'phonenumber' => 'string',
            'address' => 'string',
            'joinDate' => 'date',
            'services' => 'nullable|string',
            'bio' => 'nullable|string',
            'logoImg' => 'nullable|image|max:5000', // Updated validation rule for image file
            'status' => 'string',
            'region' => 'string',
            'city' => 'string'
        ]);

        // Handle logo image upload if provided
        if ($request->hasFile('logoImg')) {
            // Delete old image if it exists
            if ($company->logoImg) {
                \Storage::disk('public')->delete($company->logoImg);
            }
            
            // Store new logo image and get the path
            $logoImgPath = $request->file('logoImg')->store('logos', 'public');
            $company->logoImg = $logoImgPath;
        }

        // Update other fields if they are present in the request
        $company->fill($request->except('logoImg')); // Exclude 'logoImg' to avoid overriding it directly
        $company->save();

        // Include the full URL for the logo image in the response if it was updated
        $company->logoImg_url = $company->logoImg ? url('storage/' . $company->logoImg) : null;

        return response()->json($company);
    }

    // Update the specified company in storage
    // public function update(Request $request, $id)
    // {
    //     $company = Company::find($id);

    //     if (!$company) {
    //         return response()->json(['error' => 'Company not found'], 404);
    //     }

    //     // Validate request data
    //     $request->validate([
    //         'member_id' => 'exists:members,id',
    //         'package_id' => 'exists:packages,id',
    //         'companyName' => 'string|max:255',
    //         'email' => 'email|unique:companies,email,' . $company->id,
    //         'phonenumber' => 'string',
    //         'address' => 'string',
    //         'joinDate' => 'date',
    //         'services' => 'nullable|string',
    //         'bio' => 'nullable|string',
    //         'logoImg' => 'nullable|string',
    //         'status' => 'string',
    //         'region' => 'string',
    //         'city' => 'string'
    //     ]);

    //     // Update company attributes
    //     $company->update($request->all());
    //     return response()->json($company);
    // }

    // Remove the specified company from storage
    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        $company->delete();
        return response()->json(['message' => 'Company deleted successfully']);
    }
}
