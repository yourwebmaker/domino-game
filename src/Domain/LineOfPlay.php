<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use function count;

final class LineOfPlay
{
    /** @var Tile[] */
    private $tiles;

    public function __construct()
    {
    }

    public function add(Tile $tile) : void
    {
        $this->tiles[] = $tile;
    }

    public function count() : int
    {
        return count($this->tiles);
    }
}
