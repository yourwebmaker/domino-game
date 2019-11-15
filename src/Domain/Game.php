<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use eCurring\DominoGame\Domain\Events\BoardHasChanged;
use eCurring\DominoGame\Domain\Events\GameStarted;
use eCurring\DominoGame\Domain\Events\PlayerPlayedTile;
use eCurring\DominoGame\Domain\Events\PlayerWasNotAbleToPlay;
use eCurring\DominoGame\Domain\Events\PlayerWon;
use function count;

/**
 * Aggregate class responsible to manage the game, start and play alternating between the N players in the game.
 */
final class Game
{
    /** @var LineOfPlay */
    private $lineOfPlay;
    /** @var PlayerList */
    private $playerList;
    /** @var Stock */
    private $stock;
    /** @var array<DomainEvent> */
    private $events;

    public function __construct(PlayerList $playerList, Stock $stock)
    {
        $firstTile        = $stock->pullTile();
        $this->lineOfPlay = new LineOfPlay($firstTile);
        $this->stock      = $stock;
        $this->playerList = $playerList;
        $this->record(new GameStarted($firstTile));
    }

    public function lineOfPlay() : LineOfPlay
    {
        return $this->lineOfPlay;
    }

    public function start(Player $player) : Player
    {
        $playableTile = $player->playableTile($this->lineOfPlay);

        while (! $player->isAbleToPlay($this->lineOfPlay)) {
            $playableTile = $player->pullFromStock($this->stock);
            $this->record(new PlayerWasNotAbleToPlay($player, $playableTile));
        }

        if ($playableTile) {
            $endToConnect = $this->lineOfPlay->getEndToConnect($playableTile);
            $player->playTile($playableTile, $this->lineOfPlay);

            $this->record(new PlayerPlayedTile($player, $playableTile, $endToConnect));
        }

        $this->record(new BoardHasChanged(clone $this->lineOfPlay));

        if (count($player->tiles()) === 0) {
            $this->record(new PlayerWon($player));

            return $player;
        }

        return $this->start($this->playerList->next());
    }

    private function record(DomainEvent $event) : void
    {
        $this->events[] = $event;
    }

    /**
     * @return array<DomainEvent>
     */
    public function events() : array
    {
        return $this->events;
    }
}
