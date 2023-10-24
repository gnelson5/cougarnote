<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Note extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'body'];

  /**
   * Get the user who created this note.
   */
  public function user(): HasOne
  {
    return $this->hasOne(User::class);
  }
}
