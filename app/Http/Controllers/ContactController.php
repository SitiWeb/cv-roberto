<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'message' => 'required|max:5000',
        ]);

        return response()->json(['status' => 'success']);
    }
}
