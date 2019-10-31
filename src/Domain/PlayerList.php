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
    private $array;
    private $curIndex   = 0;
    private $totalItems;
    private $indexes    = [];

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

    public function previous() : Player
    {
        $this->curIndex = $this->previousIndex();

        return $this->getCurrentValue();
    }

    public function reset() : Player
    {
        $this->curIndex = 0;

        return $this->getCurrentValue();
    }

    /**
     * Maps the keys of the array and returns an array containing the values found.
     * $return array;
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

    /**
     * Returns the previous position of the circular array;
     */
    private function previousIndex() : int
    {
        if ($this->curIndex <= 0) {
            return $this->totalItems - 1;
        }

        return $this->curIndex - 1;
    }
}
