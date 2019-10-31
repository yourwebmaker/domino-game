<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

interface Stock
{
    /**
     * @return Tile[]
     */
    public function tiles() : array;

    /**
     * @return Tile[]
     */
    public function drawTiles(int $amount) : array;

    public function pullTile() : Tile;
}
