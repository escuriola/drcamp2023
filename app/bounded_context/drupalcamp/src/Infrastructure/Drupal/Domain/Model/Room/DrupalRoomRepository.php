<?php

declare(strict_types=1);

namespace drupalcamp\Infrastructure\Drupal\Domain\Model\Room;

use Drupal\node\Entity\Node;
use drupalcamp\Domain\Model\Room\Room;
use drupalcamp\Domain\Model\Room\RoomCanNotBeCreatedException;
use drupalcamp\Domain\Model\Room\RoomRepository;

class DrupalRoomRepository implements RoomRepository
{

  public function save(Room $room)
  {
    try {
      $newRoom = Node::create(
        [
          'uuid' => $room->roomId()->id(),
          'type' => 'dc_room',
        ]
      );
      $newRoom->set('title',  $room->name());

      $newRoom->save();
    } catch (\Exception $e) {
      throw new RoomCanNotBeCreatedException('Room can not be created ' .$e->getMessage() );
    }

  }

  public function updateLocation()
  {
    // TODO: Implement updateLocation() method.
  }
}
