<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CalendarService;
use Carbon\Carbon;

class CalendarServiceTest extends TestCase
{
    /**
     * Test calcCalendar method.
     *
     * @return void
     */
    public function testCalcCalendar()
    {
        // Set a fixed date for testing
        $year = 2023;
        $month = 5;

        // Call the method
        list($dates, $date, $count, $addDay, $dateStr, $nextMonth, $lastMonth, $eto) = CalendarService::calcCalendar($year, $month);

        // Assert the date string
        $this->assertEquals('2023-05-01', $dateStr);

        // Assert the next month and last month
        $this->assertEquals(6, $nextMonth->month);
        $this->assertEquals(4, $lastMonth->month);


        // Add more assertions as needed...
    }

    /**
     * Test getHolidays method.
     *
     * @return void
     */
    public function testGetHolidays()
    {
        // Set a fixed date for testing
        $year = 2023;
        $month = 1;

        // Call the method
        $holidays = CalendarService::getHolidays($year, $month);

        // Assert the number of holidays in January 2023
        // You might need to adjust this value based on the actual holidays in that month
        $this->assertCount(2, $holidays);

        // Add more assertions as needed...
    }
}
