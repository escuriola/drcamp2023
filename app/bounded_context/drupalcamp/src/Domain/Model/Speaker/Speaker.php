<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Speaker;

class Speaker
{
  private SpeakerId $speakerId;
  private string $name;
  private string $lastName;
  private string $bio;
  private string $email;
  private string $drupalUserName;

  public function __construct(SpeakerId $speakerId, string $name, string $lastName, string $bio, string $email, ?string $drupalUserName)
  {
    $this->speakerId = $speakerId;
    $this->name = $name;
    $this->lastName = $lastName;
    $this->bio = $bio;
    $this->email = $email;
    $this->drupalUserName = $drupalUserName;
  }

  public function speakerId(): SpeakerId
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

  public function drupalUserName(): ?string
  {
    return $this->drupalUserName;
  }

}
