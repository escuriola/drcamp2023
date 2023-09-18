<?php

declare(strict_types=1);

namespace drupalcamp\Tests\Domain\Model\Speaker;

use drupalcamp\Domain\Model\Speaker\Speaker;
use drupalcamp\Domain\Model\Speaker\SpeakerId;
use PHPUnit\Framework\TestCase;

class SpeakerTest extends TestCase
{
  const SPEAKER_ID = 'XXSASD';
  const SPEAKER_NAME = 'Jonh';
  const SPEAKER_LAST_NAME = 'Doe';
  const SPEAKER_BIO = 'Donec vitae sapien ut libero';
  const SPEAKER_MAIL = 'jonh@example.com';
  const DRUPAL_USERNAME = 'dries';

  /** @test */
  public function should_create_a_speaker(): void
  {
    $speakerId = SpeakerId::fromString(self::SPEAKER_ID);

    $speaker = new Speaker(
      $speakerId,
      self::SPEAKER_NAME,
      self::SPEAKER_LAST_NAME,
      self::SPEAKER_BIO,
      self::SPEAKER_MAIL,
      self::DRUPAL_USERNAME
    );

    $this->assertSame(self::SPEAKER_NAME, $speaker->name());
    $this->assertSame(self::SPEAKER_LAST_NAME, $speaker->lastName());
    $this->assertSame(self::SPEAKER_BIO, $speaker->bio());
    $this->assertSame(self::SPEAKER_MAIL, $speaker->email());
    $this->assertSame(self::DRUPAL_USERNAME, $speaker->drupalUserName());
  }

}
