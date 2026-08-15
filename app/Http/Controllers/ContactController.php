<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'name' => $validated['fullname'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
