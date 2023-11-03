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
    return view('dashboard', ['notes' => Note::where('user_id', Auth::id())->orderByDesc('updated_at')->get()]);
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
  public function create(Request $request)
  {
    $folder_id = $request->input('folder_id');
    $redirect_to = empty($folder_id) ? route('dashboard') : route('folder.show', ['folder' => $folder_id]);
    return view('note.create', ['folders' => Folder::where('user_id', Auth::id())->orderBy('name')->get(), 'selected_folder' => $folder_id, 'redirect_to' => $redirect_to]);
  }

  /**
   * Create a new note in database.
   */
  public function store(Request $request)
  {
    // validate form fields
    $data = $request->validate([
      'title' => 'required|string',
      'body' => 'string|nullable',
      'folder_id' => 'numeric|exists:folders,id|nullable',
    ]);

    // add current user id to note data
    $data['user_id'] = Auth::id();

    // create the note and store it in the database
    $note = Note::create($data);

    // redirect on successful note creation
    $redirect_to = empty($note->folder_id) ? route('dashboard') : route('folder.show', ['folder' => $note->folder_id]);
    return redirect($redirect_to);
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
    $redirect_to = $request->input('redirect_to', route('dashboard'));
    return redirect($redirect_to);
  }
}
