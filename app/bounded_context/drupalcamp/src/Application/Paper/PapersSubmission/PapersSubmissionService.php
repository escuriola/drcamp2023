<?php

declare(strict_types=1);

namespace drupalcamp\Application\Paper\PapersSubmission;

use drupalcamp\Domain\ApplicationService;
use drupalcamp\Domain\Model\Paper\Paper;
use drupalcamp\Domain\Model\PaperSubmission\PaperSubmission;
use drupalcamp\Domain\Model\PaperSubmission\PaperSubmissionRepository;
use drupalcamp\Domain\Model\Speaker\Speaker;
use drupalcamp\Domain\Model\Speaker\SpeakerId;


class PapersSubmissionService implements ApplicationService
{
  private PaperSubmissionRepository $paperSubmissionRepository;

  public function __construct( PaperSubmissionRepository $paperSubmissionRepository )
  {
    $this->paperRepository = $paperSubmissionRepository;
  }

  public function execute(PapersSubmissionCommand $command)
  {
    $speaker = new Speaker(
      SpeakerId::fromString($command->speakerId()),
      $command->name(),
      $command->lastName(),
      $command->bio(),
      $command->email(),
      $command->drupalUserName()
    );

    $paperCollection = [];

    foreach ($command->papers() as $item) {
      $paper = new Paper(
        $item['paperId'],
        $item['title'],
        $speaker,
        $item['description'],
        $item['language'],
        $item['category'],
        $item['level']
      );

      $paperCollection[] = $paper;
    }

    $paperSubmission = new PaperSubmission(
      $speaker,
      $paperCollection
    );

    $this->paperSubmissionRepository->paperSubmission($paperSubmission);
  }

}
