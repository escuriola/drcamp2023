<?php

namespace drupalcamp\Domain\Model\Speaker;

interface SpeakerRepository
{

  public function save(Speaker $speaker);

  public function findById(SpeakerId $speakerId): Speaker;

}
