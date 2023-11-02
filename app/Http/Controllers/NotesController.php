<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
  /**
   * Get all notes for the current user.
   */
  public function index()
  {
    return view('dashboard', ['notes' => Note::where('user_id', Auth::id())->get()]);
  }

  /**
   * Get the specified note.
   */
  public function show(Note $note)
  {
    return view('note.view', ['note' => $note]);
  }

  /**
   * Show the create note form view.
   */
  public function create()
  {
    return view('note.create', ['folders' => Folder::where('user_id', Auth::id())->get()]);
  }

  /**
   * Create a new note in database.
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $data['user_id'] = Auth::id();
    Note::create($data);
    return redirect('/dashboard');
  }

  /**
   * Delete the specified note.
   */
  public function destroy(Request $request, Note $note)
  {
    $note->delete();

    /*
    Deleting a note outside of it's own view or the dashboard should redirect to a different route
    ex. deleting a note from it's folder should redirect to the same folder view
    */
    $redirectTo = $request->query('redirectTo');
    if (!empty($redirectTo)) return redirect($redirectTo);

    // redirect to home page by default
    return redirect(route('dashboard'));
  }
}
