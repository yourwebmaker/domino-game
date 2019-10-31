<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

final class Stock
{
    /** @var Tile[] */
    private $tiles;

    public function __construct()
    {
        $this->buildTiles();
        $this->shuffleTiles();
    }

    public function tiles() : array
    {
        return $this->tiles;
    }

    private function buildTiles() : void
    {
        for($i = 0; $i <= 6; $i++) {
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