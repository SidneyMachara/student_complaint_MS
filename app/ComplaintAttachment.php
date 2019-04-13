<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintAttachment extends Model
{
    public function complaint()
    {
      return $this->belongsTo('App\Complaint');
    }
}
