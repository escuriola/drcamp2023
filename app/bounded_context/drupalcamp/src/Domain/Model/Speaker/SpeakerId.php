<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Speaker;

class SpeakerId
{
  private $id;

  public function __construct(string $id)
  {
    $this->guard($id);

    $this->id = $id;
  }

  public static function fromString(string $value): SpeakerId
  {
    return new self($value);
  }

  public function id(): string
  {
    return $this->id;
  }

  private function guard(string $id): void
  {
    if (empty($id)) {
      throw new InvalidSpeakerIdException("The Speaker ID is empty");
    }
  }

}
