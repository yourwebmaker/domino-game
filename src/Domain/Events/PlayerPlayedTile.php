<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain\Events;

use eCurring\DominoGame\Domain\DomainEvent;
use eCurring\DominoGame\Domain\Player;
use eCurring\DominoGame\Domain\Tile;
use function sprintf;

final class PlayerPlayedTile implements DomainEvent
{
    /** @var Player */
    private $player;
    /** @var Tile */
    private $playableTile;
    /** @var Tile */
    private $endToConnect;

    public function __construct(Player $player, Tile $playableTile, Tile $endToConnect)
    {
        $this->player       = $player;
        $this->playableTile = $playableTile;
        $this->endToConnect = $endToConnect;
    }

    public function __toString() : string
    {
        return sprintf(
            '%s plays %s to connect to tile %s on the board',
            $this->player,
            $this->playableTile,
            $this->endToConnect
        );
    }
}
