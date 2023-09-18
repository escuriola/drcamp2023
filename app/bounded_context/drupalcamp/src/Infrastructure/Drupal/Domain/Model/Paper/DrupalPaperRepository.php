<?php

declare(strict_types=1);

namespace drupalcamp\Infrastructure\Drupal\Domain\Model\Paper;

use Drupal\node\Entity\Node;
use drupalcamp\Domain\Model\Paper\Paper;
use drupalcamp\Domain\Model\Paper\PaperId;
use drupalcamp\Domain\Model\Paper\PaperRepository;
use drupalcamp\Domain\Model\Room\RoomCanNotBeCreatedException;

class DrupalPaperRepository implements PaperRepository
{

  public function save(Paper $paper)
  {
    try {
      $newRoom = Node::create(['type' => 'dc_room']);
      $newRoom->set('title',  $paper->title());

      $newRoom->save();
    } catch (\Exception $e) {
      throw new RoomCanNotBeCreatedException('Room can not be created ' .$e->getMessage() );
    }
  }

  public function findById(PaperId $paperId): Paper
  {
    // TODO: Implement findById() method.
  }
}
