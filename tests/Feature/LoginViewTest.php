<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginViewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/home');

        $response->assertStatus(200);
        $response->assertViewIs('login');
    }

    public function testLogin() {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login');
    }
}
