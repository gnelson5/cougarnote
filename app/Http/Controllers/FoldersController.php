<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

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
   * Delete the specified folder.
   */
  public function destroy(Folder $folder)
  {
    $folder->delete();
    return redirect('/folders');
  }
}
