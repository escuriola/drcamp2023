<?php

declare(strict_types=1);

namespace drupalcamp\Domain\Model\Paper;

class Language
{
  private string $languageCode;
  private string $languageName;

  public function __construct(string $languageCode, string $languageName)
  {
    $this->languageCode = $languageCode;
    $this->languageName = $languageName;
  }

  public function languageCode(): string
  {
    return $this->languageCode;
  }

  public function languageName(): string
  {
    return $this->languageName;
  }



}
