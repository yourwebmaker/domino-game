<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use function array_pop;
use function shuffle;

final class Stock
{
    /** @var Tile[] */
    private $tiles;

    public function __construct()
    {
        $this->buildTiles();
        $this->shuffleTiles();
    }

    /**
     * @return Tile[]
     */
    public function tiles() : array
    {
        return $this->tiles;
    }

    /**
     * @return Tile[]
     */
    public function drawTiles(int $amount) : array
    {
        $drawnTiles = [];
        for ($i = 0; $i < $amount; $i++) {
            $drawnTiles[] = array_pop($this->tiles);
        }

        return $drawnTiles;
    }

    private function buildTiles() : void
    {
        for ($i = 0; $i <= 6; $i++) {
            for ($j = 0; $j <= $i; $j++) {
                $this->tiles[] = new Tile($i, $j);
            }
        }
    }

    private function shuffleTiles() : void
    {
        shuffle($this->tiles);
    }
}
