<?php

namespace App\Services;

use Carbon\Carbon;
use DateTime;use Illuminate\Http\Request;

class DatesService
{
    public static function getDate(Request $request)
    {
      $now = Carbon::now();
        if(empty($request->year)) {
            $year = $now->year;
        }else{
            $year = $request->year;
        }
        $year = $now->year;
        $month = $request->month;
        $day = $request->day;
        if(empty($request->month)) {
            $month = $now->month;
        }
        if(empty($request->day)){
            $day = $now->day;
        }

      return [$now, $month, $year, $day];
    }

    

    
}