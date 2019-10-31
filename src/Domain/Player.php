<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

final class Player
{
    /** @var string */
    private $name;
    /** @var Tile[] */
    private $tiles;

    public function __construct(string $name, Stock $stock)
    {
        $this->name  = $name;
        $this->tiles = $stock->drawTiles(7);
    }

    public function name() : string
    {
        return $this->name;
    }

    /**
     * @return Tile[]
     */
    public function tiles() : array
    {
        return $this->tiles;
    }
}
