<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintReply extends Model
{
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function complaint()
    {
      return $this->belongsTo('App\Complaint');
    }
}
