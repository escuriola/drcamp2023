<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Room;

interface RoomRepository
{
  public function save(Room $room);

  public function updateLocation();
}
