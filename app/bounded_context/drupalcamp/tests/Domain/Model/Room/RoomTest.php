<?php

declare(strict_types=1);

namespace drupalcamp\Tests\Domain\Model\Room;

use drupalcamp\Domain\Model\Room\BannedRoomNamesException;
use drupalcamp\Domain\Model\Room\Room;
use drupalcamp\Domain\Model\Room\RoomId;
use drupalcamp\Domain\Model\Room\RoomLocation;
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
  const ROOM_ID = 'XX22';
  const ROOM_NAME = 'Sala 5';
  const BANNED_NAME = 'Moises';

  private RoomLocation $roomLocation;

  protected function setUp(): void
  {
    parent::setUp();

    $this->roomLocation = new RoomLocation(
      'Giralda',
      1,
      'XXZZ'
    );

  }

  /** @test */
  public function should_create_a_room(): void
  {
    $roomId = RoomId::fromString(self::ROOM_ID);

    $room = new Room(
      $roomId,
      self::ROOM_NAME,
      $this->roomLocation
    );

    $this->assertSame(self::ROOM_NAME, $room->name());
    $this->assertSame($this->roomLocation, $room->location());
  }

  /** @test */
  public function should_thrown_an_exception_if_name_is_banned(): void
  {
    $this->expectException(BannedRoomNamesException::class);

    $roomId = RoomId::fromString(self::ROOM_ID);

    new Room(
      $roomId,
      self::BANNED_NAME,
      $this->roomLocation,
    );

  }

}
