<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use RuntimeException;
use function array_shift;
use function count;

final class FixedStock implements Stock
{
    /** @var Tile[] */
    private $tiles;

    public function __construct()
    {
        $this->tiles = [
            Tile::fromString('0:1'),
            Tile::fromString('1:4'),
            Tile::fromString('5:4'),
            Tile::fromString('4:2'),
            Tile::fromString('0:1'),
            Tile::fromString('1:5'),
            Tile::fromString('5:3'),
            Tile::fromString('6:6'),
            Tile::fromString('4:3'),
            Tile::fromString('4:1'),
            Tile::fromString('4:6'),
        ];
    }

    /**
     * @inheritDoc
     */
    public function tiles() : array
    {
        return $this->tiles;
    }

    /**
     * @inheritDoc
     */
    public function drawTiles(int $amount) : array
    {
        $drawnTiles = [];
        for ($i = 0; $i < $amount; $i++) {
            $drawnTiles[] = array_shift($this->tiles);
        }

        return $drawnTiles;
    }

    public function pullTile() : Tile
    {
        if (count($this->tiles) === 0) {
            throw new RuntimeException('Ran out of tiles on stock');
        }

        return array_shift($this->tiles);
    }
}
