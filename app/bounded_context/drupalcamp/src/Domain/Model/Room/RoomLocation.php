<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Room;

class RoomLocation
{
  private string $building;
  private int $floor;

  private string $roomCode;

  public function __construct(string $building, int $floor, string $roomCode)
  {
    $this->building = $building;
    $this->floor = $floor;
    $this->roomCode = $roomCode;
  }

  public static function fromArray(array $roomLocation): RoomLocation
  {
    return new self(
      $roomLocation['building'],
      $roomLocation['floor'],
      $roomLocation['roomCode'],
    );
  }

  public function building(): string
  {
    return $this->building;
  }

  public function floor(): int
  {
    return $this->floor;
  }

  public function roomCode(): string
  {
    return $this->roomCode;
  }


}
