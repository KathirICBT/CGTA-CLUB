<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

class NotificationController extends Controller
{
    public function index()
    {
        // Retrieve all notifications
        $notifications = Notifications::all();

        return response()->json($notifications, 200);
    }

    public function store(Request $request)
    {
        error_log('create method is triggered.');
        error_log('Incoming request data: ' . json_encode($request->all())); // Log incoming request data

        try { 
            // Validate the request data
            $validatedData = $request->validate([
                'memberId' => 'required|integer|exists:members,id',
                'NotificationTemplateId' => 'required|integer|exists:notification_templates,id',
                'TemplateData' => 'required|json',
                'is_read' => 'boolean',
                'sent_at' => 'required|date',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log the validation errors or return them in the response for debugging
            return response()->json(['errors' => $e->errors()], 422);
        }

        error_log('bypassing the vlaidation');
        error_log('Incoming request data: ' . json_encode($validatedData)); // Log incoming request data


        // Create the notification
        $notification = Notifications::create([
            'memberId' => $validatedData['memberId'],
            'NotificationTemplateId' => $validatedData['NotificationTemplateId'],
            'TemplateData' => $validatedData['TemplateData'],
            'is_read' => $validatedData['is_read'] ?? false,
            'sent_at' => $validatedData['sent_at'] ?? now(),
        ]);

        return response()->json([
            'message' => 'Notification created successfully',
            'notification' => $notification
        ], 201);
    }

    public function show($id)
    {
        // Find the notification by ID
        $notification = Notifications::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        return response()->json($notification, 200);
    }


    public function update(Request $request, $id)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'is_read' => 'boolean',
            'read_at' => 'nullable|date',
        ]);

        // Find the notification by ID
        $notification = Notifications::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        // Update the notification
        $notification->update([
            'is_read' => $validatedData['is_read'] ?? $notification->is_read,
            'read_at' => $validatedData['is_read'] ? now() : null,
        ]);

        return response()->json([
            'message' => 'Notification updated successfully',
            'notification' => $notification
        ], 200);
    }

    public function destroy($id)
    {
        // Find the notification by ID
        $notification = Notifications::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        // Delete the notification
        $notification->delete();

        return response()->json(['message' => 'Notification deleted successfully'], 200);
    }


}
