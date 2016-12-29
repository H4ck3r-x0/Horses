<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  /**
   *
   * This ad belongs to a user.
   */
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
