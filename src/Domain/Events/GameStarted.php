<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain\Events;

use eCurring\DominoGame\Domain\DomainEvent;
use eCurring\DominoGame\Domain\Tile;
use function sprintf;

final class GameStarted implements DomainEvent
{
    /** @var Tile */
    private $firstTile;

    public function __construct(Tile $firstTile)
    {
        $this->firstTile = $firstTile;
    }

    public function __toString() : string
    {
        return sprintf('Game starting with first tile: %s', $this->firstTile);
    }
}
