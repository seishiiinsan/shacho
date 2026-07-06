<?php

namespace App\Http\Controllers;

use App\Models\WaitlistSignup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WaitlistController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:waitlist_signups,email'],
        ]);

        WaitlistSignup::create($validated);

        return back()->with('success', "Vous êtes sur la liste. On vous écrit dès l'ouverture d'une ligue.");
    }
}
