<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use function explode;
use function sprintf;

/**
 * Value object that represents a tile, avoiding the usage of literals in order to check if a tile can connect with other.
 */
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

    public static function fromString(string $string) : self
    {
        $ends = explode(':', $string);

        return new self((int) $ends[0], (int) $ends[1]);
    }

    public function canConnectToEnd(int $end) : bool
    {
        return $this->topEnd === $end || $this->bottomEnd === $end;
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

    public function __toString() : string
    {
        return sprintf('<%d:%d>', $this->topEnd, $this->bottomEnd);
    }

    public function equals(Tile $tile) : bool
    {
        return ($this->topEnd === $tile->topEnd && $this->bottomEnd === $tile->bottomEnd)
            ||
        ($this->topEnd === $tile->bottomEnd && $this->bottomEnd === $tile->topEnd);
    }
}
