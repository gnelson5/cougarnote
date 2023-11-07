<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FoldersController extends Controller
{
  /**
   * Get all folders for current user.
   */
  public function index()
  {
    return view('folders', ['folders' => Folder::where('user_id', Auth::id())->orderByDesc('updated_at')->get()]);
  }

  /**
   * Get the specified folder.
   */
  public function show(Folder $folder)
  {
    return view('folder.view', ['folder' => $folder]);
  }

  /**
   * Show the create folder form view.
   */
  public function create()
  {
    return view('folder.create');
  }

  /**
   * Create a new folder in database.
   */
  public function store(Request $request)
  {
    // prevent duplicate folder names for a single user
    $data = $request->validate([
      'name' => Rule::unique('folders', 'name')->where(fn (Builder $query) => $query->where('user_id', Auth::id()))
    ]);

    // get the id for the current user
    $data['user_id'] = Auth::id();

    // create the folder
    $folder = Folder::create($data);

    // redirect to the newly created folder's view
    return view('folder.view', ['folder' => $folder]);
  }

  /**
   * Delete the specified folder.
   */
  public function destroy(Folder $folder)
  {
    $folder->delete();
    return redirect(route('folders'));
  }
}
