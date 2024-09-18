<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes.
     */
    public function index(): Response
    {
        // Fetch notes with id and title
        $notes = Note::where('user_id', auth()->id())->get(['id', 'title']);

        return Inertia::render('Notes/Index', [
            'notes' => $notes,
        ]);
    }

    public function create(): Response
    {

        return Inertia::render('Notes/Create');
    }

    /**
     * Store a newly created note in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'nullable|string|max:255', // title is optional
            'note' => 'required|string',
        ]);

        // Create the note associated with the authenticated user
        $request->user()->notes()->create([
            'title' => $validated['title'] ?? 'Untitled Note',
            'note' => $validated['note'],
        ]);

        // Redirect to the notes index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function show(Note $note)
    {
//        request note id
        dd($note);

    }

    /**
     * Fetch all notes via API (optional if you're using Inertia for everything).
     */
    // public function apiIndex()
    // {
    //     // Fetch notes belonging to the authenticated user
    //     $notes = Note::where('user_id', auth()->id())->get();

    //     // Return notes as JSON
    //     return response()->json($notes);
    // }
}
