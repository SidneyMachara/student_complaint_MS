<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintHandler extends Model
{
    public function lecturer()
    {
      return $this->belongsTo('App\Lecturer');
    }

    public function complaint_histories()
    {
      return $this->hasMany('App\ComplaintHistory');
    }

    public function position()
    {
      return $this->belongsTo('App\Position');
    }
}
