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
        if ($tile->canConnectToEnd($this->topEnd())) {
            if ($tile->bottomEnd() !== $this->topEnd()) {
                $tile->flip();
            }

            array_unshift($this->tiles, $tile);

            return;
        }

        if ($tile->canConnectToEnd($this->bottomEnd())) {
            if ($tile->topEnd() !== $this->bottomEnd()) {
                $tile->flip();
            }
            $this->tiles[] = $tile;

            return;
        }

        throw new DomainException(
            'Cannot connect tile ' . $tile .
            ' to any of ends (top: ' . $this->topEnd() . ', bottom: ' . $this->bottomEnd() .
            ') of the line'
        );
    }

    public function topEnd() : int
    {
        return array_values($this->tiles)[0]->topEnd();
    }

    public function bottomEnd() : int
    {
        return end($this->tiles)->bottomEnd();
    }

    public function count() : int
    {
        return count($this->tiles);
    }

    public function __toString() : string
    {
        return implode(' ', $this->tiles);
    }

    public function getEndToConnect(Tile $tile) : Tile
    {
        if ($tile->canConnectToEnd($this->bottomEnd())) {
            return array_values($this->tiles)[0];
        }

        if ($tile->canConnectToEnd($this->topEnd())) {
            return end($this->tiles);
        }

        //todo thown exception or nullable
    }
}
