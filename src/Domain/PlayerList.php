<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use function array_keys;
use function count;

/**
 * @see https://github.com/alesinicio/circularArray
 */
final class PlayerList
{
    /** @var Player[]  */
    private $array;
    /** @var int  */
    private $curIndex = 0;
    /** @var int */
    private $totalItems;
    /** @var array<int> */
    private $indexes = [];

    /**
     * Creates a circular array.
     * The $array parameter may be either an associative or an indexed array.
     *
     * @param Player[] $array
     */
    public function __construct(array $array)
    {
        $this->array      = $array;
        $this->totalItems = count($array);
        $this->mapKeys();
    }

    public function getCurrentValue() : Player
    {
        return $this->array[$this->indexes[$this->curIndex]];
    }

    public function next() : Player
    {
        $this->curIndex = $this->nextIndex();

        return $this->getCurrentValue();
    }

    /**
     * @return array<int>
     */
    private function mapKeys() : array
    {
        $this->indexes = array_keys($this->array);

        return $this->indexes;
    }

    /**
     * Returns the next position of the circular array;
     */
    private function nextIndex() : int
    {
        if ($this->curIndex + 1 >= $this->totalItems) {
            return 0;
        }

        return $this->curIndex + 1;
    }
}
