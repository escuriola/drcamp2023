<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Feedback;

class FeedbackId
{
  private $id;

  public function __construct(string $id)
  {
    $this->guard($id);

    $this->id = $id;
  }

  public static function fromString(string $value): FeedbackId
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
      throw new InvalidFeedbackIdException("The Feedback ID is empty");
    }
  }

}
