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
    return view('notes', ['notes' => Note::where('user_id', Auth::id())->orderByDesc('updated_at')->get()]);
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
    // default route to redirect to after successful note creation
    $redirect_to = route('notes');

    // when a user creates a note from within a folder view, get the route
    // to that folder to redirect after successfully creating the note
    $folder_id = $request->input('folder_id');
    // validate folder actually exists
    if (!empty($folder_id)) {
      if (Folder::where('id', $folder_id)->exists()) {
        $redirect_to = route('folder.show', ['folder' => $folder_id]);
      } else {
        // folder does not exist, so redirect to same route without query params
        return redirect(route('note.create'));
      }
    }

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

    // redirect to note view on successful note creation
    return redirect(route('note.show', ['note' => $note]));
  }

  /**
   * Delete the specified note.
   */
  public function destroy(Note $note)
  {
    // if this note is assigned to a folder, redirect to that folder after
    // deleting the note
    // otherwise redirect to the notes
    $redirect_to = empty($note->folder) ? route('notes') : route('folder.show', ['folder' => $note->folder]);
    $note->delete();
    return redirect($redirect_to);
  }

  //Show Edit Form

  public function edit(Note $note) {
    $redirect_to = route('notes');

    //Check to see if there is a Folder ID.
    //Return Null if no Folder ID.
    if (!empty($note->folder->id)) {
      $folder_id = $note->folder->id;
    } else {
      $folder_id = null;
    }

    return view('note.edit', ['folders' => Folder::where('user_id', Auth::id())->orderBy('name')->get(), 'selected_folder' => $folder_id, 'redirect_to' => $redirect_to, 'note' => $note]);
  }

  //Update the specified note.
  public function update(Request $request, Note $note) {
    $data = $request->all();
    $note->update($data);
    return redirect(route('note.show', ['note' => $note]));
  }
}
