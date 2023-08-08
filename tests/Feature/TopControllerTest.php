<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Services\EventService;
use App\Services\CalendarService;
use App\Services\CharacterService;
use App\Services\DatesService;



class TopTest extends TestCase
{

  private $characterService;
  private $eventService;
  private $datesService;
  private $calendarService;


  /**
   * A basic test example.
   *
   * @return void
   */
  public function testTop()
  {
    //$user = User::find(1);
    //$this->actingAs($user);
    $requst = [
    ];

      $response = $this->get('/', $requst);

      $response->assertStatus(200);
      $response->assertViewIs('top');
  }
}
