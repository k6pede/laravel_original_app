<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalendarService;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function calcCalendar(Request $request)
    {
        $year = date('Y'); // ここでは現在の年を取得していますが、必要に応じて変更してください
        $month = $request->month;

        $calendar = CalendarService::calcCalendar($year, $month);

        return response()->json($calendar);
    }
}
?>
