<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\PaperSubmission;

use drupalcamp\Domain\Model\PaperSubmission\PaperSubmission;

interface PaperSubmissionRepository
{
  public function paperSubmission(PaperSubmission $paperSubmission);

}
