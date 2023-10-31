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
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/dashboard', [NotesController::class, 'index'])->name('dashboard');
  Route::get('/notes/{note}', [NotesController::class, 'show']);
  Route::delete('/notes/{note}', [NotesController::class, 'destroy']);

  Route::get('/folders', [FoldersController::class, 'index'])->name('folders');
});

require __DIR__ . '/auth.php';
