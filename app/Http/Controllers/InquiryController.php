<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiries; // Import the Inquiries model
use Illuminate\Support\Facades\DB; // Import the DB facade

class InquiryController extends Controller
{
    /**
     * Submit a new inquiry.
     */
    public function submitInquiry(Request $request)
    {
        try {
            // Check database connection
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Database connection error: ' . $e->getMessage(),
            ], 500);
        }
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contactNumber' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new inquiry
        $inquiry = Inquiries::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contactNumber' => $validatedData['contactNumber'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
            // 'status' defaults to 'Pending' as defined in the model
            // 'statusHistory' will be initialized as an empty array
        ]);

        // Return a success response
        return response()->json([
            'message' => 'Inquiry submitted successfully!',
            'inquiry' => $inquiry,
        ], 201);
    }

    /**
     * Get all inquiries for the admin view.
     */
    public function getInquiries()
    {
        // Retrieve all inquiries from the database
        $inquiries = Inquiries::all();

        // Return the inquiries as a JSON response
        return response()->json($inquiries);
    }

    /**
     * Update the status of an inquiry.
     */
    public function updateInquiryStatus(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'status' => 'required|string|in:Pending,In Progress,Resolved',
        ]);

        // Find the inquiry by ID
        $inquiry = Inquiries::find($id);

        // If the inquiry doesn't exist, return a 404 error
        if (!$inquiry) {
            return response()->json([
                'message' => 'Inquiry not found!',
            ], 404);
        }

        // Update the inquiry status using the model method
        $inquiry->updateStatus($validatedData['status']);

        // Return a success response
        return response()->json([
            'message' => 'Inquiry status updated successfully!',
            'inquiry' => $inquiry,
        ]);
    }
}