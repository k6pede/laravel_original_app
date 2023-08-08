<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;



class ShowTest extends TestCase
{

  /**
   * A basic test example.
   *
   * @return void
   */
  public function testShow()
  {
    //$user = User::find(1);
    //$this->actingAs($user);
    $requst = [
    ];

      $response = $this->get('/show', $requst);

      $response->assertStatus(200);
      $response->assertViewIs('show');
  }
}
