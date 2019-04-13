<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintReply extends Model
{
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
