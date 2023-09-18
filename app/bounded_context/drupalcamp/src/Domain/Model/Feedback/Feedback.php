<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Feedback;

use drupalcamp\Domain\Model\Paper\Paper;

class Feedback
{
  private Paper $paper;
  private $user;
  private string $description;
  private int $score;


  public function __construct(Paper $paper, $user, string $description, int $score)
  {
    $this->paper = $paper;
    $this->user = $user;
    $this->description = $description;
    $this->score = $score;
  }

  public function paper(): Paper
  {
    return $this->paper;
  }

  public function user()
  {
    return $this->user;
  }

  public function description(): string
  {
    return $this->description;
  }

  public function score(): int
  {
    return $this->score;
  }



}
