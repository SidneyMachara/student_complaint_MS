<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public function student()
    {
      return $this->belongsTo('App\Student');
    }

    public function complaint_attachments()
    {
      return $this->hasMany('App\ComplaintAttachment');
    }

    public function complaint_histories()
    {
      return $this->hasMany('App\ComplaintHistory');
    }

    public function complaint_replies()
    {
      return $this->hasMany('App\ComplaintReply');
    }
}
