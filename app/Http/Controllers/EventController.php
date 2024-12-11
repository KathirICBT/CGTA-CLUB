<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Event::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        error_log('store memember method triggered');
        try {
            error_log('Validate Data to update: ' . json_encode($request->all()));
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_date' => 'required|date',
                'start_time' => 'required',
                'end_date' => 'required|date|after_or_equal:start_date',
                'end_time' => 'required',
                'timezone' => 'required|string|max:50',
                'visibility' => 'required|in:public,members_only',
                'paid_free' => 'required|in:paid,free',
                'release_date' => 'nullable|date',
                'closing_date' => 'nullable|date',
                'event_url' => 'nullable|url',
                'location' => 'nullable|string|max:255',
                'user_limit' => 'nullable|integer|min:0',
            ]);

            $event = Event::create($validatedData);
            return response()->json($event, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log the validation errors or return them in the response for debugging
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Catch any other exception
            error_log('Error creating event: ' . $e->getMessage());
            return response()->json(['message' => 'Something went wrong', 'error' => $e->getMessage()], 500);
        }

    }


    public function show($id)
    {
        $event = Event::find($id);
        if ($event) {
            return response()->json($event, 200);
        }
        return response()->json(['message' => 'Event not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'sometimes|date',
            'start_time' => 'sometimes',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
            'end_time' => 'sometimes',
            'timezone' => 'sometimes|string|max:50',
            'visibility' => 'sometimes|in:public,members_only',
            'paid_free' => 'sometimes|in:paid,free',
            'release_date' => 'nullable|date',
            'closing_date' => 'nullable|date',
            'event_url' => 'nullable|url',
            'location' => 'nullable|string|max:255',
            'user_limit' => 'nullable|integer|min:0',
        ]);

        $event->update($validatedData);

        return response()->json($event, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }
        $event->delete();
        return response()->json(['message' => 'Event deleted successfully'], 200);
    }
}
