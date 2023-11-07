<?php

use App\Http\Controllers\FoldersController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::middleware('auth')->group(function () {
  // User Profile
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  // Notes
  Route::get('/notes', [NotesController::class, 'index'])->name('notes');
  Route::get('/notes/create', [NotesController::class, 'create'])->name('note.create');
  Route::post('/notes', [NotesController::class, 'store'])->name('note.store');
  Route::get('/notes/{note}', [NotesController::class, 'show'])->name('note.show');
  Route::delete('/notes/{note}', [NotesController::class, 'destroy'])->name('note.destroy');

  // Folders
  Route::get('/folders', [FoldersController::class, 'index'])->name('folders');
  Route::get('/folders/{folder}', [FoldersController::class, 'show'])->name('folder.show');
  Route::delete('/folders/{folder}', [FoldersController::class, 'destroy'])->name('folder.destroy');
});

require __DIR__ . '/auth.php';
