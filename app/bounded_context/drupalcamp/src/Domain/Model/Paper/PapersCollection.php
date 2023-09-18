<?php
declare(strict_types=1);

namespace drupalcamp\Domain\Model\Paper;

class PapersCollection
{
  /**
   * @var Paper[]
   */
  private array $papers;

  public function __construct(array $papers)
  {
    foreach ($papers as $paper) {
      if ($paper instanceof Paper === false) {
        throw new InvalidPaperException('The paper should be instances of ' . Paper::class);
      }

      $this->add($paper);
    }
  }

  public static function fromArray(array $papers)
  {
    return new static($papers);
  }

  public function papers(): array
  {
    return $this->papers;
  }

  private function add(Paper $paper)
  {
    $this->papers[] = $paper;
  }
}
