<?php

declare(strict_types=1);

namespace drupalcamp\Application\Room\Create;

use drupalcamp\Domain\Command;

class RoomCreateCommand implements Command
{
  private string $id;
  private string $name;
  private array $roomLocation;

  public function __construct(string $roomId, string $roomName, array $roomLocation)
  {
    $this->id = $roomId;
    $this->name = $roomName;
    $this->roomLocation = $roomLocation;
  }

  public function roomId(): string
  {
    return $this->id;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function roomLocation(): array
  {
    return $this->roomLocation;
  }

}
