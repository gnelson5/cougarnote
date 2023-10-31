<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
  public function index()
  {
    return view('dashboard', ['notes' => Note::where('user_id', Auth::id())->with('user')->get()]);
  }

  public function destroy(Note $note)
  {
    $note->delete();
    return redirect(route('dashboard'));
  }
}
