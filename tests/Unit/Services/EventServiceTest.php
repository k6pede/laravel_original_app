<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Mockery;

use function PHPUnit\Framework\assertEquals;

class EventServiceTest extends TestCase
{

  protected $eventRepository;

  public function setUp(): void
  {
    parent::setUp();
    $this->eventRepository = $this->app->make(EventRepository::class);
  }

  public function testGetEvents()
  {
    $year = 2023;
    $month = 4;
    $user_id = 3;
    $setYear = $year;
    $setMonth = $month;
    $FirstDayOfMonth = Carbon::create($setYear, $setMonth, 1)->firstOfMonth();
    $LastDayOfMonth  = Carbon::create($setYear, $setMonth, 1)->lastOfMonth();

    $eventData = [
      'user_id' => 3,
      'character_id' => null,
      'title' => 'テスト用の予定です',
      'description' => null,
      'start_at' => '2023-04-09 00:11:00',
      'end_at' => null,
    ];



    $results = $this->eventRepository->getEvents($user_id, $FirstDayOfMonth, $LastDayOfMonth);
    $resultsArray = $results->map(function ($event) {
      return [
          'user_id' => $event->user_id,
          'character_id' => $event->character_id,
          'title' => $event->title,
          'description' => $event->description,
          'start_at' => $event->start_at,
          'end_at' => $event->end_at,
      ];
    })->toArray();
    // var_dump($eventData);
    // var_dump($resultsArray);

    assertEquals($eventData, $resultsArray[1]);

    
  }

  public function testAddCharacterEvent()
  {
    // テスト用データ
    // 有効なユーザーIDを取得するか、ユーザーを作成する
    $user = User::factory()->create();
    $user_id = $user->id;
    $character_id = 2;
    $start_at = '2023-05-01 12:00:00';
    $end_at = '2023-05-01 14:00:00';
    $title = 'テストイベント';
    $description = 'テスト用のイベントです';

    DB::beginTransaction();

    try {
      // メソッドを呼び出してデータを追加
      $this->eventRepository->addCharactersEvent($user_id, $character_id, $start_at, $end_at, $title, $description);

      // 追加されたデータを取得してアサーションを行う
      $event = Event::where('user_id', $user_id)
          ->where('character_id', $character_id)
          ->where('start_at', $start_at)
          ->where('end_at', $end_at)
          ->where('title', $title)
          ->where('description', $description)
          ->first();

      $this->assertNotNull($event);

      // テスト後にデータを削除
      $event->delete();

      // トランザクションをコミット
      DB::commit();
    } catch (\Exception $e) {
        // トランザクションをロールバック
        DB::rollBack();
        throw $e;
    }
  }

  public function testCreateEvent()
  {
     // テスト用データ
    // 有効なユーザーIDを取得するか、ユーザーを作成する
    $user = User::factory()->create();
    $user_id = $user->id;
    $start_at = '2023-06-20 18:00';
    $end_at = '2023-06-20 19:00';
    $title = 'test';
    $description = 'test';

    DB::beginTransaction();

    try {
      // メソッドを呼び出してデータを追加
      $this->eventRepository->createEvent($user_id, $start_at, $end_at, $title, $description);

      // 追加されたデータを取得してアサーションを行う
      $event = Event::where('user_id', $user_id)
          ->where('start_at', $start_at)
          ->where('end_at', $end_at)
          ->where('title', $title)
          ->where('description', $description)
          ->first();

      $this->assertNotNull($event);

      // テスト後にデータを削除
      $event->delete();

      // トランザクションをコミット
      DB::commit();
    } catch (\Exception $e) {
        // トランザクションをロールバック
        DB::rollBack();
        throw $e;
    }
  }
}