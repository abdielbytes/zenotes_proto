<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;


class NoteController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Notes/Index', [
            //
        ]);
    }

    public function store(Request $request)
{
    // dd($request->all());
    // Validate the request
    $validated = $request->validate([
        'note' => 'required|string',
    ]);

    // Create the note associated with the authenticated user
    $request->user()->notes()->create([
        'note' => $validated['note'],
    ]);

    // Redirect to the notes index page with a success message
    // return redirect()->route('notes.index')->with('success', 'Note created successfully.');
}

}
