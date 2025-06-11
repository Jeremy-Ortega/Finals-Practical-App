<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NoteController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
            $this->authorizeResource(Note::class, 'note');
            
        }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Auth::user()->notes;

        return view('authenticated.dashboard', compact('notes'));

    }

    public function create(){
        {return view('notes.create');
        }
    }

    //dapat request if di gana
    public function store(StoreNoteRequest $request)
    {
        //   $request->validate([
        //     'title' => 'required|max:255',
        //     'content' => 'required',
        // ]);

        // Create the note and associate it with the logged-in user
        Auth::user()->notes()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        // Redirect to notes list with success message
        return redirect()->route('notes.index')->with('success', 'Note created successfully!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Note $note)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
                // Make sure the note belongs to the user
        if ($note->user_id != Auth::id()) {
            abort(403); // Forbidden
        }

        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $this->authorize('update', $note); 

        if ($note->user_id != Auth::id()) {
            abort(403);
        }

        // Validate form input
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // Update the note
        $note->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        
        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
                if ($note->user_id != Auth::id()) {
            abort(403);
        }

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted!');
    }
    }

