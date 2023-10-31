<?php

namespace App\Http\Controllers;

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
   * Delete the specified note.
   */
  public function destroy(Note $note)
  {
    $note->delete();
    return redirect(route('dashboard'));
  }
}
