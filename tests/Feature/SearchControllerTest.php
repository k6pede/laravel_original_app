<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;



class SearchTest extends TestCase
{

  /**
   * A basic test example.
   *
   * @return void
   */
  public function testSearch()
  {
    //$user = User::find(1);
    //$this->actingAs($user);
    $requst = [
    ];

      $response = $this->get('/search', $requst);

      $response->assertStatus(200);
      $response->assertViewIs('search');
  }
}
