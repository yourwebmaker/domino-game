<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

final class Game
{
    /** @var Player[] */
    private $players;
    /** @var Stock */
    private $stock;
    /** @var LineOfPlay */
    private $lineOfPlay;

    /**
     * @param Player[]
     */
    public function __construct(array $players, Stock $stock, LineOfPlay $board)
    {
        $this->players = $players;
        $this->stock   = $stock;

        $board->add($stock->drawTiles(1)[0]);
        $this->lineOfPlay = $board;
    }

    public function lineOfPlay() : LineOfPlay
    {
        return $this->lineOfPlay;
    }
}
