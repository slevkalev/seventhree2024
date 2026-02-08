<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        try {
            Subscriber::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Successfully subscribed to our newsletter!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while subscribing.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
