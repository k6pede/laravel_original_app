<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\CharacterService;
use App\Repositories\CharacterRepository;
use Illuminate\Http\Request;
use Mockery;

class CharacterServiceTest extends TestCase
{
    public function testGetCharactersByDate()
    {
        // Create a mock for the CharacterRepository::getCharactersByDate method
        $mock = Mockery::mock('overload:' . CharacterRepository::class);
        $mock->shouldReceive('getCharactersByDate')
            ->with(5, 14)
            ->once()
            ->andReturn('characters');

        $request = new Request();
        $request->merge(['month' => 5, 'day' => 14]);

        // Call the method under test
        $result = CharacterService::getCharactersByDate($request);

        // Assert the result
        $this->assertEquals('characters', $result);
    }

    public function testGetCharactersFromTitle()
    {
        // Create a mock for the CharacterRepository::getCharactersFromTitle method
        $mock = Mockery::mock('overload:' . CharacterRepository::class);
        $mock->shouldReceive('getCharactersFromTitle')
            ->with('title')
            ->once()
            ->andReturn('characters');

        $request = new Request();
        $request->merge(['title' => 'title']);

        // Call the method under test
        $result = CharacterService::getCharactersFromTitle($request);

        // Assert the result
        $this->assertEquals('characters', $result);
    }
}

