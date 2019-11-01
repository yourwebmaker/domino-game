<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use function count;
use function sprintf;

final class Game
{
    /** @var LineOfPlay */
    private $lineOfPlay;
    /** @var PlayerList */
    private $playerList;
    /** @var Stock */
    private $stock;

    public function __construct(PlayerList $playerList, Stock $stock)
    {
        $firstTile        = $stock->pullTile();
        $this->lineOfPlay = new LineOfPlay($firstTile);
        $this->stock      = $stock;
        $this->playerList = $playerList;

        echo sprintf("Game starting with first tile: %s\n", $firstTile);
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
            echo sprintf($player . " Cannot play, pulling %s\n", $playableTile);
        }

        if ($playableTile) {
            $endToConnect = $this->lineOfPlay->getEndToConnect($playableTile);
            $player->playTile($playableTile, $this->lineOfPlay);

            echo sprintf("%s plays %s to connect to tile %s on the board\n", $player, $playableTile, $endToConnect);
        }

        echo 'Board is now ' . $this->lineOfPlay . "\n";

        if (count($player->tiles()) === 0) {
            echo "Player {$player} has won!";
            return $player;
        }

        return $this->start($this->playerList->next());
    }
}
