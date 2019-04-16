<?php

if (! function_exists('isActiveRoute')) {
    function isActiveRoute($route_array, $style ='border-bottom: 10px solid #f8f9fa;')
    {
        if (in_array(Route::currentRouteName(),$route_array))
        return $style;
    }
}

if (! function_exists('isActiveRouteA')) {
    function isActiveRouteA($route_array, $class ='active-link')
    {
        if (in_array(Route::currentRouteName(),$route_array))
        return $class;
    }
}


if (! function_exists('stats')) {
    function stats($complaints)
    {
      $complaints_per_month = [0,0,0,0,0,0,0,0,0,0,0,0];
      $solved_complaints_per_month = [0,0,0,0,0,0,0,0,0,0,0,0];
      $unsolved_complaints_per_month = [0,0,0,0,0,0,0,0,0,0,0,0];

      foreach ($complaints as $complaint) {
        switch ($complaint->created_at->format('M')) {
          case 'Jan':
              $complaints_per_month[0] = $complaints_per_month[0] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[0] = $solved_complaints_per_month[0] + 1;
              }else {
                $unsolved_complaints_per_month[0] = $unsolved_complaints_per_month[0] + 1;
              }
              break;
          case 'Feb':
              $complaints_per_month[1] = $complaints_per_month[1] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[1] = $solved_complaints_per_month[1] + 1;
              }else {
                $unsolved_complaints_per_month[1] = $unsolved_complaints_per_month[1] + 1;
              }
              break;
          case 'Mar':
              $complaints_per_month[2] = $complaints_per_month[2] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[2] = $solved_complaints_per_month[2] + 1;
              }else {
                $unsolved_complaints_per_month[2] = $unsolved_complaints_per_month[2] + 1;
              }
              break;
          case 'Apr':
              $complaints_per_month[3] = $complaints_per_month[3] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[3] = $solved_complaints_per_month[3] + 1;
              }else {
                $unsolved_complaints_per_month[3] = $unsolved_complaints_per_month[3] + 1;
              }
              break;
          case 'May':
              $complaints_per_month[4] = $complaints_per_month[4] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[4] = $solved_complaints_per_month[4] + 1;
              }else {
                $unsolved_complaints_per_month[4] = $unsolved_complaints_per_month[4] + 1;
              }
              break;
          case 'Jun':
              $complaints_per_month[5] = $complaints_per_month[5] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[5] = $solved_complaints_per_month[5] + 1;
              }else {
                $unsolved_complaints_per_month[5] = $unsolved_complaints_per_month[5] + 1;
              }
              break;
          case 'Jul':
              $complaints_per_month[6] = $complaints_per_month[6] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[6] = $solved_complaints_per_month[6] + 1;
              }else {
                $unsolved_complaints_per_month[6] = $unsolved_complaints_per_month[6] + 1;
              }
              break;
          case 'Aug':
              $complaints_per_month[7] = $complaints_per_month[7] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[7] = $solved_complaints_per_month[7] + 1;
              }else {
                $unsolved_complaints_per_month[7] = $unsolved_complaints_per_month[7] + 1;
              }
              break;
          case 'Sep':
              $complaints_per_month[8] = $complaints_per_month[8] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[8] = $solved_complaints_per_month[8] + 1;
              }else {
                $unsolved_complaints_per_month[8] = $unsolved_complaints_per_month[8] + 1;
              }
              break;
          case 'Oct':
              $complaints_per_month[9] = $complaints_per_month[9] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[9] = $solved_complaints_per_month[9] + 1;
              }else {
                $unsolved_complaints_per_month[9] = $unsolved_complaints_per_month[9] + 1;
              }
              break;
          case 'Nov':
              $complaints_per_month[10] = $complaints_per_month[10] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[10] = $solved_complaints_per_month[10] + 1;
              }else {
                $unsolved_complaints_per_month[10] = $unsolved_complaints_per_month[10] + 1;
              }
              break;
          case 'Dec':
              $complaints_per_month[11] = $complaints_per_month[11] + 1;
              if( $complaint->status == config('const.complaint_status.solved'))  {
                $solved_complaints_per_month[11] = $solved_complaints_per_month[11] + 1;
              }else {
                $unsolved_complaints_per_month[11] = $unsolved_complaints_per_month[11] + 1;
              }
              break;

          default:
              break;

        }
      }
      return  array(
        'complaints_per_month' => $complaints_per_month,
        'solved_complaints_per_month' => $solved_complaints_per_month,
        'unsolved_complaints_per_month' => $unsolved_complaints_per_month
      );
    }


}
