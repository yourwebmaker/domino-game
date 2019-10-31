<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

final class Tile
{
    /** @var int */
    private $topEnd;
    /** @var int */
    private $bottomEnd;

    public function __construct(int $topEnd, int $bottomEnd)
    {
        $this->topEnd    = $topEnd;
        $this->bottomEnd = $bottomEnd;
    }

    public function canConnectWith(Tile $anotherTile) : bool
    {
        return $this->topEnd === $anotherTile->topEnd || $this->topEnd === $anotherTile->bottomEnd;
    }

    public function topEnd() : int
    {
        return $this->topEnd;
    }

    public function bottomEnd() : int
    {
        return $this->bottomEnd;
    }

    public function flip() : void
    {
        $tmpTop          = $this->topEnd;
        $this->topEnd    = $this->bottomEnd;
        $this->bottomEnd = $tmpTop;
    }
}
