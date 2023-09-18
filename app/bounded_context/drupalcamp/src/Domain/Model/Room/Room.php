<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Room;

use phpDocumentor\Reflection\Location;

class Room
{
  private RoomId $roomId;
  private string $name;
  private RoomLocation $location;

  public function __construct(RoomId $roomId, string $name, RoomLocation $location)
  {
    $this->roomId = $roomId;
    $this->name = $name;
    $this->location = $location;
    $this->guard();
  }

  public function roomId(): RoomId
  {
    return $this->roomId;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function location(): RoomLocation
  {
    return $this->location;
  }

  private function guard(): void
  {
    if ($this->name === 'Moises') {
      throw new BannedRoomNamesException();
    }
  }

}
