<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Paper;

use drupalcamp\Domain\Model\Speaker\Speaker;

class Paper
{
  private PaperId $paperId;
  private string $title;
  private Speaker $speaker;
  private string $description;
  private string $language;
  private string $category;
  private string $level;
  private $presentation;

  public function __construct(
    PaperId  $paperId,
    string $title,
    Speaker  $speaker,
    String   $description,
    string $language,
    string   $category,
    string   $level,
             $presentation = NULL
  )
  {
    $this->paperId = $paperId;
    $this->title = $title;
    $this->speaker = $speaker;
    $this->description = $description;
    $this->language = $language;
    $this->category = $category;
    $this->level = $level;
    $this->presentation = $presentation;
  }

  public function paperId(): PaperId
  {
    return $this->paperId;
  }

  public function title(): string
  {
    return $this->title;
  }

  public function speaker(): Speaker
  {
    return $this->speaker;
  }

  public function description(): string
  {
    return $this->description;
  }

  public function language(): string
  {
    return $this->language;
  }

  public function category(): string
  {
    return $this->category;
  }

  public function level(): string
  {
    return $this->level;
  }

  public function presentation(): mixed
  {
    return $this->presentation;
  }

}
