<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\EventService;
use App\Repositories\EventRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mockery;

class EventServiceTest extends TestCase
{

  use WithFaker;

  public function tearDown(): void
  {
    Mockery::close();
  }

  // public function testGetEvents()
  // {

  //   $userId = $this->faker->randomNumber();
  //   $year = $this->faker->year;
  //   $month = $this->faker->month;
  //   $events = 'events'; //テスト用の戻り値

  //   //Auth::id() のモック
  //   // $authMock = Mockery::mock('overload:' .Auth::class);
  //   // $authMock->shouldReceive('id')->andReturn($userId);
  //   Auth::shouldReceive('id')->andReturn($userId);

  //   // EventRepository::getSpecifiedEvents() のモック
  //   $mock = Mockery::mock(EventRepository::class);
  //   $mock->shouldReceive('getSpecifiedEvents')->once()->andReturn($events);
  //   $this->app->instance(EventRepository::class, $mock);

  //   $result = EventService::getEvents($year, $month);

  //   $this->assertEquals($events, $result);
  // }




  

  // public function testAddCharactersEvent()
  // {

  // }
}