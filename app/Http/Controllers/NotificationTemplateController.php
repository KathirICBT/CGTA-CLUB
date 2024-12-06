<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationTemplate;

class NotificationTemplateController extends Controller
{
    public function index()
    {
        // Retrieve all notification templates
        $templates = NotificationTemplate::all();

        return response()->json($templates, 200);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'templateText' => 'required|string',
        ]);

        // Create the notification template
        $template = NotificationTemplate::create($validatedData);

        return response()->json([
            'message' => 'Notification template created successfully',
            'template' => $template
        ], 201);
    }

    public function show($id)
    {
        // Find the template by ID
        $template = NotificationTemplate::find($id);

        // Check if template exists
        if (!$template) {
            return response()->json(['message' => 'Template not found'], 404);
        }

        return response()->json($template, 200);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'sometimes|required|string|max:255',
            'templateText' => 'sometimes|required|string',
        ]);

        // Find the template by ID
        $template = NotificationTemplate::find($id);

        if (!$template) {
            return response()->json(['message' => 'Template not found'], 404);
        }

        // Update the template with validated data
        $template->update($validatedData);

        return response()->json([
            'message' => 'Notification template updated successfully',
            'template' => $template
        ], 200);
    }

    public function destroy($id)
    {
        // Find the template by ID
        $template = NotificationTemplate::find($id);

        if (!$template) {
            return response()->json(['message' => 'Template not found'], 404);
        }

        // Delete the template
        $template->delete();

        return response()->json(['message' => 'Notification template deleted successfully'], 200);
    }
}
