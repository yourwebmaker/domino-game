<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain\Events;

use eCurring\DominoGame\Domain\DomainEvent;
use eCurring\DominoGame\Domain\Player;
use eCurring\DominoGame\Domain\Tile;
use function sprintf;

final class PlayerWasNotAbleToPlay implements DomainEvent
{
    /** @var Player */
    private $player;
    /** @var Tile */
    private $pulledTile;

    public function __construct(Player $player, Tile $pulledTile)
    {
        $this->player     = $player;
        $this->pulledTile = $pulledTile;
    }

    public function __toString() : string
    {
        return sprintf($this->player . ' Cannot play, pulling %s', $this->pulledTile);
    }
}
