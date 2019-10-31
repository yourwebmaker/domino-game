<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

final class Game
{
    /** @var LineOfPlay */
    private $lineOfPlay;

    public function __construct(PlayerList $playerList, Stock $stock)
    {
        $firstTile        = $stock->drawTiles(1)[0];
        $this->lineOfPlay = new LineOfPlay($firstTile);

        echo "Game starting with first tile: {$firstTile}\n";

        $player = $playerList->getCurrentValue();
        while (! $player->isAbleToPlay($this->lineOfPlay)) {
            $tile = $player->pullFromStock($stock);
            echo "{$player} Cannot play $tile\n";

            echo 'Pulling' . $tile . "\n";
        }

        if (isset($tile)) {
            $endToConnect = $this->lineOfPlay->getEndToConnect($tile);
            $player->playTile($tile, $this->lineOfPlay);
            echo "$player plays $tile to connect to tile $endToConnect on the board";
        }

        echo "\nBoard is now " . $this->lineOfPlay . "\n";

        $playerList->next();
    }

    public function lineOfPlay() : LineOfPlay
    {
        return $this->lineOfPlay;
    }
}
