<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintHistory extends Model
{

    public function lecturer()
    {
      return $this->belongsTo('App\Lecturer');
    }

    public function complaint_handler()
    {
      return $this->belongsTo('App\ComplaintHandler');
    }

    public function complaint()
    {
      return $this->belongsTo('App\Complaint');
    }
}
