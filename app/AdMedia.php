<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdMedia extends Model
{

  protected $table = 'ads_media';
  /**
   *
   * This ad belongs to a user.
   */
    public function ad()
    {
      return $this->belongsTo('App\Ad');
    }
}
