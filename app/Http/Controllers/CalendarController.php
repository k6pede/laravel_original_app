<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalendarService;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function calcCalendar(Request $request)
    {
        $year = date('Y');
        $month = $request->month;

        $calendar = CalendarService::calcCalendar($year, $month);

        return response()->json($calendar);
    }
}
?>
