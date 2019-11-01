<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain\Events;

use eCurring\DominoGame\Domain\DomainEvent;
use eCurring\DominoGame\Domain\LineOfPlay;

final class BoardHasChanged implements DomainEvent
{
    /** @var LineOfPlay */
    private $lineOfPlay;

    public function __construct(LineOfPlay $lineOfPlay)
    {
        $this->lineOfPlay = $lineOfPlay;
    }

    public function __toString() : string
    {
        return 'Board is now ' . $this->lineOfPlay;
    }
}
