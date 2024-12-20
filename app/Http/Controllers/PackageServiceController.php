<?php

namespace App\Http\Controllers;

use App\Models\PackageService;
use Illuminate\Http\Request;

class PackageServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packageServices = PackageService::with(['package', 'service'])->get();
        return response()->json($packageServices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $packageService = PackageService::create($request->all());
        return response()->json($packageService, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $packageService = PackageService::with(['package', 'service'])->find($id);

        if (!$packageService) {
            return response()->json(['message' => 'PackageService not found'], 404);
        }

        return response()->json($packageService);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $packageService = PackageService::find($id);

        if (!$packageService) {
            return response()->json(['message' => 'PackageService not found'], 404);
        }

        $packageService->update($request->all());
        return response()->json($packageService);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $packageService = PackageService::find($id);

        if (!$packageService) {
            return response()->json(['message' => 'PackageService not found'], 404);
        }

        $packageService->delete();
        return response()->json(['message' => 'PackageService deleted successfully']);
    }
}
