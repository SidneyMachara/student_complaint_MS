<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function complaint_handlers()
  {
    return $this->hasMany('App\ComplaintHandler');
  }
}
