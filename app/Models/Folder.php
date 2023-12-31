<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'user_id'];

  /**
   * Get the user who created this folder.
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the notes assigned to this folder.
   */
  public function notes(): HasMany
  {
    return $this->hasMany(Note::class);
  }
}
