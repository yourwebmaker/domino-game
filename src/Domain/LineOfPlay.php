<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use DomainException;
use function array_unshift;
use function array_values;
use function count;
use function end;
use function implode;

final class LineOfPlay
{
    /** @var Tile[] */
    private $tiles;

    public function __construct(Tile $firstTile)
    {
        $this->tiles[] = $firstTile;
    }

    public function connect(Tile $tile) : void
    {
        if ($tile->canConnectWith($this->topEnd())) {
            if ($tile->bottomEnd() !== $this->topEnd()->topEnd()) {
                $tile->flip();
            }

            array_unshift($this->tiles, $tile);

            return;
        }

        if ($tile->canConnectWith($this->bottomEnd())) {
            $this->tiles[] = $tile;

            return;
        }

        throw new DomainException(
            'Cannot connect tile ' . $tile .
            ' to any of ends (top: ' . $this->topEnd() . ', bottom: ' . $this->bottomEnd() .
            ') of the line'
        );
    }

    public function topEnd() : Tile
    {
        return array_values($this->tiles)[0];
    }

    public function bottomEnd() : Tile
    {
        return end($this->tiles);
    }

    public function count() : int
    {
        return count($this->tiles);
    }

    public function __toString() : string
    {
        return implode(' ', $this->tiles);
    }
}
