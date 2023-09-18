<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Slot;

use drupalcamp\Domain\Model\Paper\Paper;
use drupalcamp\Domain\Model\Room\Room;

class Slot
{
  private Room $room;
  private Paper $paper;
  private $startDate;
  private $endDate;

  public function __construct(Room $room, Paper $paper, $startDate, $endDate)
  {
    $this->room = $room;
    $this->paper = $paper;
    $this->startDate = $startDate;
    $this->endDate = $endDate;
  }

  public function room(): Room
  {
    return $this->room;
  }

  public function paper(): Paper
  {
    return $this->paper;
  }

  /**
   * @return mixed
   */
  public function startDate()
  {
    return $this->startDate;
  }

  /**
   * @return mixed
   */
  public function endDate()
  {
    return $this->endDate;
  }

}
