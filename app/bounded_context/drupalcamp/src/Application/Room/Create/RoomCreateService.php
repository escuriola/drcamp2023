<?php

declare(strict_types=1);

namespace drupalcamp\Application\Room\Create;

use drupalcamp\Domain\ApplicationService;
use drupalcamp\Domain\Model\Room\Room;
use drupalcamp\Domain\Model\Room\RoomId;
use drupalcamp\Domain\Model\Room\RoomLocation;
use drupalcamp\Domain\Model\Room\RoomRepository;

class RoomCreateService implements ApplicationService
{
  private RoomRepository $roomRepository;

  public function __construct(RoomRepository $roomRepository)
  {
    $this->roomRepository = $roomRepository;
  }

  public function execute(RoomCreateCommand $roomCreateCommand)
  {
    $room = new Room(
      RoomId::fromString($roomCreateCommand->roomId()),
      $roomCreateCommand->name(),
      RoomLocation::fromArray($roomCreateCommand->roomLocation())
    );

    $this->roomRepository->save($room);
  }

}
