<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain\Events;

use eCurring\DominoGame\Domain\DomainEvent;
use eCurring\DominoGame\Domain\Player;
use function sprintf;

final class PlayerWon implements DomainEvent
{
    /** @var Player */
    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function __toString() : string
    {
        return sprintf('Player %s has won!', $this->player);
    }
}
