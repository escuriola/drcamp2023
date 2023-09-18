<?php

declare(strict_types=1);

namespace drupalcamp\Application\Paper\PapersSubmission;

use drupalcamp\Domain\Command;

class PapersSubmissionCommand implements Command
{
  private string $speakerId;
  private string $name;
  private string $lastName;
  private string $bio;
  private string $email;
  private string $drupalUserName;
  private array $papers;

  public function __construct(string $speakerId, string $name, string $lastName, string $bio, string $email, string $drupalUserName, array $papers)
  {
    $this->speakerId = $speakerId;
    $this->name = $name;
    $this->lastName = $lastName;
    $this->bio = $bio;
    $this->email = $email;
    $this->drupalUserName = $drupalUserName;
    $this->papers = $papers;
  }

  public function speakerId(): string
  {
    return $this->speakerId;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function lastName(): string
  {
    return $this->lastName;
  }

  public function bio(): string
  {
    return $this->bio;
  }

  public function email(): string
  {
    return $this->email;
  }

  public function drupalUserName(): string
  {
    return $this->drupalUserName;
  }

  public function papers(): array
  {
    return $this->papers;
  }

}
