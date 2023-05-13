<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Services\DatesService;
use Carbon\Carbon;

class DatesServiceTest extends TestCase
{
    /**
     * Test getDate method with no date in request.
     *
     * @return void
     */
    public function testGetDateWithNoDateInRequest()
    {
        $request = new Request();

        [$now, $month, $year, $day] = DatesService::getDate($request);

        $this->assertEquals(Carbon::now()->year, $year);
        $this->assertEquals(Carbon::now()->month, $month);
        $this->assertEquals(Carbon::now()->day, $day);
    }

    /**
     * Test getDate method with date in request.
     *
     * @return void
     */
    public function testGetDateWithDateInRequest()
    {
        $request = new Request([
            'year' => 2023,
            'month' => 5,
            'day' => 13,
        ]);

        [$now, $month, $year, $day] = DatesService::getDate($request);

        $this->assertEquals(2023, $year);
        $this->assertEquals(5, $month);
        $this->assertEquals(13, $day);
    }
}
