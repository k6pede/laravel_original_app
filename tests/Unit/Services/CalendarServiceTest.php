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
        // Generate random year and month values within the valid range
        $year = random_int(2000, 2025);
        $month = random_int(1, 12);

        // Call the method
        list($dates, $date, $count, $addDay, $dateStr, $nextMonth, $lastMonth, $eto) = CalendarService::calcCalendar($year, $month);

        // Display the test input values
        var_dump($year, $month);
        
        // Assert the date string
        $expectedDateString = sprintf('%04d-%02d-01', $year, $month);
        $this->assertEquals($expectedDateString, $dateStr);


        // Assert the next month and last month
        $expectedNextMonth = ($month === 12) ? 1 : ($month + 1);
        $expectedLastMonth = ($month === 1) ? 12 : ($month - 1);
        $this->assertEquals($expectedNextMonth, $nextMonth->month);
        $this->assertEquals($expectedLastMonth, $lastMonth->month);

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
