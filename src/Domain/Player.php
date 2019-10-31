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

    public function isAbleToPlay(LineOfPlay $lineOfPlay) : bool
    {
        foreach ($this->tiles as $tile) {
            if ($tile->canConnectWith($lineOfPlay->topEnd()) || $tile->canConnectWith($lineOfPlay->bottomEnd())) {
                return true;
            }
        }

        return false;
    }

    public function playableTile(LineOfPlay $lineOfPlay) : ?Tile
    {
        foreach ($this->tiles as $tile) {
            if ($tile->canConnectWith($lineOfPlay->topEnd()) || $tile->canConnectWith($lineOfPlay->bottomEnd())) {
                return $tile;
            }
        }

        return null;
    }

    public function playTile(Tile $tile, LineOfPlay $lineOfPlay) : void
    {
        $lineOfPlay->connect($tile);
    }

    /**
     * @return Tile[]
     */
    public function tiles() : array
    {
        return $this->tiles;
    }

    public function pullFromStock(Stock $stock) : Tile
    {
        $tile          = $stock->pullTile();
        $this->tiles[] = $tile;

        return $tile;
    }

    public function __toString() : string
    {
        return $this->name;
    }
}
