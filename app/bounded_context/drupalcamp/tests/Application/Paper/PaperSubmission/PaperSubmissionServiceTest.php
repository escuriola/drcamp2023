<?php

declare(strict_types=1);

namespace drupalcamp\Tests\Application\Paper\PaperSubmission;

use drupalcamp\Domain\Model\Speaker\Speaker;
use drupalcamp\Domain\Model\Speaker\SpeakerId;
use PHPUnit\Framework\TestCase;

class PaperSubmissionServiceTest extends TestCase
{
  const SPEAKER_ID = 'XXSASD';
  const SPEAKER_NAME = 'Jonh';
  const SPEAKER_LAST_NAME = 'Doe';
  const SPEAKER_BIO = 'Donec vitae sapien ut libero';
  const SPEAKER_MAIL = 'jonh@example.com';
  const DRUPAL_USERNAME = 'dries';

  /** @test */
  public function should_submit_a_paper(): void
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


  }

}
