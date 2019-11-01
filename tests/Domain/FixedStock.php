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

    public function __construct(array $tiles = [])
    {
        if ($tiles) {
            $this->tiles = $tiles;
            return;
        }

        for ($i = 0; $i <= 6; $i++) {
            for ($j = 0; $j <= $i; $j++) {
                $this->tiles[] = new Tile($i, $j);
            }
        }
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

    public function __toString() : string
    {
        return implode(' ', $this->tiles);
    }
}
