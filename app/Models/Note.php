<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'body', 'user_id', 'folder_id'];

  /**
   * Get the user who created this note.
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the folder for this note.
   */
  public function folder(): BelongsTo
  {
    return $this->belongsTo(Folder::class);
  }
}
