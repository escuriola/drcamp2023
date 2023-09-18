<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\PaperSubmission;

use drupalcamp\Domain\AggregateRoot;
use drupalcamp\Domain\Model\Paper\PapersCollection;
use drupalcamp\Domain\Model\Speaker\Speaker;

class PaperSubmission implements AggregateRoot
{
  private Speaker $speaker;
  private PapersCollection $papersCollection;

  public function __construct($speaker, $papersCollection)
  {
    $this->speaker = $speaker;
    $this->papersCollection = $papersCollection;
    $this->guard();
  }

  public function speaker(): Speaker
  {
    return $this->speaker;
  }

  public function papersCollection(): PapersCollection
  {
    return $this->papersCollection;
  }

}
