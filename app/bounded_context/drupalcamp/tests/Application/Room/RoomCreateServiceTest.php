<?php

declare(strict_types=1);

namespace drupalcamp\Tests\Application\Room;

use drupalcamp\Application\Room\Create\RoomCreateCommand;
use drupalcamp\Application\Room\Create\RoomCreateService;
use drupalcamp\Domain\Model\Room\Room;
use drupalcamp\Domain\Model\Room\RoomId;
use drupalcamp\Domain\Model\Room\RoomLocation;
use drupalcamp\Domain\Model\Room\RoomRepository;
use PHPUnit\Framework\TestCase;

class RoomCreateServiceTest extends TestCase
{
  const ROOM_ID = '2131';
  const ROOM_NAME = 'Azul';

  /** @test */
  public function should_create_a_room(): void
  {
    $location = [
        'building' => 'Alfonso XXX',
        'floor' => 1,
        'roomCode' =>'XPSA'
      ];
    $room = new Room(
      RoomId::fromString(self::ROOM_ID),
      self::ROOM_NAME,
      RoomLocation::fromArray($location),
    );
    $roomRespoitoryMock = $this->createMock(RoomRepository::class);
    $roomRespoitoryMock->expects($this->once())
      ->method('save')
      ->with($this->equalTo($room));

    $service = new RoomCreateService($roomRespoitoryMock);
    $command = new RoomCreateCommand(
      self::ROOM_ID,
      self::ROOM_NAME,
      $location
    );
    $service->execute($command);
  }

}
