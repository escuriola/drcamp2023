<?php

declare(strict_types=1);

namespace drupalcamp\Infrastructure\Drupal\Domain\Model\Speaker;

use drupalcamp\Domain\Model\Speaker\Speaker;
use drupalcamp\Domain\Model\Speaker\SpeakerId;
use drupalcamp\Domain\Model\Speaker\SpeakerRepository;

class DrupalSpeakerRepository implements SpeakerRepository
{

  public function save(Speaker $speaker)
  {
    // TODO: Implement save() method.
  }

  public function findById(SpeakerId $speakerId): Speaker
  {
    // TODO: Implement findById() method.
  }
}
