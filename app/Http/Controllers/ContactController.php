<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email',
            'message' => 'required'
        ]);
    
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
    
        // Authenticating might not be necessary for a contact form
        // Auth::attempt($credentials);
        
        return redirect()->route('contact')
            ->with('success', 'Your message reached us successfully. Kindly wait for a reply.');
    }
    
}
