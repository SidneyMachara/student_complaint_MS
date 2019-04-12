<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintHandler extends Model
{
    public function lecturer()
    {
      return $this->belongsTo('App\Lecturer');
    }
}
