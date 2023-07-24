<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\CharacterService;
use App\Repositories\CharacterRepository;
use Illuminate\Http\Request;
use Mockery;

class CharacterServiceTest extends TestCase
{

    private $characterService;
    private $characterRepository;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a mock for the CharacterRepository
        $this->characterRepository = Mockery::mock(CharacterRepository::class);

        $this->characterService = new CharacterService($this->characterRepository);
    }

    public function testGetCharactersByDate()
    {
        $this->characterRepository->shouldReceive('getCharactersByDate')
            ->with(5, 14)
            ->once()
            ->andReturn('characters');

        $request = new Request();
        $request->merge(['month' => 5, 'day' => 14]);

        // Call the method under test
        $result = $this->characterService->getCharactersByDate($request);

        // Assert the result
        $this->assertEquals('characters', $result);
    }

    public function testGetCharactersFromTitle()
    {
  
        $this->characterRepository->shouldReceive('getCharactersFromTitle')
            ->with('title')
            ->once()
            ->andReturn('characters');

        $request = new Request();
        $request->merge(['title' => 'title']);

        // Call the method under test
        $result = $this->characterService->getCharactersFromTitle($request);

        // Assert the result
        $this->assertEquals('characters', $result);
    }
}

