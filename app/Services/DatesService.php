<?php

namespace App\Services;

use Carbon\Carbon;
use DateTime;use Illuminate\Http\Request;

class DatesService
{

  public function getDate(Request $request)
  {
      $now = Carbon::now();
      //月、日時が指定されていなければ現在の日時を返す。
      $year = $request->input('year', $now->year);
      $month = $request->input('month', $now->month);
      $day = $request->input('day', $now->day);

      return [$now, $month, $year, $day];
  }

    

    
}